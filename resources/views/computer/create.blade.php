

@extends('layouts.master')
@section('content')
                    
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
            <script src="https://kit.fontawesome.com/a076d05399.js"></script>
            <link rel="stylesheet" href="https://kit.fontawesome.com/a076d05399.css">
            <style type="text/css">
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
    <form method="POST" action="{{ url('/add-computer') }}" enctype="multipart/form-data" >
        @csrf
        <div class="container-fluid">
            <section class="content">
                <div id="MainContent_UpdatePanel">
                    <div class="container-fluid">
                        <div class="content-header" style="padding: 3px">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h1 class="m-0 text-dark"></h1>
                                </div>                   
                            </div>
                        </div>
                        <div class="col-md-12" >
                            <div class="card mx-auto">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h4 style="text-align: center;"> Add </h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            @foreach ($errors->all() as $error)
                                                <div>{{$error}} </div>
                                            @endforeach
                                        </div>
                                    @endif
                                    <div id="MainContent_divForm" class="row">
                                        <div class="col-12" style="overflow: auto; max-height: 500px;">
                                            <div class="row">                
                                                <div class="col-3">
                                                    <b>
                                                        <label  class="text-xs">Select Company: &nbsp;&nbsp;</label>
                                                        <select name="Company"  class="form-control-sm text-bold text-xs">
                                                            <option value=""></option>
                                                            <option value="asmi">ASMI</option>
                                                            <option value="tibsi">TIBSI</option>
                                                            <option value="cpn">CPN</option>
                                                        </select>
                                                    </b>
                                                </div>
                                                <div class="col-3">
                                                    <b>
                                                        <label class="text-xs">Status: &nbsp;&nbsp;</label>
                                                        <select name="Status"  class="form-control-sm text-bold text-xs">
                                                            <option value=""></option>
                                                            <option value="spare">SPARE</option>
                                                            <option value="used">USED</option>
                                                            <option value="damaged">DAMAGED</option>
                                                        </select>
                                                    </b>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row" style="margin-bottom: 20px;">
                                                <div class="col-3">
                                                    <label  class="text-xs">Item Name</label>
                                                    <input name="Item" type="text" class="form-control form-control-border form-control-sm text-xs" placeholder="Enter Item Name">
                                                </div>
                                                <div class="col-3">
                                                    <label  class="text-xs">Unit</label>
                                                        <input name="Unit" type="text" class="form-control form-control-border form-control-sm text-xs" placeholder="Enter Unit">
                                                    </div>
                                                    <div class="col-3">
                                                        <label class="text-xs">Image</label>
                                                            <input name="image" type="file" class="form-control form-control-border form-control-sm text-xs" placeholder="Enter Image">
                                                   </div>
                                                    <div class="col-3">
                                                        <label class="text-xs">Model No. / Name</label>
                                                            <input name="Model" type="text" class="form-control form-control-border form-control-sm text-xs" placeholder="Enter Model No. / Name">
                                                    </div>
                                                    <div class="col-3">
                                                        <label  class="text-xs">Serial / Code No.</label>
                                                            <input name="Serial_no" type="text" class="form-control form-control-border form-control-sm text-xs" placeholder="Enter Serial / Code No.">
                                                    </div>
                                                    <div class="col-3">
                                                            <label class="text-xs">Date</label>
                                                            <input name="Date" type="date" class="form-control form-control-border form-control-sm text-xs">
                                                    </div>
                                                </div>
                                                <div class="card-footer float-right">
                                                    <span id="MainContent_lblStatus"></span>
                                                    <div class="pull-right">
                                                        <button type="submit" id="saveComputer" class="btn btn-success btn-sm btn-sm"><i class="fa fa-arrow-alt-circle-right"></i>Submit</button>
                                                            <a id="MainContent_lnkCancel" class="btn btn-danger btn-sm btn-sm" href="{{ url('/computer') }}"><i class="fa fa-times-circle"></i>Cancel</a>
                                                    </div>
                                                </div>
                                            </div>        
                                        </div>
                                    </div>    
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>  
            </section>
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