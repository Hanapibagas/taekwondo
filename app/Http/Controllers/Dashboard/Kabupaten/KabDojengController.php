<?php

namespace App\Http\Controllers\Dashboard\Kabupaten;

use App\Http\Controllers\Controller;
use App\Models\Dojeng;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class KabDojengController extends Controller
{
  public function index(Request $request)
  {
    if ($request->ajax()) {
      $data = Dojeng::all();
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

    return view('dashboard.kabupaten.dojeng.index');
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

    $post = Dojeng::updateOrCreate(
      ['id' => $request->id],
      [
        'name' => $request->nama,
      ]
    );

    return response()->json($post);
  }

  public function edit($id)
  {
    $post = Dojeng::findOrfail($id);
    return response()->json($post);
  }

  public function destroy($id)
  {
    $post = Dojeng::findOrFail($id);
    $post->delete();
    return response()->json($post);
  }
}
