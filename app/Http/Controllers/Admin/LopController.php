<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Lop;
use Illuminate\Http\Request;

class LopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lop  $lop
     * @return \Illuminate\Http\Response
     */
    public function show(Lop $lop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lop  $lop
     * @return \Illuminate\Http\Response
     */
    public function edit(Lop $lop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lop  $lop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lop $lop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lop  $lop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lop $lop)
    {
        //
    }

    public function getHocvienTheoLop(Request $request) {
        $idLop = $request->validate(
            ['lop' => ['required','numeric']]
        );
        $data = Lop::with(['hocviens'])->where('id',$idLop)->first();
        return response(json_encode($data->hocviens))->header('Content-Type', 'application/json');
    }
}
