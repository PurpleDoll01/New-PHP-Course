<?php

namespace App\Controllers;

use App\Models\{Job, Project};

class JobsController {
    public function getAddJobAction($request) {
        $postData = $request->getParsedBody();
        if ($request->getMethod() == 'POST') {
            if ($postData['job'] == 'job') {
                $job = new Job();
                $job->title = $postData['title'];
                $job->description = $postData['description'];
                $job->save();
            } else if($postData['job'] == 'project') {
                $project = new Project();
                $project->title = $postData['title'];
                $project->description = $postData['description'];
                $project->save();
            }
        }

        include '../views/addJob.php';
    }
}