<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Petugas;
use App\Models\Permintaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StorePermintaanRequest;
use App\Http\Requests\UpdatePermintaanRequest;

class PermintaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Permintaan::groupBy('no_permintaan')
            ->latest()
            ->paginate(15);

        return view('permintaan.index', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $no_permintaan = hexdec(uniqid());
        $product_id = DB::table('products')
            ->pluck('product_name', 'product_id')
            ->all();

        $data = Permintaan::where('no_permintaan', request()->no_permintaan)
            ->where('user_id', auth()->user()->id)
            ->get();

        return view(
            'permintaan.edit',
            compact('no_permintaan', 'product_id', 'data')
        );
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePermintaanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  dd($request->all());
        Permintaan::create($request->all());
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permintaan  $permintaan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $petugas = Petugas::first();
        $data = Permintaan::where('no_permintaan', $id)
            ->where('user_id', auth()->user()->id)
            ->get();

        $pdf = PDF::loadView(
            'permintaan.pdf',
            compact('data', 'id', 'petugas')
        )->setPaper('A4', 'potrait');
        $pdf->getDomPDF()->setHttpContext(
            stream_context_create([
                'ssl' => [
                    'allow_self_signed' => true,
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                ],
            ])
        );

        return $pdf->stream(now() . 'request_item.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permintaan  $permintaan
     * @return \Illuminate\Http\Response
     */
    public function edit(Permintaan $permintaan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePermintaanRequest  $request
     * @param  \App\Models\Permintaan  $permintaan
     * @return \Illuminate\Http\Response
     */
    public function update(
        UpdatePermintaanRequest $request,
        Permintaan $permintaan
    ) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permintaan  $permintaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permintaan $permintaan)
    {
        $permintaan->delete();
        return redirect()->back();
    }

    public function destroy2($id)
    {
        $permintaan = Permintaan::where('no_permintaan', $id);
        $permintaan->delete();
        return redirect()->back();
    }
}
