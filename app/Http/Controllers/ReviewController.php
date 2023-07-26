<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use App\Models\Quality;
use Illuminate\Http\Request;

class ReviewController extends Controller
{   
    
    public function store(Request $request)
    {
        Rate::create([
            'user_id' => auth()->user()->id,
            'transaction_item_id' => $request->transaction_item_id,
            'rating' => $request->rating
        ]);

        Quality::create([
            'user_id' => auth()->user()->id,
            'transaction_item_id' => $request->transaction_item_id,
            'description' => $request->description
        ]);

        return redirect('/orders')->with('success', 'The product has been successfully reviewed!');
    }
}
