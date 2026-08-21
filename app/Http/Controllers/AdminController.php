<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function jumpToAdminPage()
    {
        return view('apps_scrumboard');
    }
}
