<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SewaController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PenyewaController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('home');
});

Route::get('/register', function () {
    return view('register.index');
});

Route::get('/produk', function () {
    $produk = DB::table('products')->get();

    return view('produk', compact('produk'));
});

// Route::get('/produk/detail', function () {
Route::get('/produk/detail/{id}', function ($id) {
    $produk = DB::table('products')->where('id', $id)->first();
    return view('detail', compact('produk'));
    // return view('detail');
});

Route::get('/keranjang', function () {
    $keranjang = DB::table('keranjang')->where('id_penyewa', Session::get('logged_in')['id'])->get();
    return view('keranjang', compact('keranjang'));
});

Route::post('/keranjang/{id}', function (Request $request, $id) {
    if ($id) {
        DB::table('keranjang')->insert([
            'id_produk' => $id,
            'id_penyewa' => Session::get('logged_in')['id'],
            'jumlah' => $request->jumlah
        ]);
        return redirect('keranjang');
    }
});

Route::get('/keranjang/hapus/{id}', function ($id) {
    $keranjang = DB::table('keranjang')->where('id', $id)->delete();
    return redirect('keranjang');
});

Route::get('/checkout', function () {
    $keranjang = DB::table('keranjang')->where('id_penyewa', Session::get('logged_in')['id'])->get();
    return view('checkout', compact('keranjang'));
});

Route::post('/checkout', function (Request $request) {
    if($request->hasFile('identitas')){
        $extension = $request->identitas->extension();
        $identitas = time().".". $extension;
        $request->identitas->storeAs('public/identitas/', $identitas);
        if ($request->file('identitas')->isValid()) {
            foreach ($request->id_produk as $key) {
                DB::table('checkout')->insert([
                    'id_penyewa' => Session::get('logged_in')['id'],
                    'id_produk' => $key,
                    'name' => $request->name,
                    'dp' =>$request->dp,
                    'total' =>$request->total,
                    'jumlah' =>$request->jumlah,
                    'identitas_diri'=>$identitas,
                    'tanggal_pengembalian'=>$request->tanggal_pengembalian,
                    'tanggal_sewa'=>$request->tanggal_sewa,
                ]);
            }
            return redirect('/pembayaran');
        }
    }
    DB::table('keranjang')->where('id_penyewa', Session::get('logged_in')['id'])->delete();
    return redirect('/pembayaran');
});

Route::get('/pembayaran', function () {
    $checkout = DB::table('checkout')->where('id_penyewa', Session::get('logged_in')['id'])->first();
    return view('pembayaran', compact('checkout'));
});

Route::post('/pembayaran', function (Request $request) {
    if($request->hasFile('bukti')){
        $extension = $request->bukti->extension();
        $bukti = time().".". $extension;
        $request->bukti->storeAs('public/bukti/', $bukti);
        if ($request->file('bukti')->isValid()) {
            DB::table('pembayaran')->insert([
                'nama' => $request->nama,
                'bank' => $request->bank,
                'tanggal' =>'/bukti/'.$bukti,
                'bukti' =>$request->bukti,
                'jumlah' =>$request->jumlah,
            ]);
            return redirect('/nota');
        }
    }
});

Route::get('/info', function () {
    return view('info');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/sewa', function () {
    return view('sewa');
});

Route::get('/home', function () {
    $user = DB::table('login')->count();
    $penyewas = DB::table('checkout')->count();
    $produk = DB::table('products')->count();
    return view('admin.home', compact('user', 'produk', 'penyewas'));
});

Route::get('/detail/{id}', function ($id) {
    $checkout = DB::table('checkout')->where('id', $id)->first();
    $user = DB::table('login')->where('id', $checkout->id_penyewa)->first();
    $produk = DB::table('products')->where('id', $checkout->id_produk)->first();
    return view('admin.detail', compact('checkout', 'user', 'produk'));
});


Route::get('/navbar', function () {
    return view('admin.navbar');
});

Route::get('/penyewa', function () {
    $checkout = DB::table('checkout')->get();
    return view('dataproduk.index', compact('checkout'));
});

Route::get('/nota', function () {
    $login = DB::table('login')->where('id', Session::get('logged_in')['id'])->first();
    $checkout = DB::table('checkout')->where('id_penyewa', $login->id)->get();
    return view('nota', compact('login', 'checkout'));
});

Route::get('/cetak', function () {
    $login = DB::table('login')->where('id', Session::get('logged_in')['id'])->first();
    $checkout = DB::table('checkout')->where('id_penyewa', $login->id)->get();
    return view('cetak', compact('login', 'checkout'));
});

Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'buat'])->name('daftar');

Route::get('/logout', [LoginController::class, 'logout']);

Route::delete('/penyewas/{id}', [PenyewaController::class, 'destroy']);
Route::resource('products', ProductController::class);
Route::resource('penyewas', PenyewaController::class);