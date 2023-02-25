<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\RolesRelation;
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

  public function index(Request $request)
  {
    // $test = $request->user()->hasRole('');
    // return response()->json($test);
    $id = Auth::user()->id;
    // dd($id );

    $roles =  RolesRelation::where('user_id', $id)->first();
    // dd($roles->role_id);
    if ($roles->role_id == 1) {
      return view("dashboard.admin.index");
    } else if ($roles->role_id == 2) {
      return view("dashboard.kabupaten.index");
    } else {
      $request->session()->forget('auth');
      return redirect('login');
    }
  }
}
