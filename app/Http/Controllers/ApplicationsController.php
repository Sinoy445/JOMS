<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Applications;
use App\Models\Job;
use App\Rules\PhoneNumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ApplicationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function applyForm(Request $request){ //create Application Form
        $jobID=$request->get('jobId');
        $user = auth()->user();

        $returnHTML = view('applications.applyJob',[
            'jobs'=>Job::with('location','author')->where('id','=',$jobID)->get(),
            'applicants'=>User::where('id','=',$user->id)->get(),
        ])->render();

        return response()->json(array('success'=> true, 'html'=>$returnHTML));

    }

    public function apply(Request $request,Job $job){ //Submit Application Form
        $user = auth()->user();

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:80'],
            'email' => ['required', 'string', 'email:dns,filter', 'max:255'],
            'phoneNumber'=>['required','string', 'max:13', new PhoneNumber],
            'reasonSuitable' => ['nullable','string', 'min:1', 'max:2000'],
            'curriculumVitae' => ['nullable', 'mimes:pdf,docs,docx'],
            'resume' => ['nullable', 'mimes:pdf,docs,docx'],
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator->errors()->getMessages())
                ->withInput()
                ->with('error',$validator->errors()->getMessages());
        }

        Applications::create([
            'user_id'=>$user->id,
            'job_id'=>$job->id,
            'application_status_id'=>1,
            'name' => request('name'),
            'email' => request('email'),
            'phoneNumber' => request('phoneNumber'),
            'reasonSuitable' => request('reasonSuitable'),
            'curriculumVitae' => request()->file('curriculumVitae')==null ? null:request()->file('curriculumVitae')->store('curriculumVitae'),
            'resume' => request()->file('resume')==null ? null:request()->file('resume')->store('resume')
        ]);

        return back()->with('success', 'Application Submitted!');
    }

    public function index() //View Applications Page
    {
        $user = auth()->user();
        if ($user->role == 'Jobseeker'){
            return view('applications.index', [
                'applications' => Applications::with('job','applicant','appStatus')->where('user_id','=',$user->id)->latest()->get(),
            ]);
        }
        else{
            return redirect(route('home'));
        }
    }

    public function action(Request $request, Applications $application)
    {
        $action = $request->input('action');



        if($action == "KIV"){
            $appStatusID = DB::table('application_statuses')
                ->select('id')
                ->where('status', 'LIKE', "Keep In View")
                ->pluck('id');
            $application->update([
                'application_status_id'=>$appStatusID[0],
            ]);
            return back()->with('success', 'Applicant Updated!');
        }elseif($action =="reject"){
            $appStatusID = DB::table('application_statuses')
                ->select('id')
                ->where('status', 'LIKE', "Rejected")
                ->pluck('id');
            $application->update([
                'application_status_id'=>$appStatusID[0],
            ]);
            return back()->with('success', 'Applicant Updated!');
        }

    }

}
