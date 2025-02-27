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
            .container{
                width: 90%;
                margin-right: auto;
                margin-left: auto;
            }
            .brand-section
            {
            
                padding: 10px 40px;
            }
            .logo{
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
            .heading
            {
                font-size: 20px;
                margin-bottom: 08px;
            }
            .sub-heading
            {
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
            table th, table td 
            {
                padding-top: 08px;
                padding-bottom: 08px;
            }
            .table-bordered{
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
            .label 
            {
                display: inline-block;
                width: 100px; /* Adjust as needed */
                font-size: 10pt;
            }
            .underline 
            {
                text-decoration: underline;
            }
        
       
        </style>
    </head>
    <body>
        <div class="container">
            <div class="body-section">
                <div class="row-4">
                    <div class="col-7"  style="text-align: center;">
                        <img src="{{ asset('assets/images/astro_logo.jpg') }}" alt="Left Image" class="logo" style="float: left; margin-right: 10px; width: 90px; height: 80px;">
                        <img src="{{ asset('assets/images/NK.jpg') }}" alt="Right Image" class="logo" style="float: right; margin-left: 10px; width: 90px; height: 80px;">
                        <h4 style="font-size: 10pt;" >ASTRO SHIPMANAGEMENT,INC.</h4>
                        <h4 style="font-size: 10pt;">6/F Skyrise 1 Bldg., Villa St., Cebu IT Park,</h4>
                        <h4 style="font-size: 10pt;">Apas, Cebu City 6000, Philippines</h4>
                        <h4 style="font-size: 10pt;">Tel.No.(+63)(32)415-8135 to 37/ Fax No.(+63)(32)412-7287</h4>
                    </div>
                </div>
            </div>
            <div class="body-section">
                <div class="row-4">
                    <div class="col-7" style="text-align: center;">
                        <h2 class="heading" style="font-size: 10pt;">PURCHASE ORDER</h2>
                        <h2 class="heading" style="font-size: 10pt;">P.O Number: <u style="text-decoration: underline;"> {{ $purchaseDetails->po_number }}</u></h2>
                    </div>
                </div>
                <div class="row" style="margin-bottom: 20px;">
                    <div class="col-6">
                        <p class="sub-heading" style="margin-bottom: 10px;"><span class="label">TO:</span> <span class="underline" style="font-size: 10pt;">{{ $purchaseDetails->supplier->supplier_name }}</span></p>
                        <p class="sub-heading" style="margin-bottom: 10px; "><span class="label">ATTN:</span> <span class="underline" style="font-size: 10pt;">{{ $purchaseDetails->supplier->attention }}</span></p>
                        <p class="sub-heading" style="margin-bottom: 10px; "><span class="label">ADD:</span> <span class="underline" style="font-size: 10pt;">{{ $purchaseDetails->supplier->address }}</span></p>
                    </div>
                    <div class="col-6 purchase-details">
                        <p class="sub-heading"><span class="label" >Date:</span><span class="underline" style="font-size: 10pt;"> {{ $purchaseDetails->date }}</p>
                        <p class="sub-heading"><span class="label">Delivery Date:</span><span class="underline" style="font-size: 10pt;"> {{ $purchaseDetails->delivery_date }}</p>
                        <p class="sub-heading"><span class="label" >Payment:</span> <span class="underline" style="font-size: 10pt;"> {{ $purchaseDetails->terms_of_payment }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <p class="heading" style="font-size: 10pt;"> Please deliver the following items to:</p>
                    </div>
                    <div class="col-6" style="margin-left: 130px;">
                        <p class="heading" style="font-size: 10pt;"> ASTRO SHIPMANAGEMENT, INC.</p>
                    </div>
                </div> 
            </div>
            <div class="body-section"  style="margin-bottom: 10px;">
                <h3 class="heading" style="font-size: 10pt;">Purchased Items</h3>
                <br>
                    <table class="table-bordered">
                        <thead>
                             <tr>
                                <th class="w-40" style="font-size: 10pt;">Description Items</th>
                                <th class="w-10" style="font-size: 10pt;">Quantity</th>
                                <th class="w-10" style="font-size: 10pt;">Unit</th>
                                <th class="w-10" style="font-size: 10pt;">Unit Price</th>
                                <th class="w-10" style="font-size: 10pt;">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach ($purchaseDetails->items as $item)
                                    <tr>
                                        <td style="font-size: 10pt;">{{ $item->item_description }}</td>
                                        <td style="font-size: 10pt;">{{ $item->quantity }}</td>
                                        <td style="font-size: 10pt;">{{ $item->unit }}</td>
                                        <td style="font-size: 10pt;">{{ $item->price }}</td>
                                        <td style="font-size: 10pt;">{{ $item->amount }}</td>
                                    </tr>
                                @endforeach
                            </tr>
                            <tr>
                                <td colspan="4" > **********Nothing Follows********** </td>
                            </tr>
                            <tr>
                                <td colspan="4" style="font-size: 10pt;" class="text-right">Sub Total</td>
                                <td style="font-size: 10pt;">{{ $purchaseDetails->subtotal }} </td>
                            </tr>
                            <tr>
                                <td colspan="4" style="font-size: 10pt;" class="text-right">Less(1% WithHoldingTax)</td>
                                <td style="font-size: 10pt;">{{ $purchaseDetails->withholding_tax }} </td>
                            </tr>
                            <tr>
                                <td colspan="4" style="font-size: 10pt;" class="text-right">Grand Total</td>
                                <td style="font-size: 10pt;">  {{ $purchaseDetails->grandtotal }}</td>
                            </tr>
                        </tbody>
                    </table>
                <br>
                <div class="row">
                    <div class="col-7">
                        <p class="heading" style="font-size: 10pt;"> Remarks: Vat Zero-Rated. Please also issue Zero-Rated Invoice. Thank You.</p>
                    </div>
                </div>
            </div>  
            <div class="row">
                <div class="col-6">
                    <p class="sub-heading" style="margin-bottom: 40px; font-size: 10pt;">Prepared by: </p>
                    <p class="sub-heading" style="font-size: 10pt;"><span class="underline"> {{ auth()->user()->name }} </p>
                    <p class="sub-heading" style="margin-bottom: 20px; font-size: 10pt;"> {{ auth()->user()->position }} </p>
                    <p class="sub-heading" style="font-size: 10pt;"><span class="underline">BINELYN A. ARAC</p>
                    <p class="sub-heading" style="font-size: 10pt;">ADMIN SUPERVISOR - INTERNAL    </p>
                 
                </div>
                <div class="col-6" style="margin-left: 200px;">
                    <p class="sub-heading" style="margin-bottom: 30px; font-size: 10pt;">Noted and Verified by: </p>
                    <p class="sub-heading" style="font-size: 10pt;"><span class="underline">CRISTINA R. VERGARA </p>
                    <p class="sub-heading"  style="margin-bottom: 30px; font-size: 10pt;">ACCOUNTING/FINANCE MANAGER </p>
                    <p class="sub-heading" style="font-size: 10pt;"><span class="underline">JOVEN G. VANGUARDIA </p>
                    <p class="sub-heading" style="font-size: 10pt;">PRESIDENT </p>
                </div>
            </div>
        </div>
        <script>
            window.onload = function ()
            {
                // Open the print preview
                window.print();
            };
            window.onafterprint = function () 
            {
                // Navigate back to the index page
                window.location.href = '/purchaseorders'; // Change this URL to your index page's URL
            };
        </script>
    </body>
</html>





