<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;

use App\Http\Controllers\Dashboard\Admin\About\StrukturKepengurusanController;
use App\Http\Controllers\Dashboard\Admin\About\SejarahPerkembanganController;
use App\Http\Controllers\Dashboard\Admin\About\SambutanKetuaUmumController;
use App\Http\Controllers\Dashboard\Admin\About\ProgramKerjaController;
use App\Http\Controllers\Dashboard\Admin\About\PencabController;
use App\Http\Controllers\Dashboard\Admin\About\AdArtController;
use App\Http\Controllers\Dashboard\Admin\About\CalonMemberController;
use App\Http\Controllers\Dashboard\Admin\About\SaranController;
use App\Http\Controllers\Dashboard\Admin\AgendaController;
use App\Http\Controllers\Dashboard\Admin\DashboardController;
use App\Http\Controllers\Dashboard\Admin\BeritaController;
use App\Http\Controllers\Dashboard\Admin\MateriController;
use App\Http\Controllers\Dashboard\Admin\NaikTingkatController as AdminNaikTingkatController;
use App\Http\Controllers\Dashboard\Admin\PengumumanController;
use App\Http\Controllers\Dashboard\Admin\PeraturanController;
use App\Http\Controllers\Dashboard\Admin\PhotoController;
use App\Http\Controllers\Dashboard\Admin\SliderController;
use App\Http\Controllers\Dashboard\Admin\VideoController;

use App\Http\Controllers\Dashboard\Kabupaten\KabAnggotaController;
use App\Http\Controllers\Dashboard\Kabupaten\KabDojengController;
use App\Http\Controllers\Dashboard\Kabupaten\KabPengurusController;
use App\Http\Controllers\Dashboard\Kabupaten\NaikTingkatController;

use App\Http\Controllers\Dashboard\Provinsi\AnggotaController;
use App\Http\Controllers\Dashboard\Provinsi\DojengController;
use App\Http\Controllers\Dashboard\Provinsi\JabatanController;
use App\Http\Controllers\Dashboard\Provinsi\WasitController;
use App\Http\Controllers\Dashboard\Provinsi\PelatihController;
use App\Http\Controllers\Dashboard\Provinsi\PengujiController;
use App\Http\Controllers\Dashboard\Provinsi\PengurusController;
use App\Http\Controllers\Dashboard\Provinsi\SabukController;

use App\Http\Controllers\Portal\PortalController;

use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/admin', function () {
//     return view('dashboard.dashboard');
// });

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

// Role : Admin
Route::middleware(['auth', 'role:1'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('dasborad',  [DashboardController::class, 'index'])->name('dashboard');

        Route::get('calon-murid', [CalonMemberController::class, 'index'])->name('index.calon.member');

        // Portal tentang
        // Sambutan
        Route::get('sambutan-ketua', [SambutanKetuaUmumController::class, 'index'])->name('sambutan-ketua');
        Route::post('sambutan-ketua/{id}', [SambutanKetuaUmumController::class, 'update'])->name('sambutan.update');

        // Sejarah
        Route::get('sejarah-perkembangan', [SejarahPerkembanganController::class, 'index'])->name('sejarah-perkembangan');
        Route::post('sejarah-perkembangan/{id}', [SejarahPerkembanganController::class, 'update'])->name('sejarah.update');

        // Struktur pengurus
        Route::get('struktur-kepengurusan', [StrukturKepengurusanController::class, 'index'])->name('struktur-kepengurusan');
        Route::post('struktur-kepengurusan/{id}', [StrukturKepengurusanController::class, 'update'])->name('struktur.update');

        // Pencap
        Route::get('pencap', [PencabController::class, 'index'])->name('pencab');

        // Program kerja
        Route::get('program-kerja', [ProgramKerjaController::class, 'index'])->name('program-kerja');
        Route::post('store-program', [ProgramKerjaController::class, 'store'])->name('program.store');
        Route::get('edit-program/{id}', [ProgramKerjaController::class, 'edit'])->name('program.edit');
        Route::get('delete-program/{id}', [ProgramKerjaController::class, 'destroy'])->name('program.delete');

        // Ad Art
        Route::get('ad-art', [AdArtController::class, 'index'])->name('ad-art');
        Route::post('ad-art/{id}', [AdArtController::class, 'update'])->name('ad.update');

        // Saran
        Route::get('saran', [SaranController::class, 'index'])->name('index-saran');

        // Portal Berita
        // Berita
        Route::get('berita', [BeritaController::class, 'index'])->name('berita.index');
        Route::post('store-berita', [BeritaController::class, 'store'])->name('berita.store');
        Route::post('update-berita/{id}', [BeritaController::class, 'update'])->name('berita.update');
        Route::get('edit-berita/{id}', [BeritaController::class, 'edit'])->name('berita.edit');
        Route::get('delete-berita/{id}', [BeritaController::class, 'destroy'])->name('berita.delete');

        // Portal Peraturan
        // Peraturan
        Route::get('peraturan', [PeraturanController::class, 'index'])->name('peraturan');
        Route::post('store-peraturan', [PeraturanController::class, 'store'])->name('peraturan.store');
        Route::get('edit-peraturan/{id}', [PeraturanController::class, 'edit'])->name('peraturan.edit');
        Route::get('delete-peraturan/{id}', [PeraturanController::class, 'destroy'])->name('peraturan.delete');

        // Portal Pengumuman
        Route::get('pengumuman', [PengumumanController::class, 'index'])->name('pengumuman.index');
        Route::post('store-pengumuman', [PengumumanController::class, 'store'])->name('pengumuman.store');
        Route::get('edit-pengumuman/{id}', [PengumumanController::class, 'edit'])->name('pengumuman.edit');
        Route::get('delete-pengumuman/{id}', [PengumumanController::class, 'destroy'])->name('pengumuman.delete');

        // Portal Materi
        Route::get('materi', [MateriController::class, 'index'])->name('materi');
        Route::post('store-materi', [MateriController::class, 'store'])->name('materi.store');
        Route::get('edit-materi/{id}', [MateriController::class, 'edit'])->name('materi.edit');
        Route::get('delete-materi/{id}', [MateriController::class, 'destroy'])->name('materi.delete');

        // Portal Agenda
        Route::get('agenda', [AgendaController::class, 'index'])->name('agenda.index');
        Route::post('store-agenda', [AgendaController::class, 'store'])->name('agenda.store');
        Route::get('edit-agenda/{id}', [AgendaController::class, 'edit'])->name('agenda.edit');
        Route::get('delete-agenda/{id}', [AgendaController::class, 'destroy'])->name('agenda.delete');

        // Portal Galery
        // Photo
        Route::get('photo', [PhotoController::class, 'index'])->name('photo.index');
        Route::post('store-photo', [PhotoController::class, 'store'])->name('photo.store');
        Route::get('edit-photo/{id}', [PhotoController::class, 'edit'])->name('photo.edit');
        Route::get('delete-photo/{id}', [PhotoController::class, 'destroy'])->name('photo.delete');

        // Video
        Route::get('video', [VideoController::class, 'index'])->name('video.index');
        Route::post('store-video', [VideoController::class, 'store'])->name('video.store');
        Route::get('edit-video/{id}', [VideoController::class, 'edit'])->name('video.edit');
        Route::get('delete-video/{id}', [VideoController::class, 'destroy'])->name('video.delete');

        // Portal Keanggotaan
        // Wasit
        Route::get('wasit', [WasitController::class, 'index'])->name('wasit.index');
        Route::post('store-wasit', [WasitController::class, 'store'])->name('wasit.store');
        Route::get('edit-wasit/{id}', [WasitController::class, 'edit'])->name('wasit.edit');
        Route::get('delete-wasit/{id}', [WasitController::class, 'destroy'])->name('wasit.delete');
        Route::post('wasit-import', [WasitController::class, 'import_excel'])->name('wasit.import');

        // Pelatih
        Route::get('pelatih', [PelatihController::class, 'index'])->name('pelatih.index');
        Route::post('store-pelatih', [PelatihController::class, 'store'])->name('pelatih.store');
        Route::get('edit-pelatih/{id}', [PelatihController::class, 'edit'])->name('pelatih.edit');
        Route::get('delete-pelatih/{id}', [PelatihController::class, 'destroy'])->name('pelatih.delete');

        // Anggota
        Route::get('anggota', [AnggotaController::class, 'index'])->name('anggota.index');
        Route::post('store-anggota', [AnggotaController::class, 'store'])->name('anggota.store');
        Route::get('edit-anggota/{id}', [AnggotaController::class, 'edit'])->name('anggota.edit');
        Route::get('delete-anggota/{id}', [AnggotaController::class, 'destroy'])->name('anggota.delete');

        // Slider
        Route::get('slider', [SliderController::class, 'index'])->name('slider');
        Route::post('store-slider', [SliderController::class, 'store'])->name('slider.store');
        Route::get('delete-slider/{id}', [SliderController::class, 'destroy'])->name('slider.delete');

        // Dashboard
        // Sabuk
        Route::get('sabuk', [SabukController::class, 'index'])->name('sabuk.index');
        Route::post('store-sabuk', [SabukController::class, 'store'])->name('sabuk.store');
        Route::get('edit-sabuk/{id}', [SabukController::class, 'edit'])->name('sabuk.edit');
        Route::get('delete-sabuk/{id}', [SabukController::class, 'destroy'])->name('sabuk.delete');

        // Dojeng
        Route::get('dojeng', [DojengController::class, 'index'])->name('dojeng.index');
        Route::post('store-dojeng', [DojengController::class, 'store'])->name('dojeng.store');
        Route::get('edit-dojeng/{id}', [DojengController::class, 'edit'])->name('dojeng.edit');
        Route::get('delete-dojeng/{id}', [DojengController::class, 'destroy'])->name('dojeng.delete');

        // Jabatan
        Route::get('jabatan', [JabatanController::class, 'index'])->name('jabatan.index');
        Route::post('store-jabatan', [JabatanController::class, 'store'])->name('jabatan.store');
        Route::get('edit-jabatan/{id}', [JabatanController::class, 'edit'])->name('jabatan.edit');
        Route::get('delete-jabatan/{id}', [JabatanController::class, 'destroy'])->name('jabatan.delete');

        // Penguji
        Route::get('penguji', [PengujiController::class, 'index'])->name('penguji.index');
        Route::post('store-penguji', [PengujiController::class, 'store'])->name('penguji.store');
        Route::get('edit-penguji/{id}', [PengujiController::class, 'edit'])->name('penguji.edit');
        Route::get('delete-penguji/{id}', [PengujiController::class, 'destroy'])->name('penguji.delete');

        // Pengurus
        Route::get('pengurus', [PengurusController::class, 'index'])->name('pengurus.index');
        Route::post('store-pengurus', [PengurusController::class, 'store'])->name('pengurus.store');
        Route::get('edit-pengurus/{id}', [PengurusController::class, 'edit'])->name('pengurus.edit');
        Route::get('delete-pengurus/{id}', [PengurusController::class, 'destroy'])->name('pengurus.delete');
        Route::post('getAnggota', [PengurusController::class, 'getAnggota'])->name('pengurus.getAnggota');

        // Kenaikan Tingkat
        Route::get('naik-tingkat', [AdminNaikTingkatController::class, 'index'])->name('tingkat.index');
        Route::post('store-tingkat', [AdminNaikTingkatController::class, 'store'])->name('tingkat.store');
        Route::get('terima-tingkat/{id}', [AdminNaikTingkatController::class, 'terima'])->name('tingkat.terima');
        Route::get('delete-tingkat/{id}', [AdminNaikTingkatController::class, 'destroy'])->name('tingkat.delete');
    });
});

// Role : Kabupaten
Route::middleware(['auth', 'role:2'])->group(function () {
    Route::prefix('kabupaten')->group(function () {
        Route::get('/', function () {
            return view('dashboard.kabupaten.index');
        });
        Route::get('pengurus', [KabPengurusController::class, 'index'])->name('kab.pengurus.index');
        Route::post('store-pengurus', [KabPengurusController::class, 'store'])->name('kab.pengurus.store');
        Route::get('edit-pengurus/{id}', [KabPengurusController::class, 'edit'])->name('kab.pengurus.edit');
        Route::get('delete-pengurus/{id}', [KabPengurusController::class, 'destroy'])->name('kab.pengurus.delete');

        Route::get('anggota', [KabAnggotaController::class, 'index'])->name('kab.anggota.index');
        Route::post('store-anggota', [KabAnggotaController::class, 'store'])->name('kab.anggota.store');
        Route::get('edit-anggota/{id}', [KabAnggotaController::class, 'edit'])->name('kab.anggota.edit');
        Route::get('delete-anggota/{id}', [KabAnggotaController::class, 'destroy'])->name('kab.anggota.delete');

        // Kenaikan Tingkat
        Route::get('naik-tingkat', [NaikTingkatController::class, 'index'])->name('kab.tingkat.index');
        Route::post('store-naik-tingkat', [NaikTingkatController::class, 'store'])->name('kab.tingkat.store');
        Route::get('edit-naik-tingkat/{id}', [NaikTingkatController::class, 'edit'])->name('kab.tingkat.edit');
        Route::get('delete-naik-tingkat/{id}', [NaikTingkatController::class, 'destroy'])->name('kab.tingkat.delete');

        // Dojeng
        Route::get('dojeng', [KabDojengController::class, 'index'])->name('kab.dojeng.index');
        Route::post('store-dojeng', [KabDojengController::class, 'store'])->name('kab.dojeng.store');
        Route::get('edit-dojeng/{id}', [KabDojengController::class, 'edit'])->name('kab.dojeng.edit');
        Route::get('delete-dojeng/{id}', [KabDojengController::class, 'destroy'])->name('kab.dojeng.delete');
    });
});

// ================================== Portal ===============================================
// Home
Route::get('/', [PortalController::class, 'home'])->name('portal.home');

// tentang
Route::prefix('tentang')->group(function () {
    Route::get('sambutan-ketua-umum', [PortalController::class, 'sambutan'])->name('portal.sambutan');
    Route::get('sejarah-dan-perkembangan', [PortalController::class, 'sejarah'])->name('portal.sejarah');

    Route::get('saran-kritik', [PortalController::class, 'saran'])->name('portal.struktur1');
    Route::post('kirim-saran-dan-kritik', [PortalController::class, 'kirim_saran'])->name('kirim_saran');

    Route::get('struktur-dan-kepengurusan', [PortalController::class, 'struktur'])->name('portal.struktur');
    Route::get('ad-art', [PortalController::class, 'ad'])->name('portal.ad');
    Route::get('ad-art/download/{id}', [PortalController::class, 'downloadAdArt'])->name('adArt.download');

    Route::get('pencab', [PortalController::class, 'pencab'])->name('portal.pencab');
    Route::get('pencab/detail/{id}', [PortalController::class, 'detailPencab'])->name('portal.pencab.detail');

    Route::get('program-kerja', [PortalController::class, 'program'])->name('portal.program');
    Route::get('program-kerja/download/{id}', [PortalController::class, 'downloadProgram'])->name('program.download');
});

// Berita
Route::group(['prefix' => 'berita'], function () {
    Route::get('/', [PortalController::class, 'berita'])->name('portal.berita');
    Route::get('detail/{id}', [PortalController::class, 'detailBerita'])->name('portal.detail');
});

// Peraturan
Route::get('peraturan', [PortalController::class, 'peraturan'])->name('portal.peraturan');
Route::get('peraturan/download/{id}', [PortalController::class, 'download'])->name('peraturan.download');

// Pengumuman
Route::get('pengumuman', [PortalController::class, 'pengumuman'])->name('portal.pengumuman');
Route::get('pengumuman/download/{id}', [PortalController::class, 'downloadPengumuman'])->name('pengumuman.download');

// Gallery
Route::prefix('galery')->group(function () {
    Route::get('photo', [PortalController::class, 'photo'])->name('portal.photo');
    Route::get('video', [PortalController::class, 'video'])->name('portal.video');
});

// Materi
Route::get('materi', [PortalController::class, 'materi'])->name('portal.materi');
Route::get('materi/download/{id}', [PortalController::class, 'downloadMateri'])->name('materi.download');

// Materi
Route::get('agenda', [PortalController::class, 'agenda'])->name('portal.agenda');
Route::get('agenda/download/{id}', [PortalController::class, 'downloadAgenda'])->name('agenda.download');

// Keanggotaan
Route::prefix('keanggotaan')->group(function () {
    Route::get('data-anggota', [PortalController::class, 'anggotas'])->name('portal.anggota');
    Route::post('getAnggota', [PortalController::class, 'getAnggota'])->name('portal.getAnggota');

    Route::get('data-wasit', [PortalController::class, 'wasit'])->name('portal.wasit');
    Route::get('data-pelatih', [PortalController::class, 'pelatih'])->name('portal.pelatih');

    Route::get('member', [PortalController::class, 'member'])->name('portal.member');
    Route::post('kirim', [PortalController::class, 'daftar_calon_murid'])->name('store.calon.murid');
});

// route Artisan
Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

Route::get('/optimize', function () {
    Artisan::call('optimize');
    return "Cache is cleared";
});
