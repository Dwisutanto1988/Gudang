<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tujuan;

class TujuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tujuans = Tujuan::paginate(15);
      //  dd($tujuans);
       return view('tujuan.index',compact('tujuans'));

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
       $tujuan = $request->all();
//dd($tujuan);
       Tujuan::create($tujuan);

       return redirect()->route('tujuan.index');
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
    public function edit($id)
    {
        $tujuan = Tujuan::findOrFail($id);
        return view('tujuan.edit', compact('tujuan', 'id'));

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
        $tujuan = Tujuan::findOrFail($id);

        $tujuan->update([
            'tujuan' => $request->tujuan
        ]);
        return redirect()->route('tujuan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Tujuan::findOrFail($id);
        $post->delete();
        return redirect()->route('tujuan.index');
    }
}
