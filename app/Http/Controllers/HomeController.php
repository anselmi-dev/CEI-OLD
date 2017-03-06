<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\trimestre;
use Carbon\Carbon;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
    
        $tri = trimestre::where('ano',Carbon::now()->year)->get();
        return view('home')->with('trimestres',$tri);
    }
}
