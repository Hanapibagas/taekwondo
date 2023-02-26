<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;

use App\Models\AdArt;
use App\Models\Agenda;
use App\Models\Anggota;
use App\Models\Berita;
use App\Models\Materi;
use App\Models\Pelatih;
use App\Models\Pengumuman;
use App\Models\Pengurus;
use App\Models\Peraturan;
use App\Models\Photo;
use App\Models\ProgramKerja;
use App\Models\Regency;
use App\Models\Sabuk;
use App\Models\SambutanKetua;
use App\Models\Saran;
use App\Models\SejarahPerkembangan;
use App\Models\Slider;
use App\Models\Testimoni;
use App\Models\StrukturKepengurusan;
use App\Models\Video;
use App\Models\Wasit;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PortalController extends Controller
{
    public function home()
    {
        $sambutan = SambutanKetua::first();
        $berita = Berita::all();
        $testimoni = Testimoni::all();
        // $slider = Slider::first();
        $sliders = Slider::all();

        // return response()->json($sliders);
        return view('portal.pages.home.index', compact('sambutan', 'berita', 'testimoni', 'sliders'));
    }

    public function sambutan()
    {
        $sambutan = SambutanKetua::with('pengurus.anggota')->first();
        // return Response()->json($sambutan);
        return view('portal.pages.tentang.sambutan_ketua', compact('sambutan'));
    }

    public function sejarah()
    {
        $sejarah = SejarahPerkembangan::first();
        return view('portal.pages.tentang.sejarah_perkembangan', compact('sejarah'));
    }

    public function struktur()
    {
        $data = StrukturKepengurusan::first();
        $datas = Pengurus::with(['anggota', 'jabatan'])->get();
        // return response()->json($datas);
        return view('portal.pages.tentang.struktur_kepengurusan', compact('data', 'datas'));
    }

    public function pencab()
    {
        $data = Regency::where('province_id', 73)->get();
        // return response()->json($data);
        return view('portal.pages.tentang.pencab.pencap', compact('data'));
    }

    public function detailPencab($id)
    {
        // $data = Pengurus::with('regency')->where('regencie_id', $id)->get();
        $data = Pengurus::with('anggota', 'jabatan')->orderBy('jabatan_id', 'asc')->where('regency_id', $id)->get();
        $kab = Regency::where('id', $id)->first();

        // return response()->json($data);

        return view('portal.pages.tentang.pencab.detail', compact('data', 'kab'));
    }

    public function program()
    {
        $data = ProgramKerja::all();
        return view('portal.pages.tentang.program_kerja', compact('data'));
    }

    public function downloadProgram($id)
    {
        $data = ProgramKerja::where('id', $id)->first();
        $pathToFile = storage_path('app/public/lampiran/program-kerja/' . $data->program_kerja);
        return response()->download($pathToFile);
    }

    public function ad()
    {
        $data = AdArt::where('id', 1)->first();
        return view('portal.pages.tentang.ad_art', compact('data'));
    }

    public function downloadAdArt($id)
    {
        $data = AdArt::where('id', $id)->firstOrFail();
        $pathToFile = storage_path('app/public/lampiran/ad-art/' . $data->file);
        return response()->download($pathToFile);
    }

    public function peraturan()
    {
        $data = Peraturan::all();
        return view('portal.pages.peraturan', compact('data'));
    }

    public function download($id)
    {
        $data = Peraturan::where('id', $id)->firstOrFail();
        $pathToFile = storage_path('app/public/lampiran/peraturan/' . $data->file);
        return response()->download($pathToFile);
    }

    public function photo()
    {
        $data = Photo::all();
        return view('portal.pages.galery.photo', compact('data'));
    }

    public function video()
    {
        $data = Video::all();

        return view('portal.pages.galery.video', compact('data'));
    }

    // public function anggotas()
    // {
    //   $datas = Anggota::with('sabuk', 'dojeng', 'regency')->get();
    //   return view('portal.pages.keanggotaan.data_anggota', compact('datas'));
    // }

    public function anggotas(Request $request)
    {
        if ($request->ajax()) {
            $data = Anggota::with('sabuk', 'dojeng', 'regency')->get();
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

        $regencys = Regency::where('province_id', 73)->get();
        // $id_regency = $request->id_regency;

        $anggotas = Anggota::all();
        // return response()->json($regencys);

        return view('portal.pages.keanggotaan.data_anggota', compact('regencys', 'anggotas'));
    }

    // public function getAnggota(Request $request)
    // {
    //   $id_regency = $request->id_regency;

    //   $anggotas = Anggota::where('regency_id', $id_regency)->get();

    //   $regencys = Regency::where('province_id', 73)->get();
    //   return response()->json($anggotas);

    //   return view('portal.pages.keanggotaan.data_anggota', compact('regencys', 'anggotas'));
    //   // return response()->json($anggotas);
    //   // if ($anggotas->count() == 0) {
    //   //   echo "<option>Tidak ada anggota</option>";
    //   // } else {
    //   //   foreach ($anggotas as $anggota) {
    //   //     echo "<option value='$anggota->id'>$anggota->nama</option>";
    //   //   }
    //   // }
    // }

    public function wasit()
    {
        $data = Wasit::all();
        return view('portal.pages.keanggotaan.data_wasit', compact('data'));
    }

    public function pelatih()
    {
        $datas = Pelatih::with('sabuk', 'dojeng', 'regency')->get();
        return view('portal.pages.keanggotaan.data_pelatih', compact('datas'));
    }

    public function berita()
    {
        $berita = Berita::all();
        $terkini = Berita::orderBy('updated_at', 'DESC')->take(4)->get();

        return view('portal.pages.berita.index', compact('berita', 'terkini'));
    }

    public function detailBerita($id)
    {
        $detail = Berita::findOrFail($id);
        $berita = Berita::orderBy('updated_at', 'DESC')->take(4)->get();
        // return response()->json($berita);
        return view('portal.pages.berita.detail', compact('berita', 'detail'));
    }

    public function pengumuman()
    {
        $data = Pengumuman::all();
        return view('portal.pages.pengumuman.index', compact('data'));
    }

    public function downloadPengumuman($id)
    {
        $data = Materi::where('id', $id)->first();
        $pathToFile = storage_path('app/public/lampiran/pengumuman/' . $data->file);
        return response()->download($pathToFile);
    }

    public function materi()
    {
        $data = Materi::all();
        return view('portal.pages.materi.index', compact('data'));
    }

    public function downloadMateri($id)
    {
        $data = Materi::where('id', $id)->first();
        $pathToFile = storage_path('app/public/lampiran/materi/' . $data->file);
        return response()->download($pathToFile);
    }

    public function agenda()
    {
        $data = Agenda::all();
        return view('portal.pages.agenda.index', compact('data'));
    }

    public function downloadAgenda($id)
    {
        $data = Agenda::where('id', $id)->first();
        $pathToFile = storage_path('app/public/lampiran/agenda/' . $data->file);
        return response()->download($pathToFile);
    }

    public function saran()
    {
        return view('portal.pages.tentang.saran&kritik');
    }

    public function kirim_saran(Request $request)
    {
        Saran::create([
            'saran' => $request->input('saran')
        ]);

        // return response()->json($request);

        return redirect()->route('portal.struktur1');
    }
}
