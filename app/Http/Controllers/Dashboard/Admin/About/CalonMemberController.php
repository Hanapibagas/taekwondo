<?php

namespace App\Http\Controllers\Dashboard\Admin\About;

use App\Http\Controllers\Controller;
use App\Models\CalonMurid;
use Illuminate\Http\Request;

class CalonMemberController extends Controller
{
    public function index()
    {
        $CalonMurid = CalonMurid::with(['Dojang'])->get();
        return view('dashboard.admin.calon-member.index', compact('CalonMurid'));
    }
}
