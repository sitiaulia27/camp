<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Sewacontroller extends Controller
{
    
    public function printPdf(Request $request)
    {
        $tanggal = $request->validate([
            'tanggal' => 'required',

        ]);

        $data['pembayaran'] = Pembayaran::with(['petugas', 'siswa'])
            ->whereBetween('tanggal_bayar', $tanggal)->get();

        if ($data['pembayaran']->count() > 0) {
            $pdf = PDF::loadView('pembayaran.laporan-preview', $data);
            return $pdf->download('pembayaran-spp-'.
            Carbon::parse($request->tanggal_mulai)->format('d-m-Y').'-'.
            Str::random(9).'.pdf');   
        }else{
            return back()->with('error', 'Data pembayaran spp tanggal '.
                Carbon::parse($request->tanggal_mulai)->format('d-m-Y').' sampai dengan '.
                Carbon::parse($request->tanggal_selesai)->format('d-m-Y').' Tidak Tersedia');
        }
    }
}

