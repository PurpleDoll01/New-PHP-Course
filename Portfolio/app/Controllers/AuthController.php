<?php

namespace App\Controllers;

use App\Models\{Job, Project, User};
use Respect\Validation\Validator as v;
use Zend\Diactoros\Response\RedirectResponse;

class AuthController extends BaseController {
    public function getLogin($request) {
        return $this->renderHTML('login.twig');

    }

    public function postLogin($request) {
        $postData = $request->getParsedBody();
        $responseMessage = null;


        $user = User::where('email', $postData['email'])->first();
        if($user) {
            if(\password_verify($postData['password'], $user->password)) {
                return new RedirectResponse('/NewCurse/Portfolio/admin');
            } else {
                $responseMessage = 'Username and password dont match';
            }
        } else {
            $responseMessage = 'Username and password dont match';
        }

        return $this->renderHTML('login.twig', [
            'responseMessage' => $responseMessage,
        ]);
    }
}

