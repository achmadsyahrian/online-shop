<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MetodeWpController extends Controller
{
    public function index()
    {
        $bobot = DB::table("tb_kriteria")->get();
        $sumBobot = DB::table("tb_kriteria")->sum('bobot');
        $product = Product::withSum('transactionItem','quantity')->with(['transactionItem' => function ($query)
        {
            $query->withAvg('rate','rating');
            $query->withAvg('quality','description');

        }])->get();


        return view('dashboard.metodewp',compact('bobot','sumBobot','product'));
    }

    public function table()
    {
        $bobot = DB::table("tb_kriteria")->get();
        $sumBobot = DB::table("tb_kriteria")->sum('bobot');
        $countBobot = DB::table("tb_kriteria")->count('bobot');
        $product = Product::withSum('transactionItem','quantity')->with(['transactionItem' => function ($query)
        {
            $query->withAvg('rate','rating');
            $query->withAvg('quality','description');

        }])->get();

        return view('dashboard.tablewp',compact('bobot','sumBobot','countBobot','product'));
    }
}
