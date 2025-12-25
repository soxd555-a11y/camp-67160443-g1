<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
    public function index()
    {
        return view('/html101');
    }

    public function store(Request $request)
    {
        return view('template.html101_view', [
            'data' => $request->all()
        ]);
    }
}

