<?php

namespace App\Http\Controllers\Dashboard\Admin\About;

use App\Http\Controllers\Controller;
use App\Models\SambutanKetua;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SambutanKetuaUmumController extends Controller
{
  public function index()
  {
    $data = SambutanKetua::first();
    // $data = SambutanKetua::all();

    // return response()->json($data);
    return view('dashboard.admin.tentang.sambutan_ketua.index', compact('data'));
  }

  public function update(Request $request, $id)
  {
    $this->validate($request, [
      'body' => 'required',
    ]);

    $sambutan = SambutanKetua::find($id);
    $sambutan->body = $request->body;

    $sambutan->save();

    return redirect()->route('sambutan-ketua')->with('success', 'Data Berhasil Diubah');
  }
}
