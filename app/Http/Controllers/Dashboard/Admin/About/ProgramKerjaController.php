<?php

namespace App\Http\Controllers\Dashboard\Admin\About;

use App\Http\Controllers\Controller;
use App\Models\ProgramKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class ProgramKerjaController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = ProgramKerja::latest()->get();
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

        return view('dashboard.admin.tentang.program_kerja.index');
    }

    public function edit($id)
    {
        $post = ProgramKerja::findOrfail($id);
        return response()->json($post);
    }

    public function store(Request $request)
    {
        // return response()->json($request);

        if ($request->id == NULL) {
            $request->validate([
                'nama' => 'required',
                'program_kerja' => 'required|mimes:jpeg,png,jpg,doc,docx,pdf,xlsx,xls|max:2048'
            ]);
        }

        $request->validate([
            'nama' => 'required',
            'program_kerja' => 'mimes:jpeg,png,jpg,doc,docx,pdf,xlsx,xls|max:2048'
        ]);

        $id_kebijakan = $request->id;
        $data_program = ProgramKerja::where('id', $id_kebijakan)->first();
        $files = $request->file('program_kerja');

        if ($id_kebijakan == NULL && !$request->file('program_kerja')) {
            $file_name = "program.pdf";
        } elseif ($id_kebijakan == NULL && $request->file('program_kerja')) {
            $file_name = date('YmdHis') . "." . $files->getClientOriginalExtension();
            Storage::disk('local')->putFileAs('public/lampiran/program-kerja/', $files, $file_name);
        } elseif ($id_kebijakan == $data_program->id && $request->file('program_kerja')) {
            Storage::delete('/public/lampiran/lakip/' . $data_program->program_kerja);
            $file_name = date('YmdHis') . "." . $files->getClientOriginalExtension();
            Storage::disk('local')->putFileAs('public/lampiran/program-kerja/', $files, $file_name);
        } else {
            $file_name = $data_program->program_kerja;
        }

        $post = ProgramKerja::updateOrCreate(
            ['id' => $request->id],
            [
                'nama' => $request->nama,
                'program_kerja' => $file_name
            ]
        );

        return response()->json($post);
    }

    public function destroy($id)
    {
        $post = ProgramKerja::findOrFail($id);
        Storage::delete('public/lampiran/program-kerja/' . $post->program_kerja);
        $post->delete();
        return response()->json($post);
    }
}
