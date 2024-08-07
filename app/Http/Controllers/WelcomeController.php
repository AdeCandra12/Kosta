<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Kosans;

class WelcomeController extends Controller
{
    /**
     * Show the application welcome screen.
     * 
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        return view('welcome', [
            'kosans' => Kosans::all()
        ]);
    }

    public function list()
    {
        return view('list', [
            'kosans' => Kosans::all()
        ]);
    }
}
