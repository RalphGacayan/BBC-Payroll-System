<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
        body{
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
        .brand-section{
           ;
           padding: 10px 40px;
        }
        .logo{
            width: 50%;
        }

        .row{
            display: flex;
          
        }
        .col-6{
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
        table{
            background-color: #fff;
            width: 100%;
            border-collapse: collapse;
        }
        table thead tr{
            border: 1px solid #111;
            background-color: #f2f2f2;
        }
        table td {
            vertical-align: middle !important;
            text-align: center;
        }
        table th, table td {
            padding-top: 08px;
            padding-bottom: 08px;
        }
        .table-bordered{
            box-shadow: 0px 0px 5px 0.5px gray;
        }
        .table-bordered td, .table-bordered th {
            border: 1px solid #dee2e6;
        }
        .text-right{
            text-align: end;
        }
        .w-20{
            width: 20%;
        }
        .float-right{
            float: right;
        }
       
       
    </style>
</head>
<body>

    <div class="container">
      
        <div class="body-section">
            <div class="row-4">
                <div class="col-7"  style="text-align: center;">
                    <img src="{{ asset('assets/images/astro_logo.jpg') }}" alt="Left Image" class="logo" style="float: left; margin-right: 10px; width: 100px; height: 100px;">
                    <img src="{{ asset('assets/images/NK.jpg') }}" alt="Right Image" class="logo" style="float: right; margin-left: 10px; width: 100px; height: 100px;">
                    
                    <h4 >ASTRO SHIPMANAGEMENT,INC.</h4>
                    <h4 >6/F Skyrise 1 Bldg., Villa St., Cebu IT Park,</h4>
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
            <div class="row">
                <div class="col-6">
                    <p class="sub-heading">Supplier: <u style="text-decoration: underline;"></u> {{ $purchaseDetails->supplier->supplier_name }}</p>
                    <p class="sub-heading">Date: <u style="text-decoration: underline;">{{ $purchaseDetails->date }}</u></p>
                </div>
                <div class="col-7">
                    <p class="sub-heading">Terms of Payment: <u style="text-decoration: underline;"> {{ $purchaseDetails->terms_of_payment }}</u> </p>
                    <p class="sub-heading">Delivery Date: <u style="text-decoration: underline;"> {{ $purchaseDetails->delivery_date }}</u></p>
                   
                </div>
            </div>
        </div>

        <div class="body-section">
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

            <div class="row">
                <div class="col-6">
                    <p class="sub-heading" style="margin-bottom: 40px;">Prepared by: </p>
                    <p class="sub-heading" style="margin-bottom: 40px;"> </p>
                    <p class="sub-heading">BINELYN A. ARAC</p>
                    <p class="sub-heading">ADMIN SUPERVISOR for INTERNAL AFFAIRS   </p>
                </div>
                <div class="col-6">
                    <p class="sub-heading" style="margin-bottom: 40px;">Noted and Verified by: </p>
                    <p class="sub-heading">ACCOUNTING/FINANCE MANAGER </p>
                    <p class="sub-heading">PRESIDENT </p>
                </div>
            </div>
        </div>

      
    
    </div>      

</body>
</html>





