<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PurchaseDetails;
use App\Models\PurchaseItems;
use App\Models\Supplier;
use App\Http\Requests\PurchaseOrdersRequest;
use App\Models\PurchaseOrder;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;
use App\Models\User;



class PurchaseOrdersController extends Controller
{
    public function index()
    {
       // $purchase_details = PurchaseDetails::with('items')->get();
        $purchaseDetails = PurchaseDetails::all();
                                                    
        return view('purchaseorders.index', compact('purchaseDetails'));
    }

   public function create()
    {

        $suppliers = Supplier::all();
     

       return view('purchaseorders.create', compact( 'suppliers'));
    }
    public function store(PurchaseOrdersRequest $request)
    {
        $purchaseDetails = new PurchaseDetails();
        $purchaseDetails->company = $request->input('company');
        $purchaseDetails->supplier_name = $request->input('supplier_id');
        $purchaseDetails->po_number = $request->input('po_number');
        $purchaseDetails->date = $request->input('date');
        $purchaseDetails->delivery_date = $request->input('delivery_date');
        $purchaseDetails->terms_of_payment = $request->input('terms_of_payment');
    
        // Remove null items from the $items array
        $items = array_filter($request->input('items'));
    
        // Calculate the subtotal
        $subtotal = $this->calculateSubtotal($items);
        $purchaseDetails->subtotal = $subtotal;
    
        // Calculate the withholding tax as 0.01% of the subtotal
        $withholdingTax = $subtotal * (0.01);
        $purchaseDetails->withholding_tax = $withholdingTax;
    
        // Calculate the grandtotal as subtotal - withholding tax
        $grandtotal = $subtotal - $withholdingTax;
        $purchaseDetails->grandtotal = $grandtotal;
    
        $purchaseDetails->save();
    
        // Create and associate each item with the purchase details
        foreach ($items as $itemData) {
            $item = new PurchaseItems();
            $item->item_description = $itemData['item_description'];
            $item->quantity = $itemData['quantity'];
            $item->price = $itemData['price'];
            $item->amount = $itemData['quantity'] * $itemData['price'];
            $item->unit = $itemData['unit'];
    
            // Associate the item with the purchase details (include purchase_details_id)
            $item->purchase_details_id = $purchaseDetails->id;
    
            $item->save(); // Save each PurchaseItems
        }
    
        // Redirect to the index page after successfully saving the purchase details and items
        return redirect('/purchaseorders')->with('message', 'Purchased Order added successfully');
    }
    
    private function calculateSubtotal($items)
    {
        $subtotal = 0;
    
        foreach ($items as $itemData) {
            $quantity = $itemData['quantity'];
            $price = $itemData['price'];
            $subtotal += $quantity * $price;
        }
    
        return $subtotal;
    }

    public function edit($id)
{
    $purchaseDetails = PurchaseDetails::with('items', 'supplier')->find($id);

    // Also, you may want to retrieve the suppliers list here for dropdown or other purposes
    $suppliers = Supplier::all();

    return view('purchaseorders.edit', compact('purchaseDetails', 'suppliers'));
}

public function update(PurchaseOrdersRequest $request, $id)
{
   
    // Find the purchase details by ID
    $purchaseDetails = PurchaseDetails::find($id);

    if (!$purchaseDetails) {
        return redirect('/purchaseorders')->with('error', 'Purchase Order not found');
    }

    // Update purchase details
    
    $purchaseDetails->company = $request->input('company');
    $purchaseDetails->supplier_name = $request->input('supplier_id');
    $purchaseDetails->po_number = $request->input('po_number');
    $purchaseDetails->date = $request->input('date');
    $purchaseDetails->delivery_date = $request->input('delivery_date');
    $purchaseDetails->terms_of_payment = $request->input('terms_of_payment');

    // Remove null items from the $items array
    $items = array_filter($request->input('items'));

    // Calculate the subtotal
    $subtotal = $this->calculateSubtotal($items);
    $purchaseDetails->subtotal = $subtotal;

    // Calculate the withholding tax as 0.01% of the subtotal
    $withholdingTax = $subtotal * (0.01);
    $purchaseDetails->withholding_tax = $withholdingTax;

    // Calculate the grandtotal as subtotal - withholding tax
    $grandtotal = $subtotal - $withholdingTax;
    $purchaseDetails->grandtotal = $grandtotal;

    $purchaseDetails->save();

    // Delete existing items and create new ones
    $purchaseDetails->items()->delete();

    // Create and associate each item with the purchase details
    foreach ($items as $itemData) {
        $item = new PurchaseItems();
        $item->item_description = $itemData['item_description'];
        $item->quantity = $itemData['quantity'];
        $item->price = $itemData['price'];
        $item->amount = $itemData['quantity'] * $itemData['price'];
        $item->unit = $itemData['unit'];

        // Associate the item with the purchase details (include purchase_details_id)
        $item->purchase_details_id = $purchaseDetails->id;

        $item->save(); // Save each PurchaseItems
    }

    // Redirect to the index page after successfully updating the purchase details and items
    return redirect('/purchaseorders')->with('message', 'Purchased Order updated successfully');
}


public function destroy($id)
{
    // Find the purchase details by ID
    $purchaseDetails = PurchaseDetails::find($id);

    if (!$purchaseDetails) {
        return redirect('/purchaseorders')->with('error', 'Purchase Order not found');
    }

    // Delete associated items
    $purchaseDetails->items()->delete();

    // Delete the purchase details
    $purchaseDetails->delete();

    return redirect('/purchaseorders')->with('message', 'Purchase Order deleted successfully');
}
public function template($purchase_id)
{
    $userName = auth()->user()->name;
    if (PurchaseDetails::where('id', $purchase_id)->exists()) 
    {
        $purchaseDetails = PurchaseDetails::find($purchase_id);


        
        $companyTemplate = 'purchaseorders.' . $purchaseDetails->company . 'template';

        if (View::exists($companyTemplate)) {
            return view($companyTemplate, compact('purchaseDetails'));
        } else {
            return view('purchaseorders.template_default', compact('purchaseDetails'));
        }
    } else {
        return redirect()->back()->with('status', 'No Order found');
    }
}
public function __construct()
{
    $this->middleware('auth');
}


}

