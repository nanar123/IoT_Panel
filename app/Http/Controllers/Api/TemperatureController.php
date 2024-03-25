<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Temperature;
use Illuminate\Http\Request;

class TemperatureController extends Controller
{
    function getTemperature()
    {
        // variabel di php tidak perlu tipe data,
        // nama variable diawali tanda $

        // mengambil semua data temperature
        $temperature = Temperature::all();

        // mengambalikan response dalam bentuk JSON
        // dan status code 200
        return response()->json([
            "message"   => "Data temeperature berhasil diambil",
            "data"      => $temperature
        ], 200);
    }

    function insertTemperature(Request $request){
        // 1. Menambil data request
        $value = $request->temperature;

        // 2. Menyimpan data request ke database
        $temperature = Temperature::create([
            'value' => $value
        ]);

        // 3. Mengambalikan response json
        // dengan status code 200/ 201
        return response()->json([
            "message"   => "Data temeperature berhasil ditambahkan",
            "data"      => $temperature
        ],201);
    }
}