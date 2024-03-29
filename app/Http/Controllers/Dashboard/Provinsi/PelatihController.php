<?php

namespace App\Http\Controllers\Dashboard\Provinsi;

use App\Http\Controllers\Controller;
use App\Models\Dojeng;
use App\Models\Pelatih;
use App\Models\Regency;
use App\Models\Sabuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class PelatihController extends Controller
{
  public function index(Request $request)
  {
    // return response()->json($data);
    if ($request->ajax()) {
      $data = Pelatih::with('sabuk', 'dojeng', 'regency')->get();
      // $data = Pelatih::latest()->get();
      return DataTables::of($data)
        ->addColumn('foto', function ($data) {
          $url = asset('storage/images/pelatih/' . $data->foto);
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

    // return response()->json($data);
    return view('dashboard.admin.pelatih.index', compact('sabuks', 'dojengs', 'regencys'));
  }

  public function store(Request $request)
  {
    if ($request->id == NULL) {
      $request->validate([
        'nama' => 'required',
        'foto' => 'required|mimes:jpeg,png,jpg,doc,docx,pdf,xlsx,xls|max:2048'
      ]);
    }

    $request->validate([
      'nama' => 'required',
      'foto' => 'mimes:jpeg,png,jpg|max:2048'
    ]);

    $id_peraturan = $request->id;
    $data_peraturan = Pelatih::where('id', $id_peraturan)->first();
    $files = $request->file('foto');

    if ($id_peraturan == NULL && !$request->file('foto')) {
      $file_name = "wasit.jpg";
    } elseif ($id_peraturan == NULL && $request->file('foto')) {
      $file_name = date('YmdHis') . "." . $files->getClientOriginalExtension();
      Storage::disk('local')->putFileAs('public/images/pelatih', $files, $file_name);
    } elseif ($id_peraturan == $data_peraturan->id && $request->file('foto')) {
      Storage::delete('/public/images/pelatiha/' . $data_peraturan->foto);
      $file_name = date('YmdHis') . "." . $files->getClientOriginalExtension();
      Storage::disk('local')->putFileAs('public/images/pelatih', $files, $file_name);
    } else {
      $file_name = $data_peraturan->foto;
    }

    $post = Pelatih::updateOrCreate(
      ['id' => $request->id],
      [
        'nama' => $request->nama,
        'foto' => $file_name,
        'sabuk_id' => $request->sabuk,
        'dojeng_id' => $request->dojeng,
        'regency_id' => $request->regency
      ]
    );

    return redirect()->route('portal.pendaftaran.pelatih');
  }

  public function edit($id)
  {
    $post = Pelatih::findOrfail($id);
    return response()->json($post);
  }

  public function destroy($id)
  {
    $post = Pelatih::findOrFail($id);
    Storage::delete('public/images/pelatih/' . $post->foto);
    $post->delete();
    return response()->json($post);
  }
}
