<?php

namespace App\Http\Controllers\Dashboard\Kabupaten;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\Jabatan;
use App\Models\Pengurus;
use App\Models\Regency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class KabPengurusController extends Controller
{
  public function index(Request $request)
  {
    $regency = Auth::user()->regency;
    // return response()->json($regency);

    // $data = Pengurus::with('jabatan', 'anggota.regency')->where('regency_id', $regency->id)->get();
    // return response()->json($data);
    // dd($request);
    if ($request->ajax()) {
      $data = Pengurus::with('jabatan', 'anggota.regency', 'anggota.sabuk', 'anggota.dojeng')->where('regency_id', $regency->id)->get();
      return DataTables::of($data)
        ->addColumn('foto', function ($data) {
          $url = asset('storage/images/anggota/' . $data->anggota->photo);
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

    // $members = $request->regency;
    // return response()->json($members);

    $jabatans = Jabatan::all();
    $anggotas = Anggota::where('regency_id', $regency->id)->get();
    // return response()->json($anggotas);

    return view('dashboard.kabupaten.pengurus.index', compact('anggotas', 'jabatans'));
  }

  public function store(Request $request)
  {
    if ($request->id == NULL) {
      $request->validate([
        'anggota' => 'required',
        'jabatan' => 'required',

      ]);
    }

    $request->validate([
      'anggota' => 'required',
      'jabatan' => 'required',

    ]);

    $regency = Auth::user()->regency;

    $post = Pengurus::updateOrCreate(
      ['id' => $request->id],
      [
        'anggota_id' => $request->anggota,
        'jabatan_id' => $request->jabatan,
        'regency_id' => $regency->id,
      ]
    );

    return response()->json($post);
  }

  public function edit($id)
  {
    $post = Pengurus::findOrfail($id);
    return response()->json($post);
  }

  public function destroy($id)
  {
    $post = Pengurus::findOrFail($id);
    // Storage::delete('public/images/anggota/' . $post->foto);
    $post->delete();
    return response()->json($post);
  }
}
