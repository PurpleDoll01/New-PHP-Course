<?php

namespace App\Controllers;

use App\Models\{Job, Project, User};
use Respect\Validation\Validator as v;

class UsersController extends BaseController {
    public function getAddUserAction($request) {
        $responseMessage = null;

        $postData = $request->getParsedBody();
        if ($request->getMethod() == 'POST') {
            $userValidator = v::key('email', v::stringType()->notEmpty())
                ->key('password', v::stringType()->notEmpty());

            try {
                $userValidator->assert($postData);

                $user = new User();
                $user->email = $postData['email'];
                $userPassword = password_hash($postData['password'], PASSWORD_DEFAULT);
                $user->password = $userPassword;
                $user->save();

                $responseMessage = 'Saved';
            } catch(\Exception $e) {
                $responseMessage = $e->getMessage();
            }

        }

        return $this->renderHTML('addUsers.twig', [
            'responseMessage' => $responseMessage,
        ]);
    }
}

