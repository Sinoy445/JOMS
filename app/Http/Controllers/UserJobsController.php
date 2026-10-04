<?php

namespace App\Http\Controllers;

use App\Models\Applications;
use App\Models\ApplicationStatus;
use App\Models\Category;
use App\Models\Job;
use App\Models\JobTagList;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class UserJobsController extends Controller
{
    public function index(){
        $user=auth()->user();
        return view ('myJobs.index',[
            'posts' => Job::where([['user_id',$user->id]])->paginate(50),
        ]);
    }

    public function create()
    {
        return view ('myJobs.create', [
            'tags' =>  Tag::with('category')->latest()->get(),
        ]);

    }

    public function store(Job $job)
    {
//        throw ValidationException::withMessages(['name' => request()->input('name')]);
        $jobDB = DB::table('jobs')
            ->select('id')
            ->get();
//        dd($jobDB);
        if(count($jobDB)==0){
            $jobDB =1;
        } else{
            $jobDB= $jobDB->last()->id;
            $jobDB +=1;
        }

        $slug = $this->getSlug($jobDB);

        $this->validateJob();
        $locationId = $this->retrieveLocation();

        $jobTypes = request()->input('jobType');
        $jobExperiences = request()->input('jobExperience');
//        throw ValidationException::withMessages(['jobType' => $jobTypes[0],'sector' => $sectors[0].$sectors[1]]);

        $jobCreate= $job->create([
            'user_id' => request()->user()->id,
            'location_id'=> $locationId[0],
            'name'=> request('name'),
            'slug'=> $slug,
            'excerpt'=> request('excerpt'),
            'description'=> request('description'),
            'skillNeeded'=> request('skillNeeded'),
            'jobScope'=> request('jobScope')
        ]);
        $jobId = $jobCreate->id;

        foreach($jobTypes as $jobType){
            $tagId = DB::table('tags')
                ->select('id')
                ->where('name', 'LIKE',"%{$jobType}%")
                ->get()->first()->id;
            JobTagList::create([
                'job_id'=>$jobId,
                'tag_id'=>$tagId,
            ]);
        }
        foreach($jobExperiences as $jobExperience){
            $tagId = DB::table('tags')
                ->select('id')
                ->where('name', 'LIKE',"%{$jobExperience}%")
                ->get()->first()->id;
            JobTagList::create([
                'job_id'=>$jobId,
                'tag_id'=>$tagId,
            ]);
        }

        $this->sectorAction($jobId);
        return redirect('myJobs/createNewPost')->with('success', 'Job Created!');
    }

    public function edit(Job $job)
    {
        $state = DB::table('states')
            ->join('locations', 'states.id', '=', 'locations.state_id')
            ->select('states.id')
            ->where('locations.name', '=',$job->location->name)
            ->get();


        return view('myJobs.update', [
            'job' => $job,
            'state'=>$state,
            'jobtags'=>Tag::with('listjobs')->join('job_tag_lists','tags.id', '=','job_tag_lists.tag_id')
                ->where('job_id', '=', $job->id)->get(),
            'tags' =>  Tag::with('category')->latest()->get(),
        ]);
    }

    public function update(Job $job){

        $slug = $this->getSlug($job->id);

        $this->validateJob();
        $locationId = $this->retrieveLocation();

        $jobTypes = request()->input('jobType');
        $jobExperiences = request()->input('jobExperience');
//        throw ValidationException::withMessages(['jobType' => $jobTypes[0],'sector' => $sectors[0].$sectors[1]]);

        $job->update([
            'user_id' => request()->user()->id,
            'location_id'=> $locationId[0],
            'name'=> request('name'),
            'slug'=> $slug,
            'excerpt'=> request('excerpt'),
            'description'=> request('description'),
            'skillNeeded'=> request('skillNeeded'),
            'jobScope'=> request('jobScope')
        ]);

        JobTagList::where('job_id','=',$job->id)->delete();

        foreach($jobTypes as $jobType){
            $tagId = DB::table('tags')
                ->select('id')
                ->where('name', 'LIKE',"%{$jobType}%")
                ->get()->first()->id;
            JobTagList::create([
                'job_id'=>$job->id,
                'tag_id'=>$tagId,
            ]);
        }
        foreach($jobExperiences as $jobExperience){
            $tagId = DB::table('tags')
                ->select('id')
                ->where('name', 'LIKE',"%{$jobExperience}%")
                ->get()->first()->id;
            JobTagList::create([
                'job_id'=>$job->id,
                'tag_id'=>$tagId,
            ]);
        }

        $this->sectorAction($job->id);
        return back()->with('success', 'Job Updated!');

    }

    public function view(Job $job) //View Received Applications for selected Job
    {
        return view('myJobs.view', [
            'job' => $job,
            'applications'=>Applications::with('job','applicant','appStatus')->where('job_id','=',$job->id)->latest()->get(),
            'statuses' => ApplicationStatus::all(),
        ]);
    }

    public function downloadCV($file,$name)
    {
        $path = storage_path('app/curriculumVitae/'.$file);

        $extension = pathinfo($file, PATHINFO_EXTENSION);

        $addFileName = " (CV)";
        if (file_exists($path)) {

            return response()->file($path, array('Content-Type' =>Storage::mimeType('curriculumVitae/'.$file), 'Content-Disposition'=> 'attachment; filename="'.$name.$addFileName.'.'.$extension.'"'));

        }

        abort(404);
    }

    public function downloadResume($file,$name)
    {
        $path = storage_path('app/resume/'.$file);

        $extension = pathinfo($file, PATHINFO_EXTENSION);

        $addFileName = " (Resume)";
        if (file_exists($path)) {

            return response()->file($path, array('Content-Type' =>Storage::mimeType('resume/'.$file), 'Content-Disposition'=> 'attachment; filename="'.$name.$addFileName.'.'.$extension.'"'));

        }

        abort(404);
    }

    public function copyForm(){ //create Copy Form
        $user = auth()->user();

        $returnHTML = view('myJobs.copyJob',[
            'jobs'=>Job::with('location','author')->where('user_id','=',$user->id)->oldest()->get(),

        ])->render();

        return response()->json(array('success'=> true, 'html'=>$returnHTML));
    }

    public function selectJob(Request $request){ // Show Details of selected job
        $jobId=$request->get('jobId');

        $returnHTML = view('myJobs.selectJob',[
            'jobs'=>Job::with('location','author')->where('id','=',$jobId)->oldest()->get(),
        ])->render();

        return response()->json(array('success'=> true, 'html'=>$returnHTML));
    }

    public function copyJob(Job $job)
    {
        $user= auth()->user();

        $jobAuthorId = DB::table('jobs')
            ->select('user_id')
            ->where('id', '=',$job->id)
            ->get()->first()->user_id;

        if($user->id==$jobAuthorId){
            return view ('myJobs.createCopy', [
                'job' => $job,
                'jobtags'=>Tag::with('listjobs')->join('job_tag_lists','tags.id', '=','job_tag_lists.tag_id')
                    ->where('job_id', '=', $job->id)->get(),
                'tags' =>  Tag::with('category')->latest()->get(),
            ]);
        } else{
            return redirect('/myJobs/createNewPost/')->with('errorOne',"Accessing unauthorized page");
        }



    }



    public function destroy(Job $job) {

        $job->delete();

        return back()->with('success', 'Job Deleted!');
    }

    public function autocomplete(Request $request)
    {
        if($request->get('term'))
        {
            $query = $request->get('term');
            $data = DB::table('locations')
                ->join('states', 'locations.state_id', '=' , 'states.id')
                ->select('locations.name as city','states.name as state')
                ->where('locations.name', 'LIKE', "%{$query}%")
                ->get();
            $output='';
            foreach($data as $row)
            {
                $output .= "
                <li class='selectable'><a href='#'>" . $row->city. ", " . $row->state. "</a></li>";
            }
            echo $output;
        }
    }

    /**
     * @param $jobId
     * @return void
     */
    public function sectorAction($jobId): void
    {
        if (!empty(request()->input('sector'))) {
            $sectors = explode(",", request()->input('sector'));
            $currentTags = DB::table('tags')
                ->select('name')
                ->where(function($query) use ($sectors){
                    foreach($sectors as $sector){
                        $query->orWhere('name','LIKE', '%' . $sector . '%');
                    }
                })->get();  //tags available in site that match inputted sectors

            $counter = count($currentTags);
            if(count($currentTags)!=count($sectors)){ //number of matched tags not equal to number of inputted tags
                foreach ($sectors as $sector) { //looping through inputted sectors

                    $counting = 0;
                    if($counter == 0){
                        $sectorSlug = explode(" ", $sector);
                        $sectorSlug = implode("", $sectorSlug);
                        Tag::create([
                            'category_id' => Category::where('name', '=', 'Sector')->get()->first()->id,
                            'name' => $sector,
                            'slug' => $sectorSlug,
                        ]);
                    } else{
                        foreach ($currentTags as $currentTag) { //looping through tags that match in database, lesser tags in here if there's a new tag inputted
                            $sector = strtolower($sector);
                            $sector = ucwords($sector); //capitalizing the inputted sectors for case of engineering when it's Engineering
                            
                            error_log("Current checked tag = ". $currentTag->name);
                            error_log("outside if of current tags loop". " Counting=".$counting." Counter=". $counter .  " Sector = ".$sector);
                            if($sector==$currentTag->name){
                                break;
                            }
                            if ($counting == $counter-1 && $sector != $currentTag->name) {
                                error_log("inside if of current tags loop". " Counting=".$counting." Counter=". $counter .  " Sector = ".$sector);
                                $sectorSlug = explode(" ", $sector);
                                $sectorSlug = implode("", $sectorSlug);
                                Tag::create([
                                    'category_id' => Category::where('name', '=', 'Sector')->get()->first()->id,
                                    'name' => $sector,
                                    'slug' => $sectorSlug,
                                ]);
                            }
                            $counting +=1;
                        }
                    }

                }
            }

            foreach ($sectors as $sector) {
                $tagId = DB::table('tags')
                    ->select('id')
                    ->where('name', 'LIKE', "%{$sector}%")
                    ->get()->first()->id;
                JobTagList::create([
                    'job_id' => $jobId,
                    'tag_id' => $tagId,
                ]);
            }
        }
    }

    /**
     * @return void
     */
    public function validateJob(): void
    {
        request()->validate([
            'name' => ['required', 'string', 'max:80'],
            'location' => ['required'],
            'excerpt' => ['required'],
            'description' => ['required'],
            'skillNeeded' => ['required'],
            'jobScope' => ['required'],
            'jobType' => ['required'],
            'jobExperience' => ['required']
        ]);
    }

    /**
     * @return \Illuminate\Support\Collection
     * @throws ValidationException
     */
    public function retrieveLocation(): \Illuminate\Support\Collection
    {
//      to retrieve location ID based on inputted location by first extracting the city name and then search id by city name
        $location = explode(",", request()->input('location'));
        $location = $location[0];
        $locationId = DB::table('locations')
            ->select('id')
            ->where('name', 'LIKE', "%{$location}%")
            ->pluck('id');
//        throw ValidationException::withMessages(['location' => $locationId]);

        //if database can't find=invalid city name/ city name doesn't exist in database
        if ($locationId->isEmpty()) {
            throw ValidationException::withMessages(['location' => 'Please type a valid location according to list']);
        }
        return $locationId;
    }

    /**
     * @return string
     */
    public function getSlug($jobId): string
    {
        $slug = explode(" ", request()->input('name'));
        $slug = implode("", $slug);
        $slug .= $jobId;
        return $slug;
//        throw ValidationException::withMessages(['name' => $slug]);
    }
}
