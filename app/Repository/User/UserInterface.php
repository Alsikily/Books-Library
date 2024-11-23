<?php

namespace App\Repository\User;

interface UserInterface {

    public function login($request);
    public function search($request);

}
