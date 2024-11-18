@extends('layouts.master')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="https://kit.fontawesome.com/a076d05399.css">
    <style type="text/css">
    </style>
    <form method="POST" action="{{ url('/add-purchaseorders') }}" enctype="multipart/form-data">
        @csrf
        <div class="container-fluid">
            <div class="content-header" style="padding: 1px"></div>
            <section class="content">
               <div class="container-fluid">   
                    <div class="col-md-12">
                        <div class="card mx-auto">
                            <div class="card-header">
                                <div class="card-title">
                                    <h4 style="text-align: center;"> Add Purchase Order </h4>
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
                                    <div class="col-12" style="overflow: auto; max-height: 500px;">
                                        <div class="row">
                                            <div class="col-3" style="margin-bottom: 10px;">
                                                <b>
                                                    <label class="text-xs">Select Company: &nbsp;&nbsp;</label>
                                                    <select name="company" class="form-control-sm text-bold text-xs">
                                                        <option value=""></option>
                                                        <option value="ASMI">ASMI</option>
                                                        <option value="TIBSI">TIBSI</option>
                                                        <option value="CPN">CPN</option>
                                                        <option value="PMCC">PMCC</option>
                                                        <option value="ACSFI">ACSFI</option>
                                                    </select>
                                                </b>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-3">
                                                <label class="text-xs">P.O Number</label>
                                                <input name="po_number" type="text"
                                                class="form-control form-control-border form-control-sm text-xs"
                                                placeholder="Enter Purchase Number">
                                            </div>
                                            <div class="col-3">
                                                <label class="text-xs">Date</label>
                                                <input name="date" type="date"
                                                class="form-control form-control-border form-control-sm text-xs"
                                                value="">
                                            </div>
                                            <div class="col-3">
                                                <label class="text-xs">Select Supplier</label>                                                   
                                                 <div class="input-group">
                                                    <select name="supplier_id" id="supplier" class="form-control-sm text-bold text-xs" style="width: 250px;">
                                                    <option value=""></option>
                                                    @foreach($suppliers as $supplier)
                                                        <option value="{{ $supplier->id }}">{{ $supplier->supplier_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <label class="text-xs">Delivery Date</label>
                                            <input name="delivery_date" type="date"
                                                class="form-control form-control-border form-control-sm text-xs"
                                                placeholder="Enter Model No. / Name">
                                        </div>
                                        <div class="col-3">
                                            <label class="text-xs">Terms of Payment</label>
                                            <select name="terms_of_payment"
                                                class="form-control-sm text-bold text-xs" style="width: 290px;">
                                                <option value="">-----</option>
                                                <option value="CASH PAYMENTS">Cash Payment</option>
                                                <option value="COD">Cash on Delivery</option>
                                                <option value="30 DAYS">30 Days</option>                                                        
                                                <option value="50 DAYS">50 Days</option>
                                            </select>
                                        </div>
                                        <div class="row">
                                            <div class="col-5" style="margin-bottom: 20px;">
                                                <label for="item_description" class="text-xs d-none">Descriptions Of Items</label>
                                                <input name="items[0]" type="text" id="item_description" class="form-control form-control-sm text-xs d-none" placeholder="Enter Item Description">
                                            </div>
                                            <div class="col-1">
                                                <label for="quantity" class="text-xs d-none">Quantity</label>
                                                <input name="items[0]" type="text" id="quantity" class="form-control form-control-sm text-xs d-none" placeholder="0" autocomplete="off">
                                            </div>
                                            <div class="col-2">
                                                <label for="unit" class="text-xs d-none">Unit</label>
                                                <input name="items[0]" type="text" id="unit" class="form-control form-control-sm text-xs d-none" placeholder="Enter Unit">
                                            </div>
                                            <div class="col-2">
                                                <label for="price" class="text-xs d-none">Price</label>
                                                <input name="items[0]" type="text" id="price" class="form-control form-control-sm text-xs d-none" placeholder="0" autocomplete="off" oninput="calculateAmount(0)">
                                            </div>
                                            <div class="col-2">
                                                <label for="amount" class="text-xs d-none">Amount</label>
                                                <div class="input-group">
                                                    <input name="items[0]" type="text" id="amount" class="form-control form-control-sm text-xs d-none" placeholder="0" autocomplete="off" disabled>
                                                    <div class="input-group-append">
                                                        <button type="button" class="btn btn-primary addButton" onclick="addRow()">Add Items</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>    
                                        <div id="formContainer"></div>
                                        <div class="row">
                                            <div class="col-10"></div> <!-- Empty column to push content to the right -->
                                            <div class="col-2">
                                                <div style="margin-bottom: 10px;">
                                                    <label for="" class="text-xs">Total Amount</label>
                                                    <input type="text" id="subtotal" class="form-control form-control-sm text-xs" placeholder="0" autocomplete="off" disabled style="width: 100px;">
                                                </div>
                                                <div style="margin-bottom: 10px;">
                                                    <label for="" class="text-xs">(1% for Withholding Tax)</label>
                                                    <input name="" type="text" id="withholding_tax" class="form-control form-control-sm text-xs" placeholder="0" autocomplete="off" disabled style="width: 100px;">
                                                </div>
                                                <div style="margin-bottom: 10px;">
                                                    <label for="grandtotal[]" class="text-xs">Grand Total</label>
                                                    <input name="grandtotal[]" type="text" id="grandtotal" class="form-control form-control-sm text-xs" placeholder="0" autocomplete="off" disabled style="width: 100px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>             
                            <div class="card-footer float-right">
                                <span id="MainContent_lblStatus"></span>
                                <div class="pull-right">
                                    <button type="submit" id="savePo" class="btn btn-success btn-sm btn-sm"> Save P.O.</button>
                                    <a id="MainContent_lnkCancel" class="btn btn-danger btn-sm btn-sm"
                                        href="{{ url('/purchaseorders') }}">
                                           Cancel
                                   </a>
                              </div>
                            </div>  
                        </div>
                    </div>
                </div>
            </section>           
        </div>
        <div id="loadingIcon" style="display: none;">
            <i class="fas fa-spinner fa-spin"></i> Loading...
        </div>  
        <script>
            let counter = 0;
            function addRow() 
            {
                counter++;
                const newRow = document.createElement('div');
                newRow.classList.add('row');
                newRow.setAttribute('id', `row${counter}`);
                newRow.innerHTML = `
                <div class="col-5" style="margin-bottom:20px; width: 500px;">
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
                        <div class="input-group-append" style="margin-left:10px;">
                           <button type="button" class="btn btn-danger deleteButton" onclick="deleteRow(${counter})">Delete</button>
                        </div>
                    </div>
                </div>
                    `;
                document.getElementById('formContainer').appendChild(newRow);
            }   
            function deleteRow(rowId)
            {
                const row = document.getElementById(`row${rowId}`);
                row.remove();
                 calculateTotal();
            }
               // Function to calculate the total amount for each row and update the grand total
            function calculateAmount(rowId) 
            {
                const priceInput = document.getElementById(`price${rowId}`);
                const quantityInput = document.getElementById(`quantity${rowId}`);
                const amountInput = document.getElementById(`amount${rowId}`);
                const price = parseFloat(priceInput.value) || 0;
                const quantity = parseFloat(quantityInput.value) || 0;
                const amount = price * quantity;
                amountInput.value = amount.toFixed(2);
                calculateTotal();
            }

                // Function to calculate the grand total and withholding tax
            function calculateTotal() 
            {
                let total = 0;
                const amountFields = document.querySelectorAll('input[name^="items"][name$="[amount]"]');
                amountFields.forEach(function (field) {
                const amount = parseFloat(field.value) || 0;
                total += amount;
                });
                const withholdingTax = total * 0.01; // Calculate 1% withholding tax
                const grandTotal = total - withholdingTax; // Deduct withholding tax from the total
                // Update the total amount and withholding tax fields
                document.getElementById('subtotal').value = total.toFixed(2);
                document.getElementById('withholding_tax').value = withholdingTax.toFixed(2);
                document.getElementById('grandtotal').value = grandTotal.toFixed(2);
            }
                calculateAmount(0); // Calculate amount for the initial row
                $(document).ready(function () {
                    // Function to show the loading icon
                    function showLoadingIcon() {
                        $('#loadingIcon').show();
                    }
            
                    // Function to hide the loading icon
                    function hideLoadingIcon() {
                        $('#loadingIcon').hide();
                    }
            
                    // Attach click event to the "Add P.O." button with the ID "addPoBtn"
                     // Attach click event to the "Add P.O." button with the ID "addPoBtn"
                

                    // Attach click event to the "Update" buttons with the class "btn-primary"
                $('#saveComputer').click(function () {
                    showLoadingIcon(); // Show the loading icon when any "Update" button is clicked
                    setTimeout(refreshPage, 1000); // Reload the page after a delay of 1000 milliseconds (1 second)
                    });
                $('#MainContent_lnkCancel').click(function () {
                    showLoadingIcon(); // Show the loading icon when any "Update" button is clicked
                    setTimeout(refreshPage, 1000); // Reload the page after a delay of 1000 milliseconds (1 second)
                    });
                    // (Optional) If you want to hide the loading icon after a short delay, you can use the following code
                $(document).ajaxStop(function () {
                    // Assuming the buttons trigger AJAX calls
                    hideLoadingIcon(); // Hide the loading icon when all AJAX calls are completed
                    });
                });
        </script>   
    </form>
@endsection
