<?php

namespace App\Http\Controllers\Dashboard\Admin\About;

use App\Http\Controllers\Controller;
use App\Models\StrukturKepengurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StrukturKepengurusanController extends Controller
{
  public function index()
  {
    $data = StrukturKepengurusan::first();
    return view('dashboard.admin.tentang.struktur_kepengurusan.index', compact('data'));
  }

  public function update(Request $request, $id)
  {
    $request->validate([
      'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    if ($request->hasFile('image')) {
      $file = $request->file('image');
      $extension = $file->getClientOriginalExtension();
      $rename = 'file_' . date('YmdHis') . '.' . $extension;
      $uploadPath = Storage::putFileAs('public/images/struktur-kepengurusan', $file, $rename);
      if ($uploadPath) {
        $data = StrukturKepengurusan::find($id);
        Storage::delete('public/images/struktur-kepengurusan/' . $data->image);
        $data->image = $rename;
        $data->save();

        return redirect()->route('struktur-kepengurusan')->with('success', 'Data Berhasil Diubah');
      }
    }
  }
}
