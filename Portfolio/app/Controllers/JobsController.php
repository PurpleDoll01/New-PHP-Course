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

                $files = $request->getUploadedFiles();
                $logo = $files['logo'];

                if($logo->getError() == UPLOAD_ERR_OK) {
                    $fileName = $logo->getClientFilename();
                    $filePath = "uploads/$fileName";
                    $logo->moveTo($filePath);
                }

                if ($postData['job'] == 'job') {
                    $job = new Job();
                    $job->title = $postData['title'];
                    $job->description = $postData['description'];
                    $job->file = $filePath;
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