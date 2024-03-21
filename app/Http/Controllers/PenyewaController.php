<?php

namespace App\Http\Controllers;

use App\Models\Penyewa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenyewaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penyewas = Penyewa::latest()->paginate(5);
        $login = DB::table('login')->get();
        return view('penyewas.index', compact('login'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('penyewas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
        ]);

        Penyewa::create($request->all());

        return redirect()->route('penyewas.index')
            ->with('success', 'Data created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penyewa  $penyewa
     * @return \Illuminate\Http\Response
     */
    public function show(Penyewa $penyewa)
    {
        return view('penyewas.show', compact('penyewa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penyewa  $penyewa
     * @return \Illuminate\Http\Response
     */
    public function edit(Penyewa $penyewa)
    {
        return view('penyewas.edit', compact('penyewa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penyewa  $penyewa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penyewa $penyewa)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
        ]);

        $penyewa->update($request->all());

        return redirect()->route('penyewas.index')
            ->with('success', 'Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penyewa  $penyewa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penyewa $penyewa, $id)
    {
        DB::table('login')->where('id', $id)->delete();

        return redirect()->route('penyewas.index')
            ->with('success', 'Data deleted successfully');
    }
}
