<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Outlet;
class CreateOutletController extends Controller
{
    public function index()
    {
        return view('outlet', [
            'products' => Product::all()
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => ['required', 'min:5', 'max:12', 'unique:outlets'],
            'address' => 'required',
            'phone' => ['required', 'regex:/^[0-9]{11,}$/'],
            'description' => 'required',
        ]);

        $validateData['user_id'] = auth()->user()->id;

        Outlet::create($validateData);

        return redirect('/dashboard')->with('success', 'Your Outlet has been registered!');
    }
}
