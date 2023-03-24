<?php

namespace App\Http\Controllers\Dashboard\Provinsi;

use App\Http\Controllers\Controller;
use App\Models\Dojeng;
use App\Models\Regency;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;

class DojengController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Dojeng::all();
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

        // return response()->json($regencys);

        return view('dashboard.admin.dojeng.index');
        // $kabupaten = Regency::where('province_id', 73)->get();
        // return view('dashboard.admin.dojeng.index', compact('kabupaten'));
    }

    public function store(Request $request)
    {

        if ($request->id == NULL) {
            $request->validate([
                'name' => 'required',
                'pelatih' => 'required',
                'alamat' => 'required',
                'kontak' => 'required',
                'kacamatan' => 'required',
                'kabupaten' => 'required',
                'deskripsi' => 'required',
                'foto' => 'required'
            ]);
        }

        $request->validate([
            'name' => 'required',
            'pelatih' => 'required',
            'alamat' => 'required',
            'kontak' => 'required',
            'kacamatan' => 'required',
            'kabupaten' => 'required',
            'deskripsi' => 'required',
            'foto' => 'required'
        ]);

        $id_peraturan = $request->id;
        $data_peraturan = Dojeng::where('id', $id_peraturan)->first();
        $files = $request->file('foto');

        if ($id_peraturan == NULL && !$request->file('foto')) {
            $file_name = "dojang.jpg";
        } elseif ($id_peraturan == NULL && $request->file('foto')) {
            $file_name = date('YmdHis') . "." . $files->getClientOriginalExtension();
            Storage::disk('local')->putFileAs('public/images/dojang', $files, $file_name);
        } elseif ($id_peraturan == $data_peraturan->id && $request->file('foto')) {
            Storage::delete('/public/images/dojang/' . $data_peraturan->foto);
            $file_name = date('YmdHis') . "." . $files->getClientOriginalExtension();
            Storage::disk('local')->putFileAs('public/images/dojang', $files, $file_name);
        } else {
            $file_name = $data_peraturan->foto;
        }


        $post = Dojeng::updateOrCreate(
            ['id' => $request->id],
            [
                'name' => $request->name,
                'pelatih' => $request->pelatih,
                'alamat' => $request->alamat,
                'kontak' => $request->kontak,
                'kacamatan' => $request->kacamatan,
                'kabupaten' => $request->kabupaten,
                'deskripsi' => $request->deskripsi,
                'foto' => $file_name ?? "",
            ]
        );

        return redirect()->route('portal.pendaftaran.dojang');
    }

    public function edit($id)
    {
        $post = Dojeng::findOrfail($id);
        return response()->json($post);
    }

    public function destroy($id)
    {
        $post = Dojeng::findOrFail($id);
        $post->delete();
        return response()->json($post);
    }
}
