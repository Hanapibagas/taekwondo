<?php

namespace App\Http\Controllers\Dashboard\Provinsi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PengujiController extends Controller
{
  public function index(Request $request)
  {
    if ($request->ajax()) {
      $data = Pengu::with('sabuk', 'dojeng', 'regency')->get();
      return DataTables::of($data)
        ->addColumn('foto', function ($data) {
          $url = asset('storage/images/anggota/' . $data->photo);
          $colGambar = "<img src='$url' alt='' style='width:150px; height:100px; border-radius:0%;' >";
          return $colGambar;
        })
        ->addColumn('action', function ($data) {
          $button = "<a href='javascript:void(0)' data-id='$data->id' class='btn btn-success edit-data p-2'>Edit</a>";
          $button .= '&nbsp;&nbsp;';
          $button .= '<button type="button"  id="' . $data->id . '" class="btn btn-danger delete-data p-2">Hapus</button>';
          return $button;
        })
        ->rawColumns(['action', 'foto'])
        ->addIndexColumn()
        ->make(true);
    }

    $sabuks = Sabuk::all();
    $dojengs = Dojeng::all();
    $regencys = Regency::where('province_id', 73)->get();
    // return response()->json($regencys);

    return view('dashboard.admin.anggota.index', compact('sabuks', 'dojengs', 'regencys'));
  }

  public function store(Request $request)
  {
    if ($request->id == NULL) {
      $request->validate([
        'nama' => 'required',
        'alamat' => 'required',
        'jenis_kelamin' => 'required',
        'telp' => 'required',
        'tahun' => 'required',
        'regency' => 'required',
        'sabuk' => 'required',
        'dojeng' => 'required',
        'foto' => 'required|mimes:jpeg,png,jpg,doc,docx,pdf,xlsx,xls|max:2048'
      ]);
    }

    $request->validate([
      'nama' => 'required',
      'alamat' => 'required',
      'jenis_kelamin' => 'required',
      'telp' => 'required',
      'tahun' => 'required',
      'regency' => 'required',
      'sabuk' => 'required',
      'dojeng' => 'required',
      'foto' => 'mimes:jpeg,png,jpg|max:2048'
    ]);

    $id_peraturan = $request->id;
    $data_peraturan = Anggota::where('id', $id_peraturan)->first();
    $files = $request->file('foto');

    if ($id_peraturan == NULL && !$request->file('foto')) {
      $file_name = "anggota.jpg";
    } elseif ($id_peraturan == NULL && $request->file('foto')) {
      $file_name = date('YmdHis') . "." . $files->getClientOriginalExtension();
      Storage::disk('local')->putFileAs('public/images/anggota', $files, $file_name);
    } elseif ($id_peraturan == $data_peraturan->id && $request->file('foto')) {
      Storage::delete('/public/images/anggota/' . $data_peraturan->foto);
      $file_name = date('YmdHis') . "." . $files->getClientOriginalExtension();
      Storage::disk('local')->putFileAs('public/images/anggota', $files, $file_name);
    } else {
      $file_name = $data_peraturan->foto;
    }

    $post = Anggota::updateOrCreate(
      ['id' => $request->id],
      [
        'nama' => $request->nama,
        'alamat' => $request->alamat,
        'jenis_kelamin' => $request->jenis_kelamin,
        'telp' => $request->telp,
        'tahun_terdaftar' => $request->tahun,
        'regency_id' => $request->regency,
        'sabuk_id' => $request->sabuk,
        'dojeng_id' => $request->dojeng,
        'photo' => $file_name
      ]
    );

    return response()->json($post);
  }

  public function edit($id)
  {
    $post = Anggota::findOrfail($id);
    return response()->json($post);
  }

  public function destroy($id)
  {
    $post = Anggota::findOrFail($id);
    Storage::delete('public/images/anggota/' . $post->foto);
    $post->delete();
    return response()->json($post);
  }
}
