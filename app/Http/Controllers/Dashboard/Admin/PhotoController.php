<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class PhotoController extends Controller
{
  public function index(Request $request)
  {
    if ($request->ajax()) {
      $data = Photo::latest()->get();
      return Datatables::of($data)
        ->addColumn('gambar', function ($data) {
          $url = asset('storage/images/photo/' . $data->images);
          $colGambar = "<img src='$url' alt='' style='width:150px; height:100px; border-radius:0%;' >";
          return $colGambar;
        })
        ->addColumn('action', function ($data) {
          $button = '<button type="button"  id="' . $data->id . '" class="btn btn-danger delete-data p-2">Hapus</button>';
          return $button;
        })
        ->rawColumns(['action', 'gambar'])
        ->addIndexColumn()
        ->make(true);
    }

    return view('dashboard.admin.galery.photo.index');
  }

  public function store(Request $request)
  {
    if ($request->id == NULL) {
      $request->validate([
        'images' => 'required|mimes:jpeg,png,jpg|max:2048'
      ]);
    }

    $request->validate([
      'images' => 'mimes:jpeg,png,jpg|max:2048'
    ]);

    $id_kebijakan = $request->id;
    $data_kebijakan = Photo::where('id', $id_kebijakan)->first();
    $files = $request->file('images');

    if ($id_kebijakan == NULL && !$request->file('images')) {
      $file_name = "Photo.jpg";
    } elseif ($id_kebijakan == NULL && $request->file('images')) {
      $file_name = date('YmdHis') . "." . $files->getClientOriginalExtension();
      Storage::disk('local')->putFileAs('public/images/photo/', $files, $file_name);
    } elseif ($id_kebijakan == $data_kebijakan->id && $request->file('images')) {
      Storage::delete('/public/images/photo/' . $data_kebijakan->images);
      $file_name = date('YmdHis') . "." . $files->getClientOriginalExtension();
      Storage::disk('local')->putFileAs('public/images/photo/', $files, $file_name);
    } else {
      $file_name = $data_kebijakan->images;
    }

    $post = Photo::updateOrCreate(
      ['id' => $request->id],
      [
        'images' => $file_name
      ]
    );

    return response()->json($post);
  }

  public function destroy($id)
  {
    $post = Photo::findOrFail($id);
    Storage::delete('/public/images/photo/' . $post->images);
    $post->delete();
    return response()->json($post);
  }
}
