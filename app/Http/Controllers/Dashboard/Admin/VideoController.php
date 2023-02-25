<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class VideoController extends Controller
{
  public function index(Request $request)
  {
    if ($request->ajax()) {
      $data = Video::latest()->get();
      return Datatables::of($data)
        ->addColumn('action', function ($data) {
          $button = "<a href='javascript:void(0)' data-id='$data->id' class='btn btn-success edit-data p-2'>Edit</a>";
          $button .= '&nbsp;&nbsp;';
          $button .= '<button type="button"  id="' . $data->id . '" class="btn btn-danger delete-data p-2">Hapus</button>';
          return $button;
        })
        ->rawColumns(['action'])
        ->addIndexColumn()
        ->make(true);
    }

    return view('dashboard.admin.galery.video.index');
  }

  public function store(Request $request)
  {
    if ($request->id == NULL) {
      $request->validate([
        // 'title' => 'required',
        'url' => 'required'
      ]);
    }

    $request->validate([
      // 'title' => 'required',
      'url' => 'required'
    ]);

    $post = Video::updateOrCreate(
      ['id' => $request->id],
      [
        // 'title' => $request->title,
        'url' => $request->url
      ]
    );

    return response()->json($post);
  }

  public function edit($id)
  {
    $post = Video::findOrfail($id);
    return response()->json($post);
  }

  public function destroy($id)
  {
    $post = Video::findOrFail($id);
    $post->delete();
    return response()->json($post);
  }
}
