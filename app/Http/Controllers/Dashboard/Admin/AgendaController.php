<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class AgendaController extends Controller
{
  public function index(Request $request)
  {
    if ($request->ajax()) {
      $data = Agenda::latest()->get();
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

    return view('dashboard.admin.agenda.index');
  }

  public function store(Request $request)
  {
    if ($request->id == NULL) {
      $request->validate([
        'agenda' => 'required',
        'file' => 'required|mimes:jpeg,png,jpg,doc,docx,pdf,xlsx,xls|max:2048'
      ]);
    }

    $request->validate([
      'agenda' => 'required',
      'file' => 'mimes:jpeg,png,jpg,doc,docx,pdf,xlsx,xls|max:2048'
    ]);

    $id_peraturan = $request->id;
    $data_peraturan = Agenda::where('id', $id_peraturan)->first();
    $files = $request->file('file');

    if ($id_peraturan == NULL && !$request->file('file')) {
      $file_name = "materi.pdf";
    } elseif ($id_peraturan == NULL && $request->file('file')) {
      $file_name = date('YmdHis') . "." . $files->getClientOriginalExtension();
      Storage::disk('local')->putFileAs('public/lampiran/agenda', $files, $file_name);
    } elseif ($id_peraturan == $data_peraturan->id && $request->file('file')) {
      Storage::delete('/public/lampiran/agenda/' . $data_peraturan->file);
      $file_name = date('YmdHis') . "." . $files->getClientOriginalExtension();
      Storage::disk('local')->putFileAs('public/lampiran/agenda', $files, $file_name);
    } else {
      $file_name = $data_peraturan->file;
    }

    $post = Agenda::updateOrCreate(
      ['id' => $request->id],
      [
        'agenda' => $request->agenda,
        'file' => $file_name
      ]
    );

    return response()->json($post);
  }

  public function edit($id)
  {
    $post = Agenda::findOrfail($id);
    return response()->json($post);
  }

  public function destroy($id)
  {
    $post = Agenda::findOrFail($id);
    Storage::delete('public/lampiran/agenda/' . $post->file);
    $post->delete();
    return response()->json($post);
  }
}
