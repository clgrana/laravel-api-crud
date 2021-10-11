<?php


namespace App\Http\Controllers;


use App\Models\Uf;

class UfController extends Controller
{
    /**
     * @return mixed
     * list ufs
     */
    public function index(){
        $ufs = Uf::get();
        return response()->json($ufs, 200);
    }

    /**
     * @param $id
     * @return mixed
     * list ufs
     */
    public function show($id){
        $uf = Uf::findOrfail($id);
        return response()->json($uf, 200);
    }
}
