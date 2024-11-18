@extends('layouts.master')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="https://kit.fontawesome.com/a076d05399.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.5.0/css/bootstrap.min.css">
    <style type="text/css">
        /* CSS styles go here */
        body {
            font-family: Arial, sans-serif;
        }
        .container-fluid {
            padding: 20px;
        }
        .content-header {
            margin-bottom: 20px;
        }
        .card {
            margin-bottom: 0px;
         
            height: auto; /* Adjust the height as needed */
        }
        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }
        .card-title {
            display: flex;
        }
        .card-tools {
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }
        .input-group {
     
        }
        .table {
      
        }
        #myDataTable_filter input[type="search"] {
            margin-bottom: 10px; /* Add a margin bottom to the search bar */
            margin-right: 5px;
        }
        #myDataTable_length {
            margin-left: 5px; 
        }
        .table th{
            border-top: 1px solid #dee2e6;
        }
        .table td {
            vertical-align: middle;
        }
        .table th:nth-child(9),
        .table td:nth-child(9) {
            width: 120px; /* Adjust the width as needed */
            vertical-align: middle;
        }
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }
        .modal-content {
            background-color: #fefefe;
            padding: 10px;
            border: 1px solid #888;
            width: 500%;
            height:600px;
        }
        .modal-dialog {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
            margin-left: 550px;
        }
        .form-row {
            display: flex;
            flex-wrap: wrap;
            margin-right: -5px;
            margin-left: -5px;
        }
        .form-group {
            flex: 0 0 50%;
            max-width: 50%;
            padding-right: 5px;
            padding-left: 5px;
        }
        .custom-width {
            width: 600px; /* Adjust the width as needed */
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
        .btn-sm {
            padding: 0.25rem 0.5rem;
            font-size: 0.675rem;
            line-height: 1.5;
            border-radius: 0.2rem;
        }
        .custom-add-button {
        /* Additional styles for the Add button */
            padding: 0.25rem 0.5rem;
            font-size: 0.875rem;
            line-height: 1.5;
            border-radius: 0.2rem;
        }
        .button-space {
            margin-right: 3px; /* Adjust the right margin as needed */
        }
        .cyan-button {
            background-color: rgb(54, 149, 149);
            /* Add any other styles you want */
        }
        .red-trash-icon {
        color: red;
        }

        .blue-edit-icon {
        color: blue;
     }
        .green-print-icon {
        color: green;
        }
        .modal {
            /* ... Other styles ... */
            display: flex;
            justify-content: center;
            align-items: center;
            /* ... Other styles ... */
        }
            .modal-dialog {
            /* ... Other styles ... */
            margin-left: auto;
            margin-right: auto;
            /* ... Other styles ... */
            }
        #loadingIcon {
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
        #loadingIcon .fa-spinner {
            font-size: 50px;
            color: white;
        }
    </style>
    <body>
        <div id="MainContent">
            <div class="container-fluid">
                @if (session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif
                <div class="col-md-12">
                    <div class="card mx-auto">
                        <div class="card-header">
                            <div class="card-title">
                                <a id="addPoBtn" class="btn btn-primary btn-sm float-left cyan-button" href="{{ url('/add-purchaseorders') }}">
                                    <i class="fas fa-plus-circle"></i> Add P.O.
                                </a>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0 w-100">
                            <table id="myDataTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr style="color:Black;">
                                        <th>Purchase Order No.</th>
                                        <th>P.O. Date</th>
                                        <th>Supplier</th>
                                        <th>Payment</th>
                                        <th>Company</th>
                                        <th>Grand Total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($purchaseDetails as $purchase)
                                        <tr>
                                            <td>{{ $purchase->po_number }}</td>
                                            <td>{{ $purchase->date }}</td>
                                            <td>{{ $purchase->supplier->supplier_name }}</td>

                                            <td>{{ $purchase->terms_of_payment }}</td>
                                            <td>{{ $purchase->company }}</td>
                                            <td>{{ $purchase->grandtotal }}</td>
                                            <td>
                                                <div class="dropdown d-inline">
                                                    <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Actions
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <!-- Update button -->
                                                        <a  class="dropdown-item" id="updatePoBtn" href="{{ url('/edit-purchaseorders/'.$purchase->id) }}">
                                                            <i class="fas fa-edit  blue-edit-icon"></i> Update
                                                        </a>
                                                        <a class="dropdown-item" id="printBtn"href="{{ url('/generate-' . strtoupper($purchase->company) . 'template/' . $purchase->id) }}">
                                                            <i class="fas fa-print green-print-icon"></i> Print
                                                        </a>                                                            
                                                        <a class="dropdown-item download-template" href="#" data-id="{{ $purchase->id }}">
                                                            <i class="fas fa-download"></i> Download 
                                                        </a>
                                                        <!-- Delete button -->
                                                        <a  class="dropdown-item" id="deletePo"  href="{{ url('/delete-purchaseorders/'.$purchase->id) }}">
                                                            <i class="fas fa-trash red-trash-icon"></i> Delete
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="loadingIcon" style="display: none;">
            <i class="fas fa-spinner fa-spin"></i> Loading...
        </div>
        <script>
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
                $('#addPoBtn').click(function () {
                    showLoadingIcon(); // Show the loading icon when the "Add P.O." button is clicked
                    setTimeout(refreshPage, 1000); // Reload the page after a delay of 1000 milliseconds (1 second)
                    });

                    $('#updatePoBtn').click(function () {
                    showLoadingIcon(); // Show the loading icon when the "Add P.O." button is clicked
                    setTimeout(refreshPage, 1000); // Reload the page after a delay of 1000 milliseconds (1 second)
                    });

              
                $('#deletePO').click(function () {
                    showLoadingIcon(); // Show the loading icon when any "Update" button is clicked
                    setTimeout(refreshPage, 1000); // Reload the page after a delay of 1000 milliseconds (1 second)
                    });
                    // (Optional) If you want to hide the loading icon after a short delay, you can use the following code
                    $('#printBtn').click(function () {
                    showLoadingIcon(); // Show the loading icon when any "Update" button is clicked
                    setTimeout(refreshPage, 1000); // Reload the page after a delay of 1000 milliseconds (1 second)
                    });
                $(document).ajaxStop(function () {
                    // Assuming the buttons trigger AJAX calls
                    hideLoadingIcon(); // Hide the loading icon when all AJAX calls are completed
                    });

                    
                });  

        </script>
    
    </body>

@endsection