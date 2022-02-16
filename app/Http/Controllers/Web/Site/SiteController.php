<?php

namespace App\Http\Controllers\Web\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        return view('web.');
    }
}
