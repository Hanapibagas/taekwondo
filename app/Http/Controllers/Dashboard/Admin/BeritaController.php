<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class BeritaController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    if ($request->ajax()) {
      $data = Berita::latest()->get();
      return DataTables::of($data)
        ->addColumn('image', function ($data) {
          $url = asset('storage/images/berita/' . $data->image);
          $colGambar = "
                    <img src='$url' alt='' style='width:150px; height:100px; border-radius:0%;' >
                    ";
          return $colGambar;
        })
        ->addColumn('action', function ($data) {
          $button = "<a href='/admin/edit-berita/$data->id' class='btn btn-success edit-data p-2'>Edit</a>";
          $button .= '&nbsp;&nbsp;';
          $button .= '<button type="button"  id="' . $data->id . '" class="btn btn-danger delete-data p-2">Hapus</button>';
          return $button;
        })
        ->rawColumns(['action', 'image'])
        ->addIndexColumn()
        ->make(true);
      // } else {
      //     return abort(404);
    }

    return view('dashboard.admin.berita.index');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    if ($request->id == NULL) {
      $request->validate([
        'judul' => 'required',
        'desc' => 'required',
        'tgl' => 'required',
        'image' => 'required|mimes:jpeg,png,jpg,doc,docx,pdf,xlsx,xls|max:2048'
      ]);
    }

    $request->validate([
      'judul' => 'required',
      'desc' => 'required',
      'tgl' => 'required',
      'image' => 'mimes:jpeg,png,jpg,doc,docx,pdf,xlsx,xls|max:2048'
    ]);


    $id_kebijakan = $request->id;
    $data_kebijakan = Berita::where('id', $id_kebijakan)->first();
    $files = $request->file('image');


    if ($id_kebijakan == NULL && !$request->file('image')) {
      $file_name = "avatar.png";
    } elseif ($id_kebijakan == NULL && $request->file('image')) {
      $file_name = date('YmdHis') . "." . $files->getClientOriginalExtension();
      Storage::disk('local')->putFileAs('public/images/berita/', $files, $file_name);
    } elseif ($id_kebijakan == $data_kebijakan->id && $request->file('image')) {
      Storage::delete('/public/images/berita/' . $data_kebijakan->foto);
      $file_name = date('YmdHis') . "." . $files->getClientOriginalExtension();
      Storage::disk('local')->putFileAs('public/images/berita/', $files, $file_name);
    } else {

      $file_name = $data_kebijakan->image;
    }

    $post = Berita::updateOrCreate(
      ['id' => $request->id],
      [
        'title' => $request->judul,
        'desc' => $request->desc,
        'tgl' => $request->tgl,
        'image' => $file_name

      ]
    );

    return response()->json($post);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $post = Berita::findOrfail($id);
    // return response()->json($post);
    return view('dashboard.admin.berita.edit', compact('post'));
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
    $request->validate([
      'judul' => 'required',
      'desc' => 'required',
      'tgl' => 'required',
      'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);
    // $post = Post::findOrFail($id);
    $id_kebijakan = $id;
    $data_kebijakan = Berita::where('id', $id_kebijakan)->first();
    $files = $request->file('image');

    if ($id_kebijakan == NULL && !$request->file('image')) {
      $file_name = "avatar.png";
    } elseif ($id_kebijakan == NULL && $request->file('image')) {
      $file_name = date('YmdHis') . "." . $files->getClientOriginalExtension();
      Storage::disk('local')->putFileAs('public/images/berita/', $files, $file_name);
    } elseif ($id_kebijakan == $data_kebijakan->id && $request->file('image')) {
      Storage::delete('/public/images/berita/' . $data_kebijakan->foto);
      $file_name = date('YmdHis') . "." . $files->getClientOriginalExtension();
      Storage::disk('local')->putFileAs('public/images/berita/', $files, $file_name);
    } else {
      $file_name = $data_kebijakan->image;
    }

    $data_kebijakan->update(
      [
        'title' => $request->judul,
        'desc' => $request->desc,
        'tgl' => $request->tgl,
        'image' => $file_name

      ]
    );

    if ($data_kebijakan) {
      return redirect()
        ->route('berita.index')
        ->with([
          'success' => 'Data Berhasil DiUbah'
        ]);
    } else {
      return redirect()
        ->back()
        ->withInput()
        ->with([
          'error' => 'Some problem has occured, please try again'
        ]);
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $post = Berita::findOrFail($id);
    Storage::delete('public/images/berita/' . $post->image);
    $post->delete();
    return response()->json($post);
  }
}
