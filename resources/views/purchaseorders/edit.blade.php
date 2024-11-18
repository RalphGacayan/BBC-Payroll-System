@extends('layouts.master')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="https://kit.fontawesome.com/a076d05399.css">
    <style type= "text/css">
        .modal 
        {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .modal-dialog 
        {
            margin-left: auto;
            margin-right: auto;
        }
        #loadingIcon 
        {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: rgba(0, 0, 0, 0.4);
            z-index: 9999;
        }
        #loadingIcon .fa-spinner
        {
            font-size: 50px;
            color: white;
        }
    </style>
    <form method="POST"action="{{ url('/update-purchaseorders/'.$purchaseDetails->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="container-fluid">
            <div class="content-header"></div>
            <section class="content">
                <div id="MainContent_UpdatePanel">
                    <div class="container-fluid">
                        <div class="content-header">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h1 class="m-0 text-dark"></h1>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right">
                                        <input type="hidden" name="ctl00$MainContent$hfID" id="MainContent_hfID">
                                        <input type="hidden" name="ctl00$MainContent$hfStatus" id="MainContent_hfStatus">
                                        <input type="hidden" name="ctl00$MainContent$hfActionHandler"
                                        id="MainContent_hfActionHandler">
                                       <input type="hidden" name="ctl00$MainContent$hfDeletedItm"
                                        id="MainContent_hfDeletedItm">
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 ">
                            <div class="card mx-auto">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h4 style="text-align: center;"> Update Purchase Order </h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            @foreach ($errors->all() as $error)
                                                <div>{{ $error }} </div>
                                            @endforeach
                                        </div>
                                    @endif
                                    <div id="MainContent_divForm" class="row">
                                        <div class="col-12" style="overflow: auto;">
                                            <div class="row">
                                                <div class="col-3">
                                                    <b>
                                                        <label class="text-xs">Select Company: &nbsp;&nbsp;</label>
                                                        <select name="company"
                                                            class="form-control-sm text-bold text-xs">
                                                            <option value=""></option>
                                                            <option  value="ASMI"  {{ $purchaseDetails->company == 'ASMI' ? 'selected' : '' }}>ASMI</option>
                                                            <option value="TIBSI" {{ $purchaseDetails->company == 'TIBSI' ? 'selected' : '' }}>TIBSI</option>
                                                            <option value="CPN" {{ $purchaseDetails->company == 'CPN' ? 'selected' : '' }}>CPN</option>
                                                            <option value="PMCC" {{ $purchaseDetails->company == 'PMCC' ? 'selected' : '' }}>PMCC</option>
                                                            <option value="ACSFI" {{ $purchaseDetails->company == 'ACSFI' ? 'selected' : '' }}>ACSFI</option>
                                                        </select>
                                                    </b>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-3">
                                                    <label class="text-xs">P.O Number</label>
                                                    <input name="po_number" type="text" class="form-control form-control-border form-control-sm text-xs"
                                                    placeholder="Enter Purchase Number" value="{{ $purchaseDetails->po_number}}">
                                                </div>
                                                <div class="col-3">
                                                    <label class="text-xs">Date</label>
                                                    <input name="date" type="date"class="form-control form-control-border form-control-sm text-xs"
                                                    value="{{ $purchaseDetails->date }}">
                                                </div>
                                                <div class="col-3">
                                                    <label class="text-xs">Select Supplier</label>                                                    
                                                    <div class="input-group">
                                                        <select name="supplier_id" id="supplier" class="form-control-sm text-bold text-xs" style="width: 250px;">
                                                            <option value=""></option>
                                                            @foreach($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}" {{ $purchaseDetails->supplier_name == $supplier->id ? 'selected' : '' }}>
                                                                    {{ $supplier->supplier_name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <label class="text-xs">Delivery Date</label>
                                                    <input name="delivery_date" type="date"class="form-control form-control-border form-control-sm text-xs"
                                                    placeholder="Enter Model No. / Name" value="{{ $purchaseDetails->delivery_date}}">
                                                </div>
                                                <div class="col-3">
                                                    <label class="text-xs">Terms of Payment</label>
                                                    <select name="terms_of_payment"class="form-control-sm text-bold text-xs" style="width: 290px;">
                                                         <option value="">-----</option>
                                                        <option value="CASH PAYMENTS" {{ $purchaseDetails->terms_of_payment == 'CASH PAYMENTS' ? 'selected' : '' }}>Cash Payment</option>
                                                        <option value="COD" {{ $purchaseDetails->terms_of_payment == 'COD' ? 'selected' : '' }}>Cash on Delivery</option>
                                                        <option value="30 DAYS" {{ $purchaseDetails->terms_of_payment == '30 DAYS' ? 'selected' : '' }}>30 Days</option>                                                        
                                                        <option value="50 DAYS" {{ $purchaseDetails->terms_of_payment == '50 DAYS' ? 'selected' : '' }}>50 Days</option>
                                                    </select>
                                                </div>                                      
                                            </div>    
                                            <div class= "row">
                                                <div class="col-10"></div> 
                                                <div class="col-2">
                                                    <button type="button" class="btn btn-primary addButton" onclick="addRow()">Add Items</button>
                                                </div> 
                                            </div>    
                                            @foreach ($purchaseDetails->items as $index => $item)
                                                <div class="row">
                                                    <div class="col-5" style="margin-bottom: 20px;">
                                                        <label for="item_description{{ $index }}" class="text-xs">Description of Item</label>
                                                        <input name="items[{{ $index }}][item_description]" type="text" id="item_description{{ $index }}" class="form-control form-control-sm text-xs" value="{{ $item->item_description }}">
                                                    </div>
                                                    <div class="col-1">
                                                        <label for="quantity{{ $index }}" class="text-xs">Quantity</label>
                                                        <input name="items[{{ $index }}][quantity]" type="text" id="quantity{{ $index }}" class="form-control form-control-sm text-xs" value="{{ $item->quantity }}" autocomplete="off">
                                                    </div>
                                                    <div class="col-2">
                                                        <label for="unit{{ $index }}" class="text-xs">Unit</label>
                                                        <input name="items[{{ $index }}][unit]" type="text" id="unit{{ $index }}" class="form-control form-control-sm text-xs" value="{{ $item->unit }}">
                                                    </div>
                                                    <div class="col-2">
                                                        <label for="price{{ $index }}" class="text-xs">Price</label>
                                                        <input name="items[{{ $index }}][price]" type="text" id="price{{ $index }}" class="form-control form-control-sm text-xs" value="{{ $item->price }}" autocomplete="off" oninput="calculateAmount({{ $index }})">
                                                    </div>
                                                    <div class="col-2">
                                                        <label for="amount{{ $index }}" class="text-xs">Amount</label>
                                                        <div class="input-group">
                                                            <input name="items[{{ $index }}][amount]" type="text" id="amount{{ $index }}" class="form-control form-control-sm text-xs" value="{{ $item->amount }}" autocomplete="off" disabled>
                                                            <div class="input-group-append" style="margin-left: 10px;">
                                                                <button type="button" class="btn btn-danger deleteButton" onclick="deleteRow({{ $index }})">Delete</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>     
                                        <div id="formContainer"></div>
                                        <div class="row">
                                            <div class="col-10"></div> 
                                            <div class="col-2 text-right" style="margin-bottom: 10px;">
                                                <label for="" class="text-xs">Total Amount </label>
                                                <input type="text" id="subtotal" class="form-control form-control-sm text-xs" placeholder="0" autocomplete="off" disabled style="width: 100px;"  value= {{ $purchaseDetails->subtotal}}>
                                            </div>
                                            <div class="col-10"></div> 
                                            <div class="col-2 text-right" style="margin-bottom: 10px;">
                                                <label for="" class="text-xs">(1% for WithHolding Tax) </label>
                                                <input name="" type="text" id="withholding_tax" class="form-control form-control-sm text-xs" placeholder="0" autocomplete="off" disabled style="width: 100px;"  value= {{ $purchaseDetails->withholding_tax}}>
                                            </div>
                                            <div class="col-10"></div> 
                                            <div class="col-2 text-right" style="margin-bottom: 10px;">
                                                <label for="grandtotal[]" class="text-xs">Grand Total </label>
                                                <input name="grandtotal[]" type="text" id="grandtotal" class="form-control form-control-sm text-xs" placeholder="0" autocomplete="off" disabled style="width: 100px;"  value= {{ $purchaseDetails->grandtotal}}>
                                            </div>
                                        </div>
                                        <div class="card-footer float-right">
                                            <span id="MainContent_lblStatus"></span>
                                            <div class="pull-right">
                                                <button type="submit" id="savePO" class="btn btn-success btn-sm btn-sm">Save P.O.</button>
                                                <a id="Cancel" class="btn btn-danger btn-sm btn-sm"
                                                        href="{{ url('/purchaseorders') }}">
                                                            Cancel
                                               </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="loadingIcon" style="display: none;">
                        <i class="fas fa-spinner fa-spin"></i> 
                    </div>
                </div>    
            </section>
        </div>
        <script>
            let counter = 0;// Initialize the counter with the number of existing items
            function addRow() {
            counter++;
            const newRow = document.createElement('div');
            newRow.classList.add('row');
            newRow.setAttribute('id', `row${counter}`);
            newRow.innerHTML = `
            <div class="col-5" style="margin-bottom:20px;">
                <label for="item_description${counter}" class="text-xs">Descriptions Of Items</label>
                <input name="items[${counter}][item_description]" type="text" id="item_description${counter}" class="form-control form-control-sm text-xs" placeholder="Enter Item Description">
            </div>
            <div class="col-1">
                <label for="quantity${counter}" class="text-xs">Quantity</label>
                <input name="items[${counter}][quantity]" type="text" id="quantity${counter}" class="form-control form-control-sm text-xs" placeholder="0" autocomplete="off">
            </div>
            <div class="col-2">
                <label for="unit${counter}" class="text-xs">Unit</label>
                <input name="items[${counter}][unit]" type="text" id="unit${counter}" class="form-control form-control-sm text-xs" placeholder="Enter Unit">
            </div>
           <div class="col-2">
                <label for="price${counter}" class="text-xs">Price</label>
                <input name="items[${counter}][price]" type="text" id="price${counter}" class="form-control form-control-sm text-xs" placeholder="0" autocomplete="off" oninput="calculateAmount(${counter})">
            </div>
            <div class="col-2">
                <label for="amount${counter}" class="text-xs">Amount</label>
                <div class="input-group">
                    <input name="items[${counter}][amount]" type="text" id="amount${counter}" class="form-control form-control-sm text-xs" placeholder="0" autocomplete="off" disabled>
                    <div class="input-group-append">
                       <button type="button" class="btn btn-danger deleteButton"  style="margin-left: 10px;"  onclick="deleteRow(${counter})">Delete</button>
                    </div>
               </div>
           </div>
               `;
            document.getElementById('formContainer').appendChild(newRow);
            calculateAmount(counter);
            }
            function deleteRow(rowId){
                const row = document.getElementById(`row${rowId}`);
                if (row) 
                {
                    row.remove();
                    calculateTotal(); // Recalculate amounts after deleting a row
                } 
                    else 
                {
                    console.log(`Row with ID 'row${rowId}' not found.`);
                }
            }
            function calculateAmount(rowId){
                const priceInput = document.getElementById(`price${rowId}`);
                const quantityInput = document.getElementById(`quantity${rowId}`);
                const amountInput = document.getElementById(`amount${rowId}`);
                const price = parseFloat(priceInput.value) || 0;
                const quantity = parseFloat(quantityInput.value) || 0;
                const amount = price * quantity;
                amountInput.value = amount.toFixed(2);
                 calculateTotal();
            }   
            calculateAmount(0); // Calculate amount for the initial row
            function calculateTotal() {
                let total = 0;
                const amountFields = document.querySelectorAll('input[name^="items"][name$="[amount]"]');
                amountFields.forEach(function (field) {
                const amount = parseFloat(field.value) || 0;
                total += amount;
                });
                const withholdingTax = total * 0.01; // Calculate 1% withholding tax
                const grandTotal = total - withholdingTax; // Deduct withholding tax from the total
                // Update the input fields with new values
                document.getElementById('subtotal').value = total.toFixed(2);
                document.getElementById('withholding_tax').value = withholdingTax.toFixed(2);
                document.getElementById('grandtotal').value = grandTotal.toFixed(2);
            }
            function showLoadingIcon() {
                        $('#loadingIcon').show();
                    }
            
                    // Function to hide the loading icon
                    function hideLoadingIcon() {
                        $('#loadingIcon').hide();
                    }
            $('#savePO').click(function () {
                    showLoadingIcon(); // Show the loading icon when any "Update" button is clicked
                    setTimeout(refreshPage, 1000); // Reload the page after a delay of 1000 milliseconds (1 second)
                    });
                $('#Cancel').click(function () {
                    showLoadingIcon(); // Show the loading icon when any "Update" button is clicked
                    setTimeout(refreshPage, 1000); // Reload the page after a delay of 1000 milliseconds (1 second)
                    });
                    $(document).ajaxStop(function () {
                    // Assuming the buttons trigger AJAX calls
                    hideLoadingIcon(); // Hide the loading icon when all AJAX calls are completed
                    });
        </script>
    </form>
@endsection
