<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\Province;
use App\Models\Ranting;
use App\Models\Regency;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class RantingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Ranting::with('Regency')->get();
            // return response()->json($data);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '
                    <a href="javascript:void(0)" data-toggle="tooltip" onClick="editFunc('.$row->id.')" data-original-title="Edit" class="edit btn btn-success edit">
                    Edit
                    </a>
                    <a href="javascript:void(0);" id="delete-anggota" onClick="deleteFunc('.$row->id.')" data-toggle="tooltip" data-original-title="Delete" class="delete btn btn-danger">
                    Delete
                    </a>
                    ';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        // echo 'tstt';
        // Cari berdasarkan nama
        $province = Province::where('name', 'SULAWESI SELATAN')->first();

        // Get Kabupaten/Kota dari sebuah Provinsi
        $regencies = $province->regencies;
        // return response()->json($regencies);

        return view('dashboard.admin.data_ranting.index', compact('regencies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            // 'nama_ranting' => 'required',
            'alamat' => 'required',
            'kabupaten' => 'required'
        ]);

        $post = Ranting::updateOrCreate(
            ['id' => $request->id],
            [
                'nama_ranting' => $request->nama_ranting,
                'alamat' => $request->alamat,
                'kabupaten_id' => $request->kabupaten
            ]
        );

        return response()->json($post);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $where = array('id' => $request->id);
        $anggota  = Ranting::where($where)->first();

        return Response()->json($anggota);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $anggota = Ranting::where('id',$request->id)->delete();

        return Response()->json($anggota);
    }

    public function portal()
    {
        return view('portal.pages.ranting');
    }
}
