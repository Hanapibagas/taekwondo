<?php

namespace App\Http\Controllers\Dashboard\Provinsi;

use App\Http\Controllers\Controller;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class JabatanController extends Controller
{
  public function index(Request $request)
  {
    $data = Jabatan::all();
    // return response()->json($data);
    if ($request->ajax()) {
      $data = Jabatan::all();
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

    return view('dashboard.admin.jabatan.index');
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

    $post = Jabatan::updateOrCreate(
      ['id' => $request->id],
      [
        'name' => $request->nama,
      ]
    );

    return response()->json($post);
  }

  public function edit($id)
  {
    $post = Jabatan::findOrfail($id);
    return response()->json($post);
  }

  public function destroy($id)
  {
    $post = Jabatan::findOrFail($id);
    $post->delete();
    return response()->json($post);
  }
}
