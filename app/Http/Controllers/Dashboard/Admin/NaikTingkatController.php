<?php

namespace App\Http\Controllers\Dashboard\Admin;

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
    // $data = NaikTingkat::with('anggota.sabuk', 'anggota.regency', 'sabuk')->get();
    // return response()->json($data);
    // return response()->json($nama);

    if ($request->ajax()) {
      $data = NaikTingkat::with('anggota.sabuk', 'anggota.regency', 'sabuk')->where('status', 'pengajuan')->get();
      // $data = NaikTingkat::with('anggota.sabuk', 'anggota.regency', 'sabuk')->get();
      return DataTables::of($data)
        ->addColumn('action', function ($data) {
          $button = "<a href='javascript:void(0)' data-id='$data->id' class='btn btn-success edit-data p-2'>Terima</a>";
          $button .= '&nbsp;&nbsp;';
          $button .= '<button type="button"  id="' . $data->id . '" class="btn btn-danger delete-data p-2">Tolak</button>';
          return $button;
        })
        ->rawColumns(['action'])
        ->addIndexColumn()
        ->make(true);
    }

    // $data = NaikTingkat::with('anggota.sabuk', 'anggota.regency', 'sabuk')->get();

    // $sabuks = Sabuk::all();
    // $regencys = Regency::where('province_id', 73)->get();
    // $anggotas = Anggota::where('regency_id', $regency->id)->get();

    // return response()->json($anggotas);

    return view('dashboard.admin.naik-tingkat.index');
  }

  // public function store(Request $request)
  // {
  // if ($request->id == NULL) {
  //   $request->validate([
  //     'anggota' => 'required',
  //     'sabuk' => 'required',
  //   ]);
  // }

  // $request->validate([
  //   'anggota' => 'required',
  //   'sabuk' => 'required',
  // ]);

  //   $id = $request->id;
  //   $data_anggota = NaikTingkat::with('anggota')->where('id', $id)->first();
  //   return response()->json($data_anggota);
  //   // $regency = Auth::user()->regency;
  //   $id_anggota = $data_anggota->anggota->id;
  //   $id_sabuk = $data_anggota->sabuk_id;
  //   $post = Anggota::updated(
  //     ['id' => $id_anggota],
  //     [
  //       'sabuk_id' => $id_sabuk
  //     ]
  //   );

  //   $post = NaikTingkat::findOrFail($id);
  //   $post->update([
  //     'status' => 'berhasil'
  //   ]);

  //   return response()->json($post);
  // }

  // public function edit($id)
  // {
  //   $post = NaikTingkat::findOrfail($id);
  //   return response()->json($post);
  // }

  public function tolak($id)
  {
    $post = NaikTingkat::findOrFail($id);
    $post->update([
      'status' => 'Ditolak'
    ]);

    return response()->json($post);
  }

  public function terima(Request $request, $id)
  {
    $post = NaikTingkat::with('anggota')->findOrFail($id);
    // return response()->json($post);

    Anggota::whereId($post->anggota->id)->update([
      'sabuk_id' => $post->sabuk_id,
    ]);

    $post->update([
      'status' => 'Disetujui',
      'tgl_disetujui' => date('Y-m-d'),
    ]);

    return response()->json($post);
  }
}
