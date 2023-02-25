<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class SliderController extends Controller
{
  public function index(Request $request)
  {
    if ($request->ajax()) {
      $data = Slider::latest()->get();
      return Datatables::of($data)
        ->addColumn('gambar', function ($data) {
          $url = asset('storage/images/slider/' . $data->images);
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

    return view('dashboard.admin.slider.index');
  }

  public function store(Request $request)
  {
    if ($request->id == NULL) {
      $request->validate([
        'image' => 'required|mimes:jpeg,png,jpg|max:2048'
      ]);
    }

    $request->validate([
      'image' => 'mimes:jpeg,png,jpg|max:2048'
    ]);

    $id_kebijakan = $request->id;
    $data_kebijakan = Slider::where('id', $id_kebijakan)->first();
    $files = $request->file('image');

    if ($id_kebijakan == NULL && !$request->file('image')) {
      $file_name = "slider.jpg";
    } elseif ($id_kebijakan == NULL && $request->file('image')) {
      $file_name = date('YmdHis') . "." . $files->getClientOriginalExtension();
      Storage::disk('local')->putFileAs('public/images/slider/', $files, $file_name);
    } elseif ($id_kebijakan == $data_kebijakan->id && $request->file('image')) {
      Storage::delete('/public/images/slider/' . $data_kebijakan->images);
      $file_name = date('YmdHis') . "." . $files->getClientOriginalExtension();
      Storage::disk('local')->putFileAs('public/images/slider/', $files, $file_name);
    } else {
      $file_name = $data_kebijakan->images;
    }

    $post = Slider::updateOrCreate(
      ['id' => $request->id],
      [
        'images' => $file_name
      ]
    );

    return response()->json($post);
  }

  public function destroy($id)
  {
    $post = Slider::findOrFail($id);
    Storage::delete('/public/images/slider/' . $post->images);
    $post->delete();
    return response()->json($post);
  }
}
