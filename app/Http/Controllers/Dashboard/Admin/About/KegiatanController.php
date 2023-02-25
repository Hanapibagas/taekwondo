<?php

namespace App\Http\Controllers\Dashboard\Admin\About;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class KegiatanController extends Controller
{
  public function index(Request $request)
  {
    if ($request->ajax()) {
      $data = Kegiatan::latest()->get();
      return DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('action', function ($row) {
          $actionBtn = '
                    <a href="javascript:void(0)" data-toggle="tooltip" onClick="editFunc(' . $row->id . ')" data-original-title="Edit" class="edit btn btn-success edit">
                    Edit
                    </a>
                    <a href="javascript:void(0);" id="delete-anggota" onClick="deleteFunc(' . $row->id . ')" data-toggle="tooltip" data-original-title="Delete" class="delete btn btn-danger">
                    Delete
                    </a>
                    ';
          return $actionBtn;
        })
        ->rawColumns(['action'])
        ->make(true);
    }
    return view('dashboard.admin.tentang.kegiatan.index');
  }

  public function store(Request $request)
  {
    $this->validate($request, [
      'judul' => 'required',
      'deskripsi' => 'required',
      'gambar' => 'required'
    ]);

    $post = Kegiatan::updateOrCreate(
      ['id' => $request->id],
      [
        'judul' => $request->judul,
        'deskripsi' => $request->deskripsi,
        'gambar' => $request->gambar
      ]
    );

    return response()->json($post);
  }

  public function edit(Request $request)
  {
    $where = array('id' => $request->id);
    $anggota  = Kegiatan::where($where)->first();

    return Response()->json($anggota);
  }
}
