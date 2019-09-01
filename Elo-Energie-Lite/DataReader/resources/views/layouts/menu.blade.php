<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Elo-Energie - DataReader</title>

    <!-- Custom fonts for this template-->
    <link href="{{URL::asset("fontawesome-free/css/all.min.css")}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{URL::asset("css/sb-admin-2.min.css")}}" rel="stylesheet">

</head>

    <body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-database"></i>
                </div>
                <div class="sidebar-brand-text mx-3">DataReader</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="/">
                    <i class="fas fa-fw fa-spinner"></i>
                    <span>Reset</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Lecture de fichier
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-file-csv"></i>
                    <span>CSV</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded border-left-info">
                        <h6 class="collapse-header">Paramètres:</h6>
                        <div class="collapse-item">
                            <label for="delimiter">Délimiteur: </label>
                            <input type="text" size="1" class="form-control form-control-user w-50" id="delimiter" name="delimiter" placeholder="Délimiteur" value=";">
                        </div>

                        <div class="collapse-item">
                            <label for="float">Symbole décimal: </label>
                            <input type="text" size="1" class="form-control form-control-user w-50" id="float" name="float" placeholder="Symbole" value=",">
                        </div>

                        <div class="collapse-item">
{{--                            <label for="data">Fichier CSV: </label>--}}
{{--                            <label class="btn-block btn-user btn-dark p-2 rounded">--}}
{{--                                Importer<i class="fa fa-file-import ml-1"></i><input type="file" name="data" id="data" hidden>--}}
{{--                            </label>--}}
                            <div class="form-group">
                                <label for="data">Fichier CSV: </label>
                                <input type="file" id="fileinput" class="form-control-file">
                            </div>
                        </div>
{{--                        <hr class="ml-auto mb-0 mt-1 w-75">--}}
{{--                        <div class="collapse-header">--}}
{{--                            <button class="btn-user btn-outline-primary btn" id="loadCsv">Valider</button>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Paramètres</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded border-left-warning">

                        <h6 class="collapse-header">Réglage:</h6>
                        <div class="collapse-item">
                            <label for="calibration">Calibration LMA: </label>
                            <input type="number" step="0.01" class="form-control form-control-user" id="calibration" name="calibration" placeholder="Calibration" value="-2.25">
                        </div>

{{--                        <div class="collapse-item">--}}
{{--                            <label for="float">Commencer à: </label>--}}
{{--                            <input type="number" step="0.001" min="0" class="form-control form-control-user" id="start" name="start" placeholder="mm">--}}
{{--                        </div>--}}

{{--                        <div class="collapse-item">--}}
{{--                            <label for="float">Finir à: </label>--}}
{{--                            <input type="number" step="0.001" min="0" class="form-control form-control-user" id="end" name="end" placeholder="mm">--}}
{{--                        </div>--}}

                        <div class="collapse-item">
                            <label for="calibration">Observer: </label>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="transit">
                                <label class="custom-control-label" for="transit">Aller <span class="small">(retour par défault)</span></label>
                            </div>
                        </div>


{{--                        <h6 class="collapse-header">Custom Utilities:</h6>--}}
{{--                        <a class="collapse-item" href="utilities-color.html">Colors</a>--}}
{{--                        <a class="collapse-item" href="utilities-border.html">Borders</a>--}}
{{--                        <a class="collapse-item" href="utilities-animation.html">Animations</a>--}}
{{--                        <a class="collapse-item" href="utilities-other.html">Other</a>--}}
                    </div>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Echelle -->
            <div class="sidebar-heading">
                Echelle
            </div>
            <!-- LD - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                    <i class="fas fa-binoculars"></i>
                    <span>LD</span>
                </a>
                <div id="collapseFour" class="collapse" aria-labelledby="collapseFour" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded border-left-danger">
                        <h6 class="collapse-header">LD:</h6>
                        <div class="collapse-item">
                            <label for="delimiter">Vertical: </label>
                            <input type="number" step="0.01" class="form-control form-control-sm form-control-user" id="ld-v-value" name="ld-v-value" placeholder="..." >
                            <button class="btn-user btn-outline-success btn btn-sm m-1" id="apply-ld-v-value"><i class="fa fa-check mr-1"></i>Appliquer</button>
                        </div>

                        <div class="collapse-item">
                            <button class="btn-user btn-outline-primary btn btn-sm m-1 btn-ld-v-value" value="50"><i class="fa fa-arrows-alt-v mr-1"></i>&nbsp;&nbsp;50</button>
                            <button class="btn-user btn-outline-primary btn btn-sm m-1 btn-ld-v-value" value="100"><i class="fa fa-arrows-alt-v mr-1"></i>100</button><br>
                            <button class="btn-user btn-outline-primary btn btn-sm m-1 btn-ld-v-value" value="250"><i class="fa fa-arrows-alt-v mr-1"></i>250</button>
                            <button class="btn-user btn-outline-primary btn btn-sm m-1 btn-ld-v-value" value="500"><i class="fa fa-arrows-alt-v mr-1"></i>500</button>
                        </div>

                        <div class="collapse-item">
                            <label for="delimiter">Horizontale: </label>
                            <input type="number" step="0.01" class="form-control form-control-sm form-control-user" id="ld-h-value" name="ld-h-value" placeholder="..." >
                            <button class="btn-user btn-outline-success btn btn-sm m-1" id="apply-ld-h-value"><i class="fa fa-check mr-1"></i>Appliquer</button>
                        </div>

                        <div class="collapse-item">
                            <button class="btn-user btn-outline-dark btn btn-sm m-1 btn-ld-h-value" value="50"><i class="fa fa-arrows-alt-h mr-1"></i>&nbsp;&nbsp;50</button>
                            <button class="btn-user btn-outline-dark btn btn-sm m-1 btn-ld-h-value" value="100"><i class="fa fa-arrows-alt-h mr-1"></i>100</button><br>
                            <button class="btn-user btn-outline-dark btn btn-sm m-1 btn-ld-h-value" value="250"><i class="fa fa-arrows-alt-h mr-1"></i>250</button>
                            <button class="btn-user btn-outline-dark btn btn-sm m-1 btn-ld-h-value" value="500"><i class="fa fa-arrows-alt-h mr-1"></i>500</button>
                        </div>

                    </div>
                </div>
            </li>
            <!-- LMA - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                    <i class="fas fa-binoculars"></i>
                    <span>LMA</span>
                </a>
                <div id="collapseFive" class="collapse" aria-labelledby="collapseFive" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded border-left-danger">
                        <h6 class="collapse-header">LMA:</h6>
                        <div class="collapse-item">
                            <label for="delimiter">Vertical: </label>
                            <input type="number" step="0.01" class="form-control form-control-sm form-control-user" id="lma-v-value" name="lma-v-value" placeholder="..." >
                            <button class="btn-user btn-outline-success btn btn-sm m-1" id="apply-lma-v-value"><i class="fa fa-check mr-1"></i>Appliquer</button>
                        </div>

                        <div class="collapse-item">
                            <button class="btn-user btn-outline-primary btn btn-sm m-1 btn-lma-v-value" value="1"><i class="fa fa-arrows-alt-v mr-1"></i>&nbsp;1</button>
                            <button class="btn-user btn-outline-primary btn btn-sm m-1 btn-lma-v-value" value="2"><i class="fa fa-arrows-alt-v mr-1"></i>&nbsp;2</button><br>
                            <button class="btn-user btn-outline-primary btn btn-sm m-1 btn-lma-v-value" value="5"><i class="fa fa-arrows-alt-v mr-1"></i>&nbsp;5</button>
                            <button class="btn-user btn-outline-primary btn btn-sm m-1 btn-lma-v-value" value="10"><i class="fa fa-arrows-alt-v mr-1"></i>10</button>
                        </div>

                        <div class="collapse-item">
                            <label for="delimiter">Horizontale: </label>
                            <input type="number" step="0.01" class="form-control form-control-sm form-control-user" id="lma-h-value" name="lma-h-value" placeholder="..." >
                            <button class="btn-user btn-outline-success btn btn-sm m-1" id="apply-lma-h-value"><i class="fa fa-check mr-1"></i>Appliquer</button>
                        </div>

                        <div class="collapse-item">
                            <button class="btn-user btn-outline-dark btn btn-sm m-1 btn-lma-h-value" value="50"><i class="fa fa-arrows-alt-h mr-1"></i>&nbsp;&nbsp;50</button>
                            <button class="btn-user btn-outline-dark btn btn-sm m-1 btn-lma-h-value" value="100"><i class="fa fa-arrows-alt-h mr-1"></i>100</button><br>
                            <button class="btn-user btn-outline-dark btn btn-sm m-1 btn-lma-h-value" value="250"><i class="fa fa-arrows-alt-h mr-1"></i>250</button>
                            <button class="btn-user btn-outline-dark btn btn-sm m-1 btn-lma-h-value" value="500"><i class="fa fa-arrows-alt-h mr-1"></i>500</button>
                        </div>

                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Export Graph -->

            <!-- Heading -->
            <div class="sidebar-heading">
                Exportation des graphiques
            </div>

            <li class="nav-item">
                <a class="nav-link" id="ld-export">
                    <i class="fa fa-file-export"></i>
                    <span>LD</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" id="lma-export">
                    <i class="fas fa-file-export"></i>
                    <span>LMA</span></a>
            </li>


            <!-- Heading -->
{{--            <div class="sidebar-heading">--}}
{{--                Développeur--}}
{{--            </div>--}}

            <!-- Nav Item - Pages Collapse Menu -->
{{--            <li class="nav-item active">--}}
{{--                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">--}}
{{--                    <i class="fas fa-fw fa-folder"></i>--}}
{{--                    <span>Pages</span>--}}
{{--                </a>--}}
{{--                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">--}}
{{--                    <div class="bg-white py-2 collapse-inner rounded">--}}
{{--                        <h6 class="collapse-header">Login Screens:</h6>--}}
{{--                        <a class="collapse-item" href="login.html">Login</a>--}}
{{--                        <a class="collapse-item" href="register.html">Register</a>--}}
{{--                        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>--}}
{{--                        <div class="collapse-divider"></div>--}}
{{--                        <h6 class="collapse-header">Other Pages:</h6>--}}
{{--                        <a class="collapse-item" href="404.html">404 Page</a>--}}
{{--                        <a class="collapse-item active" href="blank.html">Blank Page</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </li>--}}

            <!-- Nav Item - Charts -->
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link" href="charts.html">--}}
{{--                    <i class="fas fa-fw fa-chart-area"></i>--}}
{{--                    <span>Charts</span></a>--}}
{{--            </li>--}}

            <!-- Nav Item - Tables -->

{{--            <li class="nav-item">--}}
{{--                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTables" aria-expanded="true" aria-controls="collapseTables">--}}
{{--                    <i class="fas fa-fw fa-table"></i>--}}
{{--                    <span>Tables</span>--}}
{{--                </a>--}}
{{--                <div id="collapseTables" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">--}}
{{--                    <div class="bg-white py-2 collapse-inner rounded">--}}
{{--                        <a class="collapse-item" href="/table/asso">Associations</a>--}}
{{--                        <a class="collapse-item" href="/table/transaction">Transaction</a>--}}
{{--                        <a class="collapse-item" href="/table/users">Users</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </li>--}}

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
{{--                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">--}}
{{--                        <div class="input-group">--}}
{{--                            <input type="text" class="form-control bg-light border-0 small" placeholder="Rechercher..." aria-label="Search" aria-describedby="basic-addon2">--}}
{{--                            <div class="input-group-append">--}}
{{--                                <button class="btn btn-primary disabled" type="button">--}}
{{--                                    <i class="fas fa-search fa-sm"></i>--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
{{--                        <li class="nav-item dropdown no-arrow d-sm-none">--}}
{{--                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                                <i class="fas fa-search fa-fw"></i>--}}
{{--                            </a>--}}
{{--                            <!-- Dropdown - Messages -->--}}
{{--                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">--}}
{{--                                <form class="form-inline mr-auto w-100 navbar-search">--}}
{{--                                    <div class="input-group">--}}
{{--                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Rechercher..." aria-label="Search" aria-describedby="basic-addon2">--}}
{{--                                        <div class="input-group-append">--}}
{{--                                            <button class="btn btn-primary disabled" type="button">--}}
{{--                                                <i class="fas fa-search fa-sm"></i>--}}
{{--                                            </button>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </li>--}}

                        <!-- Nav Item - Alerts -->
{{--                        <li class="nav-item dropdown no-arrow mx-1">--}}
{{--                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                                <i class="fas fa-bell fa-fw"></i>--}}
{{--                                <!-- Counter - Alerts -->--}}
{{--                                <span class="badge badge-danger badge-counter">3+</span>--}}
{{--                            </a>--}}
{{--                            <!-- Dropdown - Alerts -->--}}
{{--                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">--}}
{{--                                <h6 class="dropdown-header">--}}
{{--                                    Alerts Center--}}
{{--                                </h6>--}}
{{--                                <a class="dropdown-item d-flex align-items-center" href="#">--}}
{{--                                    <div class="mr-3">--}}
{{--                                        <div class="icon-circle bg-primary">--}}
{{--                                            <i class="fas fa-file-alt text-white"></i>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div>--}}
{{--                                        <div class="small text-gray-500">December 12, 2019</div>--}}
{{--                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>--}}
{{--                                    </div>--}}
{{--                                </a>--}}
{{--                                <a class="dropdown-item d-flex align-items-center" href="#">--}}
{{--                                    <div class="mr-3">--}}
{{--                                        <div class="icon-circle bg-success">--}}
{{--                                            <i class="fas fa-donate text-white"></i>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div>--}}
{{--                                        <div class="small text-gray-500">December 7, 2019</div>--}}
{{--                                        $290.29 has been deposited into your account!--}}
{{--                                    </div>--}}
{{--                                </a>--}}
{{--                                <a class="dropdown-item d-flex align-items-center" href="#">--}}
{{--                                    <div class="mr-3">--}}
{{--                                        <div class="icon-circle bg-warning">--}}
{{--                                            <i class="fas fa-exclamation-triangle text-white"></i>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div>--}}
{{--                                        <div class="small text-gray-500">December 2, 2019</div>--}}
{{--                                        Spending Alert: We've noticed unusually high spending for your account.--}}
{{--                                    </div>--}}
{{--                                </a>--}}
{{--                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>--}}
{{--                            </div>--}}
{{--                        </li>--}}

                        <!-- Nav Item - Messages -->
{{--                        <li class="nav-item dropdown no-arrow mx-1">--}}
{{--                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                                <i class="fas fa-envelope fa-fw"></i>--}}
{{--                                <!-- Counter - Messages -->--}}
{{--                                <span class="badge badge-danger badge-counter">7</span>--}}
{{--                            </a>--}}
{{--                            <!-- Dropdown - Messages -->--}}
{{--                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">--}}
{{--                                <h6 class="dropdown-header">--}}
{{--                                    Message Center--}}
{{--                                </h6>--}}
{{--                                <a class="dropdown-item d-flex align-items-center" href="#">--}}
{{--                                    <div class="dropdown-list-image mr-3">--}}
{{--                                        <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="">--}}
{{--                                        <div class="status-indicator bg-success"></div>--}}
{{--                                    </div>--}}
{{--                                    <div class="font-weight-bold">--}}
{{--                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been having.</div>--}}
{{--                                        <div class="small text-gray-500">Emily Fowler · 58m</div>--}}
{{--                                    </div>--}}
{{--                                </a>--}}
{{--                                <a class="dropdown-item d-flex align-items-center" href="#">--}}
{{--                                    <div class="dropdown-list-image mr-3">--}}
{{--                                        <img class="rounded-circle" src="https://source.unsplash.com/AU4VPcFN4LE/60x60" alt="">--}}
{{--                                        <div class="status-indicator"></div>--}}
{{--                                    </div>--}}
{{--                                    <div>--}}
{{--                                        <div class="text-truncate">I have the photos that you ordered last month, how would you like them sent to you?</div>--}}
{{--                                        <div class="small text-gray-500">Jae Chun · 1d</div>--}}
{{--                                    </div>--}}
{{--                                </a>--}}
{{--                                <a class="dropdown-item d-flex align-items-center" href="#">--}}
{{--                                    <div class="dropdown-list-image mr-3">--}}
{{--                                        <img class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60" alt="">--}}
{{--                                        <div class="status-indicator bg-warning"></div>--}}
{{--                                    </div>--}}
{{--                                    <div>--}}
{{--                                        <div class="text-truncate">Last month's report looks great, I am very happy with the progress so far, keep up the good work!</div>--}}
{{--                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>--}}
{{--                                    </div>--}}
{{--                                </a>--}}
{{--                                <a class="dropdown-item d-flex align-items-center" href="#">--}}
{{--                                    <div class="dropdown-list-image mr-3">--}}
{{--                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="">--}}
{{--                                        <div class="status-indicator bg-success"></div>--}}
{{--                                    </div>--}}
{{--                                    <div>--}}
{{--                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...</div>--}}
{{--                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>--}}
{{--                                    </div>--}}
{{--                                </a>--}}
{{--                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>--}}
{{--                            </div>--}}
{{--                        </li>--}}

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
{{--                        <li class="nav-item dropdown no-arrow">--}}
{{--                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->name}}</span>--}}
{{--                                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">--}}
{{--                                <i class="fa fa-user-circle"></i>--}}
{{--                            </a>--}}
{{--                            <!-- Dropdown - User Information -->--}}
{{--                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">--}}
{{--                                <a class="dropdown-item" href="#">--}}
{{--                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>--}}
{{--                                    Profile--}}
{{--                                </a>--}}
{{--                                <a class="dropdown-item" href="#">--}}
{{--                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>--}}
{{--                                    Paramètre--}}
{{--                                </a>--}}
{{--                                <a class="dropdown-item" href="#">--}}
{{--                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>--}}
{{--                                    Activité--}}
{{--                                </a>--}}
{{--                                <div class="dropdown-divider"></div>--}}
{{--                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">--}}
{{--                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>--}}
{{--                                    Déconnexion--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </li>--}}

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    @yield('content')

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Arthur Sicard 2019</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
{{--    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--        <div class="modal-dialog" role="document">--}}
{{--            <div class="modal-content">--}}
{{--                <div class="modal-header">--}}
{{--                    <h5 class="modal-title" id="exampleModalLabel">Êtes vous certain de vouloir vous déconnecter?</h5>--}}
{{--                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">--}}
{{--                        <span aria-hidden="true">×</span>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--                <div class="modal-body">Selectionner "Déconnexion" pour vous fermer la session.</div>--}}
{{--                <div class="modal-footer">--}}
{{--                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>--}}
{{--                    <a class="btn btn-primary" href="{{ route('logout') }}"--}}
{{--                       onclick="event.preventDefault();--}}
{{--                                                     document.getElementById('logout-form').submit();">Déconnexion</a>--}}
{{--                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
{{--                        @csrf--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    <!-- Bootstrap core JavaScript-->
    <script src="{{URL::asset("jquery/jquery.min.js")}}"></script>
    <script src="{{URL::asset("bootstrap/js/bootstrap.bundle.min.js")}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{URL::asset("jquery-easing/jquery.easing.min.js")}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{URL::asset("js/sb-admin-2.min.js")}}"></script>
    @yield('js')

    </body>
</html>
