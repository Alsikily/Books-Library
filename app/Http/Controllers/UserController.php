<?php

namespace App\Http\Controllers;

// Requests
use App\Http\Requests\loginRequest;
use App\Http\Requests\searchRequest;

use App\Repository\User\UserInterface;

class UserController extends Controller {

    private $UserRepo;

    public function __construct(UserInterface $UserRepo) {
        $this -> UserRepo = $UserRepo;
    }

    public function login(loginRequest $request) {
        return $this -> UserRepo -> login($request);
    }

    public function search(searchRequest $request) {
        return $this -> UserRepo -> search($request);
    }

}
