

@extends('layouts.master')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="https://kit.fontawesome.com/a076d05399.css">
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
         .table-container {
    height: 500px; /* Set the desired height */
    overflow-y: scroll; /* Enable vertical scrolling */
    border: 1px solid #ccc; /* Optional: Add a border */
}
    </style>
    <body>
        <div id="MainContent_UpdatePanel">
            <div class="container-fluid">
                @if (session('message'))
                    <div class ="alert alert-success">{{ session('message') }}</div>
                @endif
                    <div class="col-md-12"  >
                        <div class="card mx-auto">
                            <div class="card-header">
                                <div class="card-title">
                                    <a href="{{ url('/add-computer') }}" id="addPoBtn"class="btn btn-primary btn-sm float-left cyan-button">
                                        <i class="fas fa-plus-circle"></i> Add
                                    </a>
                                </div>
                            </div>
                            <div class="card-body table-responsive p-0 w-100 table-container">
                                <table id="myDataTable" class="table table-bordered table-striped">
                                    <thead style="position: sticky; top: 0; background-color: white;">
                                        <tr style="color:Black;">
                                            
                                            <th>Date</th>
                                            <th>Unit </th>
                                            <th>Item Name</th>
                                            <th>Model</th>
                                            <th>Image</th>
                                            <th>Serial Number</th>
                                            <th> Status
                                            </th>
                                            <th>
                                            <div style="display: flex; align-items: center;">
                                                Company
                                           </div>
                                            </th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                          
                                    <tbody>
                                        @php $counter = 1; @endphp
                                            @foreach ($computers as $computer)
                                                <tr >
                                                   
                                                    <td>{{ $computer->date }}</td>
                                                    <td>{{ $computer->unit }}</td>
                                                    <td>{{ $computer->item_name }}</td>
                                                    <td>{{ $computer->model }}</td>
                                                    <td>
                                                        <img src="{{ asset('uploads/computer/'.$computer->image) }}" width="50px" height="50px" alt="Image">  
                                                    </td>
                                                    <td>{{ $computer->serial_number }}</td>
                                                    <td>{{ $computer->status }}</td>
                                                    <td>{{ $computer->company }}</td>
                                                    <td>
                                                        <div class="dropdown d-inline">
                                                            <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton{{ $computer->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                Actions
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $computer->id }}">
                                                                <!-- Update button -->
                                                                <a  class="dropdown-item" id="updatePoBtn" href="{{ url('/edit-computer/'.$computer->id) }}">
                                                                    <i class="fas fa-edit blue-edit-icon"></i> Update
                                                                </a>
                                                              
                                                                <!-- Delete button -->
                                                                <a  class="dropdown-item" id="deletePo" href="{{ url('/delete-computer/'.$computer->id) }}">
                                                                    <i class="fas fa-trash red-trash-icon"></i> Delete
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @php $counter++; @endphp
                                    </tbody>
                                        <input type="hidden" name="ctl00$MainContent$hfRowCount" id="MainContent_hfRowCount">
                                        <input type="hidden" name="ctl00$MainContent$hfAlert" id="MainContent_hfAlert">
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

            // Attach click event to the "Update" buttons with the class "btn-primary"
            $('#updatePoBtn').click(function () {
            showLoadingIcon(); // Show the loading icon when any "Update" button is clicked
            setTimeout(refreshPage, 1000); // Reload the page after a delay of 1000 milliseconds (1 second)
            });

            $('#deletePoBtn').click(function () {
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
    </body>
@endsection
