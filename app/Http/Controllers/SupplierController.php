<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Http\Requests\SupplierRequest;

class SupplierController extends Controller
{
    public function index()
    {

        $suppliers = Supplier::all();
        return view('supplier.index', compact('suppliers'));

    }

    public function create()
    {
      
        return view('supplier.create');

    }

    public function store(SupplierRequest $request)
    {
        $data = $request->validated();
    	$supplier = new Supplier;
        $supplier->supplier_name = $data['Supplier'];
        $supplier->address = $data['Address'];
        $supplier->attention = $data['Attention'];

        $supplier->save();
        return redirect('/supplier')->with('message','Supplier added Succesfully');

    }
  

}
