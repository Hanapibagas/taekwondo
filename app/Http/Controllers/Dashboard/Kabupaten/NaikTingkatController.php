<?php

namespace App\Http\Controllers\Dashboard\Kabupaten;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\NaikTingkat;
use App\Models\Regency;
use App\Models\Sabuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class NaikTingkatController extends Controller
{
  public function index(Request $request)
  {
    $regency = Auth::user()->regency;

    // $data = NaikTingkat::with('anggota.sabuk', 'anggota.regency', 'sabuk')->where('regency_id', $regency)->get();
    // foreach ($data as $datas) {
    // $nama = $data->anggota->nama;
    # code...
    // }
    // return response()->json($data);
    // return response()->json($nama);

    if ($request->ajax()) {
      $data = NaikTingkat::with('anggota.sabuk', 'anggota.regency', 'sabuk')->where('regency_id', $regency->id)->get();
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

    // $data = NaikTingkat::with('anggota.sabuk', 'anggota.regency', 'sabuk')->get();
    $regency = Auth::user()->regency;
    // return response()->json($regency);

    $sabuks = Sabuk::all();
    $regencys = Regency::where('province_id', 73)->get();
    $anggotas = Anggota::where('regency_id', $regency->id)->get();

    // return response()->json($anggotas);

    return view('dashboard.kabupaten.naik-tingkat.index', compact('sabuks', 'anggotas', 'regencys'));
  }

  public function store(Request $request)
  {
    if ($request->id == NULL) {
      $request->validate([
        'anggota' => 'required',
        'tgl_pengajuan' => 'required',
        'sabuk' => 'required',
      ]);
    }

    $request->validate([
      'anggota' => 'required',
      'tgl_pengajuan' => 'required',
      'sabuk' => 'required',
    ]);

    // $id_peraturan = $request->id;
    // $data_peraturan = NaikTingkat::where('id', $id_peraturan)->first();

    $regency = Auth::user()->regency;

    $post = NaikTingkat::updateOrCreate(
      ['id' => $request->id],
      [
        'anggota_id' => $request->anggota,
        'tgl_pengajuan' => $request->tgl_pengajuan,
        'sabuk_id' => $request->sabuk,
        'regency_id' => $regency->id,
        'status'  => 'pengajuan'
      ]
    );

    return response()->json($post);
  }

  public function edit($id)
  {
    $post = NaikTingkat::findOrfail($id);
    return response()->json($post);
  }

  public function destroy($id)
  {
    $post = NaikTingkat::findOrFail($id);
    $post->delete();
    return response()->json($post);
  }
}
