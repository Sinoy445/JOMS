<?php

namespace Database\Seeders;

use App\Models\ApplicationStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApplicationStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ApplicationStatus::create([
            'status' => "Submitted",
        ]);

        ApplicationStatus::create([
            'status' => "Viewed",
        ]);

        ApplicationStatus::create([
            'status' => "Keep In View",
        ]);

        ApplicationStatus::create([
            'status' => "Rejected",
        ]);
    }
}
