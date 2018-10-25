<?php

namespace App\Controllers;

use App\Models\{Job, Project};
use Respect\Validation\Validator as v;

class JobsController extends BaseController {
    public function getAddJobAction($request) {
        $responseMessage = null;

        $postData = $request->getParsedBody();
        if ($request->getMethod() == 'POST') {
            $jobValidator = v::key('title', v::stringType()->notEmpty())
                ->key('description', v::stringType()->notEmpty());

            try {
                $jobValidator->assert($postData);
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
                $responseMessage = 'Saved';
            } catch(\Exception $e) {
                $responseMessage = $e->getMessage();
            }

        }

        return $this->renderHTML('addJob.twig', [
            'responseMessage' => $responseMessage,
        ]);
    }
}