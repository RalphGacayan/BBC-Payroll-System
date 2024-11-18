<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
      <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            <span>Dashboard</span>
                        </a>
                        <a class="nav-link collapsed {{ Request::is('purchaseorders','add-purchaseorders','update-purchaseorders') ? 'active' : '' }}"href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuthPO" aria-expanded="false" aria-controls="pagesCollapseAuthPO">
                            <div class="sb-nav-link-icon"><i class="nav-icon fas fa-list-alt"></i></div>
                                            Purchase Order
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseAuthPO" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPagesPO">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link {{ Request::is('purchaseorders') ? 'active' : '' }}" href="{{ url('/purchaseorders') }}" style="{{ Request::is('purchaseorders') ? 'background-color: darkblue; color: white;' : '' }}">
                                    <div class="sb-nav-link-icon"><i class="far fa-circle nav-icon" style="color: white;"></i></div>
                                    <span>View</span>
                                </a>
                                <a class="nav-link {{ Request::is('add-purchaseorders') ? 'active' : '' }}" href="{{ url('/add-purchaseorders') }}" style="{{ Request::is('add-purchaseorders') ? 'background-color: darkblue; color: white;' : '' }}">
                                    <div class="sb-nav-link-icon"><i class="far fa-circle nav-icon"  style="color: white;"></i></div>
                                    <span>Add</span>
                                </a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed  {{ Request::is('computer', 'add-computer', 'password.html') ? 'active' : '' }}" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="nav-icon fas fa-tags"></i></div>
                            Asset Inventory
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed  {{ Request::is('computer', 'add-computer', 'password.html') ? 'active' : '' }}" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                    <div class="sb-nav-link-icon"><i class="nav-icon fas fa-desktop"></i></div>
                                    Hardware
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link {{ Request::is('hardware') ? 'active' : '' }}" href="{{ url('/hardware') }}" style="{{ Request::is('hardware') ? 'background-color: darkblue; color: white;' : '' }}">
                                            <div class="sb-nav-link-icon"><i class="far fa-circle nav-icon" style="color: white;"></i></div>
                                            <span>View</span>
                                        </a>
                                        <a class="nav-link {{ Request::is('add-hardware') ? 'active' : '' }}" href="{{ url('/add-hardware') }}" style="{{ Request::is('add-hardware') ? 'background-color: darkblue; color: white;' : '' }}">
                                            <div class="sb-nav-link-icon"><i class="far fa-circle nav-icon"  style="color: white;"></i></div>
                                            <span>Add</span>
                                        </a>
                                    </nav>
                                </div>
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                    <div class="sb-nav-link-icon"><i class="fa-solid fa-laptop-code"></i></div>
                                    Software
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link {{ Request::is('') ? 'active' : '' }}" href="{{ url('/') }}" style="{{ Request::is('') ? 'background-color: darkblue; color: white;' : '' }}">
                                            <div class="sb-nav-link-icon"><i class="far fa-circle nav-icon" style="color: white;"></i></div>
                                            <span>View</span>
                                        </a>
                                        <a class="nav-link {{ Request::is('') ? 'active' : '' }}" href="{{ url('') }}" style="{{ Request::is('') ? 'background-color: darkblue; color: white;' : '' }}">
                                            <div class="sb-nav-link-icon"><i class="far fa-circle nav-icon"  style="color: white;"></i></div>
                                            <span>Add</span>
                                        </a>
                                    </nav>
                                </div>
                            </nav>
                        </div>
                        <a class="nav-link" href="index.html">
                            <div class="sb-nav-link-icon"><i class="nav-icon fas fa-exchange-alt"></i></div>
                           Turn Over
                         </a>
                        <a class="nav-link collapsed  {{ Request::is('user') ? 'active' : '' }}" href="#" data-bs-toggle="collapse" data-bs-target="#collapseSettings" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="nav-icon fas fa-wrench"></i></div>
                            Settings
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseSettings" aria-labelledby="headingTwo" data-bs-parent="#CollapseSettings">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link {{ Request::is('user') ? 'active' : '' }}" href="{{ url('/user') }}" style="{{ Request::is('user') ? 'background-color: darkblue; color: white;' : '' }}">
                                    <div class="sb-nav-link-icon"><i class="far fa-circle nav-icon"  style="color: white;"></i></div>
                                    <span>Users</span>
                                </a>
                                <a class="nav-link" href="{{ url('/supplier') }}" style="{{ Request::is('') ? 'background-color: darkblue; color: white;' : '' }}">
                                    <div class="sb-nav-link-icon"><i class="far fa-circle nav-icon"  style="color: white;"></i></div>
                                    <span> Suppliers</span>
                                </a>
                            </nav>
                        </div>
                    </div>
                </div>
            
            </nav>
        </div>
      </div>
    </body>
</html>    