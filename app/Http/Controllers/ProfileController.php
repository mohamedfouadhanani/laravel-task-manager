<?php

namespace App\Http\Controllers;

class ProfileController extends Controller
{
    public function index() {
        return view("user.profile");
    }

    public function edit() {
        return view("user.profile_update");
    }
}
