<?php

namespace App\Controllers;

use App\Models\{Job, Project};

class JobsController {
    public function getAddJobAction() {
        if (isset($_POST['job'])) {
            if ($_POST['job'] == 'job') {
                $job = new Job();
                $job->title = $_POST['title'];
                $job->description = $_POST['description'];
                $job->save();
            } else if($_POST['job'] == 'project') {
                $project = new Project();
                $project->title = $_POST['title'];
                $project->description = $_POST['description'];
                $project->save();
            }
        }

        include '../views/addJob.php';
    }
}