<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TabelBuku;
use Illuminate\Support\Facades\Validator;

class TabelBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ambildata=TabelBuku::all();
        return response()->json([
            'pesan'=>'data ditemukan',
            'data'=>$ambildata
        ],200);
        
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
        $validasi = Validator::make($request->all(), [
           "judul" => "required", 
           "pengarang" => "required",
           "penerbit"  => "required",
           "jumlah" => "required",
            ]); 
            if ($validasi->passes()) { 
                $ambildata = TabelBuku::create($request->all()); 
                return response()->json([ 
                    'pesan' => 'Data Berhasil di inputkan', 
                    'data' => $ambildata 
                ], 200); 
            } 
            return response()->json([ 
                'pesan' => 'Data gagal diinputkan', 
                'data' => $validasi->errors()->all() 
            ], 400);
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
        //
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
        //
        $ambildata = TabelBuku::where('id', $id)->first(); 
        if (!empty($ambildata)) { 
            // return $data; 
            $validasi = Validator::make($request->all(), [ 
                "judul" => "required", 
                "pengarang" => "required",
                "penerbit"  => "required",
                "jumlah" => "required",
            ]); 
                if ($validasi->passes()) { 
                    $ambildata->update($request->all()); 
                    return response()->json([ 
                        'pesan' => 'Data Berhasil di ubah', 
                        'data' => $ambildata 
                    ], 200); 
                } else { 
                    return response()->json([ 
                        'pesan' => 'Data gagal di ubah', 
                        'data' => $validasi->errors()->all() 
                    ]); 
                } 
            } 
            return response()->json([ 
                'message' => 'Data Tidak Ditemukan' 
            ], 404);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $ambildata =TabelBuku::where('id', $id)->first(); 
        if (empty($ambildata)) { 
            return response()->json([ 
                'pesan' => 'Data tidak ada', 
                'data' => ''
             ], 404); 
            } 
            $ambildata->delete();
             return response()->json([ 
                 'pesan' => 'data telah di delete ', 
                 'data' => $ambildata
                 ], 200);
    }
}
