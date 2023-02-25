<?php

namespace App\Http\Controllers\Dashboard\Admin\About;

use App\Http\Controllers\Controller;
use App\Models\AdArt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class AdArtController extends Controller
{
  public function index()
  {
    $data = AdArt::first();
    return view('dashboard.admin.tentang.ad_art.index', compact('data'));
  }

  public function update(Request $request, $id)
  {
    $request->validate([
      'file' => 'required|mimes:jpeg,png,jpg,doc,docx,pdf,xlsx,xls|max:20480'
    ]);

    if ($request->hasFile('file')) {
      $file = $request->file('file');
      $extension = $file->getClientOriginalExtension();
      $rename = 'file_' . date('YmdHis') . '.' . $extension;
      $uploadPath = Storage::putFileAs('public/lampiran/ad-art', $file, $rename);
      if ($uploadPath) {
        $data = AdArt::find($id);
        Storage::delete('public/lampiran/ad-art' . $data->file);
        $data->file = $rename;
        $data->save();
        return redirect()->route('ad-art')->with('success', 'Data Berhasil Diubah');
      }
    }
  }
}
