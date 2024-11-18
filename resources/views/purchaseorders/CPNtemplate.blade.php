<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title></title>
        <style>
            body
            {
                background-color: #F6F6F6; 
                margin: 0;
                padding: 0;
            }
            h1,h2,h3,h4,h5,h6{
                margin: 0;
                padding: 0;
            }
            p{
                margin: 0;
                padding: 0;
            }
            .container
            {
                width: 90%;
                margin-right: auto;
                margin-left: auto;
            }
            .brand-section{
                ;
                padding: 10px 40px;
            }
            .logo
            {
                width: 50%;
            }
            .row
            {
                display: flex;
            }
            .col-6
            {
                width: 70%; 
            }
            .text-white{
                color: #0b0b0b;
            }
            .company-details{
                float: right;
                text-align: right;
            }
            .body-section{
                padding: 16px;
                border: 1px solid gray;
            }
            .heading{
                font-size: 20px;
                margin-bottom: 08px;
            }
            .sub-heading{
                color: #262626;
                margin-bottom: 05px;
            }
            table
            {
                background-color: #fff;
                width: 100%;
                border-collapse: collapse;
            }
            table thead tr
            {
                border: 1px solid #111;
                background-color: #f2f2f2;
            }
            table td 
            {
                vertical-align: middle !important;
                text-align: center;
            }
            table th, table td {
                padding-top: 08px;
                padding-bottom: 08px;
            }
            .table-bordered
            {
                box-shadow: 0px 0px 5px 0.5px gray;
            }
            .table-bordered td, .table-bordered th 
            {
                border: 1px solid #dee2e6;
            }
            .text-right
            {
                text-align: end;
            }
            .w-20
            {
                width: 20%;
            }
            .float-right
            {
                float: right;
            }
            .purchase-details 
            {
            margin-left: 200px;
            }   
            .label {
            display: inline-block;
            width: 100px; /* Adjust as needed */
            }
            .underline {
            text-decoration: underline;
            }
       </style>
    </head>
    <body>
        <div class="container">
            <div class="body-section">
                <div class="row-4">
                    <div class="col-7"  style="text-align: center;">
                        <img src="{{ asset('assets/images/caravel.jpg') }}" alt="Left Image" class="logo" style="float: left; margin-right: 10px; width: 100px; height: 100px;">
                        <img src="{{ asset('assets/images/NK.jpg') }}" alt="Right Image" class="logo" style="float: right; margin-left: 10px; width: 100px; height: 100px;">
                        <h4 >CARAVEL NAVIGATION PHILIPPINES,INC.</h4>
                        <h4 >7/F Skyrise 1 Bldg., Villa St., Cebu IT Park,</h4>
                        <h4 >Apas, Cebu City 6000, Philippines</h4>
                        <h4 >Tel.No.(+63)(32)415-8135 to 37/ Fax No.(+63)(32)412-7287</h4>
                    </div>
                </div>
            </div>
            <div class="body-section">
                <div class="row-4">
                    <div class="col-7" style="text-align: center;">
                        <h2 class="heading">PURCHASE ORDER</h2>
                        <h2 class="heading">P.O Number: <u style="text-decoration: underline;"> {{ $purchaseDetails->po_number }}</u></h2>
                    </div>
                </div>
                <div class="row" style="margin-bottom: 20px;">
                    <div class="col-6">
                        <p class="sub-heading" style="margin-bottom: 10px;"><span class="label">TO:</span> <span class="underline">{{ $purchaseDetails->supplier->supplier_name }}</span></p>
                        <p class="sub-heading" style="margin-bottom: 10px;"><span class="label">ATTN:</span> <span class="underline">{{ $purchaseDetails->supplier->attention }}</span></p>
                        <p class="sub-heading" style="margin-bottom: 10px;"><span class="label">ADD:</span> <span class="underline">{{ $purchaseDetails->supplier->address }}</span></p>
                    </div>
                    <div class="col-6 purchase-details">
                        <p class="sub-heading"><span class="label">Date:</span><span class="underline"> {{ $purchaseDetails->date }}</p>
                        <p class="sub-heading"><span class="label">Delivery Date:</span><span class="underline"> {{ $purchaseDetails->delivery_date }}</p>
                        <p class="sub-heading"><span class="label">Payment:</span> <span class="underline"> {{ $purchaseDetails->terms_of_payment }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <p class="heading" style="font-size: 16px;"> Please deliver the following items to:</p>
                    </div>
                    <div class="col-6">
                        <p class="heading" style="font-size: 14px;"> CARAVEL NAVIGATION PHILIPPINES, INC.</p>
                    </div>
                </div> 
            </div>
            <div class="body-section" style="margin-bottom: 10px;">
                <h3 class="heading">Purchased Items</h3>
                <br>
                    <table class="table-bordered">
                        <thead>
                            <tr>
                                <th class="w-20">Description Items</th>
                                <th class="w-20">Quantity</th>
                                <th class="w-20">Unit</th>
                                <th class="w-20">Unit Price</th>
                                <th class="w-20">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach ($purchaseDetails->items as $item)
                                    <tr>
                                        <td>{{ $item->item_description }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>{{ $item->unit }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td>{{ $item->amount }}</td>
                                    </tr>
                                @endforeach
                            </tr>
                            <tr>
                                <td colspan="4" > **********Nothing Follows********** </td>
                            </tr>
                             <tr>
                                <td colspan="4" class="text-right">Sub Total</td>
                                <td>{{ $purchaseDetails->subtotal }} </td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-right">Less(1% WithHoldingTax)</td>
                                <td>{{ $purchaseDetails->withholding_tax }} </td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-right">Grand Total</td>
                                <td>  {{ $purchaseDetails->grandtotal }}</td>
                            </tr>
                        </tbody>
                    </table>
                <br>
            </div>
        </div>
            <div class="row">
                <div class="col-6" style="margin-left:35px;">
                    <p class="sub-heading" style="margin-bottom: 30px;">Prepared by: </p>
                    <p class="sub-heading" ><span class="underline"> {{ auth()->user()->name }} </p>
                    <p class="sub-heading" style="margin-bottom: 30px;"> {{ auth()->user()->position }} </p>
                    <p class="sub-heading"></p>
                    <p class="sub-heading"><span class="underline">BINELYN A. ARAC</p>
                    <p class="sub-heading">Admin Supervisor    </p>
                 
                </div>
                <div class="col-6" style="margin-left: 200px;">
                    <p class="sub-heading" style="margin-bottom: 30px;">Noted and Verified by: </p>
                    <p class="sub-heading"> <span class="underline">DARLINE GRACE V. NAILON </p>
                    <p class="sub-heading"style="margin-bottom: 30px;">Accounting/Finance Manager </p>
                    <p class="sub-heading"><span class="underline">JOVEN G. VANGUARDIA </p>
                    <p class="sub-heading">PRESIDENT </p>
                </div>
            </div>
        </div>      
        <script>
            window.onload = function () {
                // Open the print preview
                window.print();
            };
            window.onafterprint = function () {
                // Navigate back to the index page
                window.location.href = '/purchaseorders'; // Change this URL to your index page's URL
            };
        </script>
    </body>
</html>





