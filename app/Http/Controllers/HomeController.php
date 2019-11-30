<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $kat = DB::table('category')->get();
      if (Auth::check()) {
        $priv = Auth::user()->privileged;
        if ($priv=='1') {
          return view('dashboard');
        }  elseif ($priv=='0') {
          return view('index', ['kat' => $kat]);
        }
      } else {
        return view('index', ['kat' => $kat]);
      }
    }

}
