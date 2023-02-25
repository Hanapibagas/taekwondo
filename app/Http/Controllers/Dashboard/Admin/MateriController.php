<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\Materi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class MateriController extends Controller
{
public function index(Request $request)
{
  if ($request->ajax()) {
    $data = Materi::latest()->get();
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

    return view('dashboard.admin.materi.index');
  }

  public function store(Request $request)
  {
    if ($request->id == NULL) {
      $request->validate([
        'materi' => 'required',
        // 'url' => 'required',
        'file' => 'required|mimes:jpeg,png,jpg,doc,docx,pdf,xlsx,xls|max:2048'
      ]);
    }

    $request->validate([
      'materi' => 'required',
    //   'url' => 'required',
      'file' => 'mimes:jpeg,png,jpg,doc,docx,pdf,xlsx,xls|max:2048'
    ]);

    $id_peraturan = $request->id;
    $data_peraturan = Materi::where('id', $id_peraturan)->first();
    $files = $request->file('file');

    if ($id_peraturan == NULL && !$request->file('file')) {
      $file_name = "materi.pdf";
    } elseif ($id_peraturan == NULL && $request->file('file')) {
      $file_name = date('YmdHis') . "." . $files->getClientOriginalExtension();
      Storage::disk('local')->putFileAs('public/lampiran/materi', $files, $file_name);
    } elseif ($id_peraturan == $data_peraturan->id && $request->file('file')) {
      Storage::delete('/public/lampiran/materi/' . $data_peraturan->file);
      $file_name = date('YmdHis') . "." . $files->getClientOriginalExtension();
      Storage::disk('local')->putFileAs('public/lampiran/materi', $files, $file_name);
    } else {
      $file_name = $data_peraturan->file;
    }

    $post = Materi::updateOrCreate(
      ['id' => $request->id],
      [
        'materi' => $request->materi,
        'url' => $request->url,
        'file' => $file_name
      ]
    );

    return response()->json($post);
  }

  public function edit($id)
  {
    $post = Materi::findOrfail($id);
    return response()->json($post);
  }

  public function destroy($id)
  {
    $post = Materi::findOrFail($id);
    Storage::delete('public/lampiran/materi/' . $post->file);
    $post->delete();
    return response()->json($post);
  }
}
