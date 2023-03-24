<?php

namespace App\Http\Controllers\Dashboard\Admin\About;

use App\Http\Controllers\Controller;
use App\Models\CalonMurid;
use Illuminate\Http\Request;

class CalonMemberController extends Controller
{
    public function index()
    {
        $CalonMurid = CalonMurid::with(['Dojang', 'Kabupaten', 'Kacamatan'])->get();
        // return response()->json($CalonMurid);
        return view('dashboard.admin.calon-member.index', compact('CalonMurid'));
    }
}
