<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dosen;
use App\Http\Resources\Dosen as DosenResource;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dosens = Dosen::paginate(15);

        return DosenResource::collection($dosens);
    }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dosen = ($request->isMethod('put')) ? Dosen::findOrFail($request->dosen_id) : new Dosen;
        
        $dosen->id = $request->input('dosen_id');
        $dosen->nama_dosen = $request->input('nama_dosen');
        $dosen->email = $request->input('email');

        if ($dosen->save()) {
            return new DosenResource($dosen);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //get single dosen
        $dosen = Dosen::findOrFail($id);

        //return single dosen as a resource
        return new DosenResource($dosen);
    }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    public function destroy($id)
    {
        // Get dosen
        $dosen = Dosen::findOrFail($id);

        // Delete dosen 
        if ($dosen->delete()) {
            return new DosenResource($dosen);
        }
    }
}
