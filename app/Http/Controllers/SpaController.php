<?php

namespace App\Http\Controllers;

class SpaController extends Controller
{
    /**
     * Display SPA.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('index');
    }
}
