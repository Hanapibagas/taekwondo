<?php

namespace App\Http\Controllers\Dashboard\Provinsi;

use App\Http\Controllers\Controller;

use App\Imports\WasitsImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Wasit;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\DataTables;

class WasitController extends Controller
{
  public function index(Request $request)
  {
    if ($request->ajax()) {
      $data = Wasit::latest()->get();
      return DataTables::of($data)
        ->addColumn('foto', function ($data) {
          $url = asset('storage/images/wasit/' . $data->foto);
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

    return view('dashboard.admin.wasit.index');
  }

  public function store(Request $request)
  {
    if ($request->id == NULL) {
      $request->validate([
        'nama' => 'required',
        'status_wasit' => 'required',
        'kelas' => 'required',
        'dan' => 'required',
        'pwn' => 'required',
        'dwn' => 'required',
        'pwd' => 'required',
        'dwd' => 'required',
        'foto' => 'required|mimes:jpeg,png,jpg,doc,docx,pdf,xlsx,xls|max:2048'
      ]);
    }

    $request->validate([
      'nama' => 'required',
      'status_wasit' => 'required',
      'kelas' => 'required',
      'dan' => 'required',
      'pwn' => 'required',
      'dwn' => 'required',
      'pwd' => 'required',
      'dwd' => 'required',
      'foto' => 'mimes:jpeg,png,jpg|max:2048'
    ]);

    $id_peraturan = $request->id;
    $data_peraturan = Wasit::where('id', $id_peraturan)->first();
    $files = $request->file('foto');

    if ($id_peraturan == NULL && !$request->file('foto')) {
      $file_name = "wasit.jpg";
    } elseif ($id_peraturan == NULL && $request->file('foto')) {
      $file_name = date('YmdHis') . "." . $files->getClientOriginalExtension();
      Storage::disk('local')->putFileAs('public/images/wasit', $files, $file_name);
    } elseif ($id_peraturan == $data_peraturan->id && $request->file('foto')) {
      Storage::delete('/public/images/wasit/' . $data_peraturan->foto);
      $file_name = date('YmdHis') . "." . $files->getClientOriginalExtension();
      Storage::disk('local')->putFileAs('public/images/wasit', $files, $file_name);
    } else {
      $file_name = $data_peraturan->foto;
    }

    $post = Wasit::updateOrCreate(
      ['id' => $request->id],
      [
        'nama' => $request->nama,
        'status_wasit' => $request->status_wasit,
        'kelas' => $request->kelas,
        'dan' => $request->dan,
        'pwn' => $request->pwn,
        'dwn' => $request->dwn,
        'pwd' => $request->pwd,
        'dwd' => $request->dwd,
        'foto' => $file_name
      ]
    );

    return response()->json($post);
  }

  public function edit($id)
  {
    $post = Wasit::findOrfail($id);
    return response()->json($post);
  }

  public function destroy($id)
  {
    $post = Wasit::findOrFail($id);
    Storage::delete('public/images/wasit/' . $post->foto);
    $post->delete();
    return response()->json($post);
  }

  public function import_excel(Request $request)
  {
    // dd($request->all());
    $validator = Validator::make($request->all(), [
      'data' => 'required|mimes:csv,xls,xlsx'
    ]);

    // return response()->json($validator);
    // return response()->json($request);

    if ($validator->fails()) {
      Alert::error('Gagal', $validator->errors()->first());
    } else {
      $file = $request->file('data');
      //   return response()->json($file);
      $nama_file = rand() . $file->getClientOriginalName();

      $file->move('imports/data-wasit', $nama_file);

      Excel::import(new WasitsImport, public_path('/imports/data-wasit/' . $nama_file));
      // $import = Excel::import(new WasitsImport, $file);

      // return $import;
      Alert::success('Success', 'Import Data');
    }

    return redirect()->route('wasit.index');
  }
}
