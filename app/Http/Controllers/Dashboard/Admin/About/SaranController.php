<?php

namespace App\Http\Controllers\Dashboard\Admin\About;

use App\Http\Controllers\Controller;
use App\Models\Saran;
use Illuminate\Http\Request;

class SaranController extends Controller
{
    public function index()
    {
        $datas = Saran::all();
        return view('dashboard.admin.tentang.saran_dan_kritik.index', compact('datas'));
    }
}
