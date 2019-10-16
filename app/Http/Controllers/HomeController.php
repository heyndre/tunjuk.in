<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $nama = Auth::user()->name;
      $priv = Auth::user()->privileged;
      if ($priv=='1') {
        return view('dashboard');
      }  elseif ($priv=='0') {
        return view('index');
      }
    }
    public function indexAdmin()
    {
      return redirect('dashboard');
    }
    public function indexPublic()
    {
      return redirect('index');
    }
}
