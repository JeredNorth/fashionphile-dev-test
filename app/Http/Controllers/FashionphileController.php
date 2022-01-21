<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Skill;
use App\Models\Applicant;
use View;

class FashionphileController extends Controller {


    function generateApplicantsReport() {

        $jobData = Job::all();
        $applicantData = Applicant::all();
        $skillData = Skill::all();

        $uniqueSkillsCount = $this->getUniqueSkillCount($skillData);

        return view::make('applicant-report', 
            ['jobs' => $jobData, 
            'applicants' => $applicantData, 
            'skills' => $skillData, 
            'uniqueSkills' => $uniqueSkillsCount]);
    }


    function getUniqueSkillCount($skillData) {
        $uniqueSkills = [];
        foreach($skillData as $skill) {
            array_push($uniqueSkills, $skill->name);
        }
        $uniqueSkills = array_unique($uniqueSkills);
        $uniqueSkillsCount = count($uniqueSkills);

        return $uniqueSkillsCount;
    }

}