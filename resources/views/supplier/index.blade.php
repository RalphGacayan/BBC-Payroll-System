@extends('layouts.master')
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>

<script>
    // JavaScript code goes here

    // Get the modal element
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("MainContent_lnkAdd");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    var searchBtn = document.getElementById("Search");
    var searchInput = document.getElementById("MainContent_txtSearch");

    // When the user clicks the button, open the modal
    btn.onclick = function () {
        modal.style.display = "block";
    };

    // When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modal.style.display = "none";
    };

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    };

      searchBtn.onclick = function () {
        applyFilters();
    };

    searchInput.addEventListener("keyup", function (event) {
        if (event.keyCode === 13) { // Enter key pressed
            event.preventDefault();
            applyFilters();
        }
    });

   


</script>

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
        margin: 10% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
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
</style>

<body>
    <div id="MainContent_UpdatePanel">
        <div class="container-fluid">
            @if (session('message'))
               <div class ="alert alert-success">{{ session('message') }}</div>
            @endif
          
            <div class="col-md-12">
                <div class="card mx-auto">
                    <div class="card-header">
                        <div class="card-title">
                            <a href="{{ url('/add-supplier') }}" class="btn btn-primary btn-sm float-left">
                                <i class="fas fa-plus-circle"></i> Add Supplier
                            </a>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table  class="table table-bordered table-striped">
                            <thead>
                                <tr style="color:Black;">
                                    <th>Supplier Name </th>
                                     <th>Address</th>
                                     <th>Attention</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($suppliers as $supplier)
                                <tr>
                                    
                                    <td>{{ $supplier->supplier_name }}</td>
                                    <td>{{ $supplier->address }}</td>
                                    <td>{{ $supplier->attention }}</td>
                                   
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <!-- Update button -->
                                            <a href="{{ url('/supplier/'.$supplier->id) }}" class="btn btn-primary btn-sm mr-1">
                                                <i class="fas fa-edit"></i> Update
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                                    <input type="hidden" name="ctl00$MainContent$hfRowCount" id="MainContent_hfRowCount">
                                    <input type="hidden" name="ctl00$MainContent$hfAlert" id="MainContent_hfAlert">
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <p>Modal content goes here</p>
        </div>
    </div>
    <div id="MainContent_pnlAlertModal" class="modal fade" role="dialog">
        <!-- Modal dialog content goes here -->
    </div>
</body>

@endsection
