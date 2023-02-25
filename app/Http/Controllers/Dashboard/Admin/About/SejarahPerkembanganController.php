<?php

namespace App\Http\Controllers\Dashboard\Admin\About;

use App\Http\Controllers\Controller;
use App\Models\SejarahPerkembangan;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SejarahPerkembanganController extends Controller
{
  public function index()
  {
    $data = SejarahPerkembangan::first();
    // $data = SambutanKetua::all();

    // return response()->json($data);
    return view('dashboard.admin.tentang.sejarah_perkembangan.index', compact('data'));
  }

  public function update(Request $request, $id)
  {
    $this->validate($request, [
      'body' => 'required',
    ]);

    $sambutan = SejarahPerkembangan::find($id);
    $sambutan->body = $request->body;

    $sambutan->save();

    return redirect()->route('sejarah-perkembangan')->with('success', 'Data Berhasil Diubah');
  }
}
