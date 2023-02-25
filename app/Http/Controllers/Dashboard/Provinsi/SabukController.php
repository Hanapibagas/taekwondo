<?php

namespace App\Http\Controllers\Dashboard\Provinsi;

use App\Http\Controllers\Controller;
use App\Models\Sabuk;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SabukController extends Controller
{
  public function index(Request $request)
  {
    if ($request->ajax()) {
      $data = Sabuk::all();
      return DataTables::of($data)
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

    // return response()->json($regencys);

    return view('dashboard.admin.sabuk.index');
  }

  public function store(Request $request)
  {
    if ($request->id == NULL) {
      $request->validate([
        'nama' => 'required',
      ]);
    }

    $request->validate([
      'nama' => 'required',
    ]);

    $post = Sabuk::updateOrCreate(
      ['id' => $request->id],
      [
        'name' => $request->nama,
      ]
    );

    return response()->json($post);
  }

  public function edit($id)
  {
    $post = Sabuk::findOrfail($id);
    return response()->json($post);
  }

  public function destroy($id)
  {
    $post = Sabuk::findOrFail($id);
    $post->delete();
    return response()->json($post);
  }
}
