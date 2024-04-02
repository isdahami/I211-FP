<?php

namespace App\Controllers;

use App\Models\UserModel;

class ProfileController extends BaseController
{
    public function index()
    {
        return view('profile/profile.php');
    }
}
