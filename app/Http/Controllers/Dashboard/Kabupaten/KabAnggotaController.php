<?php

namespace App\Http\Controllers\Dashboard\Kabupaten;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\Dojeng;
use App\Models\Regency;
use App\Models\Sabuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class KabAnggotaController extends Controller
{
  public function index(Request $request)
  {
    $regency = Auth::user()->regency;
    // return response()->json($regency);

    // $data = Anggota::with('sabuk', 'dojeng')->where('regency_id', $regency->id)->get();
    // return response()->json($data);

    if ($request->ajax()) {
      $data = Anggota::with('sabuk', 'dojeng', 'regency')->where('regency_id', $regency->id)->get();
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

    return view('dashboard.kabupaten.anggota.index', compact('sabuks', 'dojengs', 'regencys'));
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
      $file_name = $data_peraturan->photo;
    }

    $regency = Auth::user()->regency;

    $post = Anggota::updateOrCreate(
      ['id' => $request->id],
      [
        'nama' => $request->nama,
        'alamat' => $request->alamat,
        'jenis_kelamin' => $request->jenis_kelamin,
        'telp' => $request->telp,
        'tahun_terdaftar' => $request->tahun,
        'regency_id' => $regency->id,
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
    Storage::delete('public/images/anggota/' . $post->photo);
    $post->delete();
    return response()->json($post);
  }
}
