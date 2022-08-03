<?php

namespace App\Http\Controllers;

use App\Models\Budaya;
use App\Models\Provinsi;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function viewMap(){
        $budaya = Budaya::all();
        $datas = Provinsi::all();
        $dataProvinsi= array();
        $count = array();
        $kode ='';
        foreach($datas as $data){
            $temp = Budaya::where('provinsi_id',$data->id)->get();
            $kode = $data->kode;
            $dataProvinsi[$kode] = $temp->count('budayas');
            }
            return view('view_map', compact('dataProvinsi','budaya'));
    }
}
