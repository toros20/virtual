<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Plataforma ISJC</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="{{ URL::asset('css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="{{ URL::asset('css/mdb.min.css')}}" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="{{ URL::asset('css/style.css')}}" rel="stylesheet">

  <!-- MDBootstrap Cards Extended Pro  -->
 
</head>

  {{-- <div id="mdb-preloader" class="flex-center">
    <div id="preloader-markup"></div>
  </div> --}}

  <!-- Start your project here-->
  <body class="hidden-sn mdb-skin">

    <!--Double navigation-->
    <header>
        <!-- Sidebar navigation -->
        <div id="slide-out" class="side-nav sn-bg-4">
          <ul class="custom-scrollbar">
            <!-- Logo -->
            <li>
              <div class="logo-wrapper waves-light">
                <a href="#"><img style="height: 100px;" src="{{ URL::asset('img/logo-sanjose.PNG')}}" class="img-fluid flex-center"></a>
              </div>
            </li>
            
            <li>
              <ul class="collapsible collapsible-accordion">
                  <ul>
                      <li>
                       <p align=center> Navegación</p>
                      </li>
                      <hr>
                     
                        <li>
                            <a onclick="boletas()">
                                Boletas
                            </a>
                        </li>
                     
                    </ul>
              </ul>
            </li>
            <!--/. Side navigation links -->
          </ul>
          <div class="sidenav-bg mask-strong"></div>
        </div>
        <!--/. Sidebar navigation -->
        <!-- Navbar -->
        <nav class="navbar fixed-top navbar-toggleable-md navbar-expand-lg scrolling-navbar double-nav">
          <!-- SideNav slide-out button -->
          <div class="float-left">
             <a href="#" data-activates="slide-out" class="button-collapse"><i class="fas fa-bars"></i></a> 
          </div>
          <!-- Breadcrumb-->
          <div class="breadcrumb-dn mr-auto">
             <p>Menú de Navegación</p> 
          </div>
          <ul class="nav navbar-nav nav-flex-icons ml-auto">
            
            <li class="nav-item">
              <a class="nav-link"> <span class="clearfix d-none d-sm-inline-block"> Bienvenido {{ $user->name }}</span></a>
            </li>
            
            <li class="nav-item">
                
                  <form action="{{ route('logout') }}" method="POST">
                      <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                      <button class="btn btn-sm btn-danger" type="submit">SALIR</button>
                  </form>
              {{-- <a class="nav-link"> <span class="clearfix d-none d-sm-inline-block"> SALIR</span></a> --}}
            </li>
            
          </ul>
        </nav>
        <!-- /.Navbar -->
    </header>
    <!--/.Double navigation-->
  
    <!--Main Layout-->
    <main>
      <div class="container-fluid">
        <!--row-->
        <div class="row"> 
              
      <!--Accordion wrapper-->
      <div class="accordion md-accordion accordion-blocks" id="accordionEx78" role="tablist"
        aria-multiselectable="true">

        <!-- Accordion card -->
        <div class="card">

          <!-- Card header -->
          <div class="card-header" role="tab" id="headingUnfiled" class="collapse show">

            <!--Options-->
            <div class="dropdown float-left">
              <button class="btn btn-info btn-sm m-0 mr-3 p-2 dropdown-toggle" type="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false"><i class="fas fa-pencil-alt"></i>
              </button>
              <div class="dropdown-menu dropdown-info">
                <a class="dropdown-item" href="#">Add new condition</a>
                <a class="dropdown-item" href="#">Rename folder</a>
                <a class="dropdown-item" href="#">Delete folder</a>
              </div>
            </div>

            <!-- Heading -->
            <a data-toggle="collapse" data-parent="#accordionEx78" href="#collapse79" aria-expanded="true"
              aria-controls="collapse79">
              <h5 class="mt-1 mb-0">
                <span>Folder 1</span>
                <i class="fas fa-angle-down rotate-icon"></i>
              </h5>
            </a>

          </div>

          <!-- Card body -->
          <div id="collapseUnfiled" class="collapse" role="tabpanel" aria-labelledby="headingUnfiled"
            data-parent="#accordionEx78">
            <div class="card-body">

              <!--Top Table UI-->
              <div class="table-ui p-2 mb-3 mx-3 mb-4">

                <!--Grid row-->
                <div class="row">

                  <!--Grid column-->
                  <div class="col-xl-4 col-lg-6 col-md-12">

                    <!--Name-->
                    <select class="mdb-select colorful-select dropdown-info mx-2">
                      <option value="" disabled selected>Bulk actions</option>
                      <option value="1">Delete</option>
                      <option value="2">Change folder</option>
                    </select>

                  </div>
                  <!--Grid column-->

                  <!--Grid column-->
                  <div class="col-xl-4 col-lg-6 col-md-6">

                    <!--Blue select-->
                    <select class="mdb-select colorful-select dropdown-info mx-2">
                      <option value="" disabled>Show only</option>
                      <option value="1" selected>All <span> (2000)</span></option>
                      <option value="2">Clicks <span> (200)</span></option>
                      <option value="3">Page <span> (1800)</span></option>
                      <option value="4">Scroll <span> (200)</span></option>
                      <option value="5">Forms <span> (50)</span></option>
                      <option value="6">Time <span> (50)</span></option>
                      <option value="7">UTM <span> (50)</span></option>
                    </select>
                    <!--/Blue select-->

                  </div>
                  <!--Grid column-->

                  <!--Grid column-->
                  <div class="col-xl-4 col-lg-6 col-md-6">

                    <!--Blue select-->
                    <select class="mdb-select colorful-select dropdown-info mx-2">
                      <option value="" disabled selected>Filter</option>
                      <option value="1">All <span> (100)</span></option>
                      <option value="1">Active <span> (2000)</span></option>
                      <option value="2">Inactive <span> (1000)</span></option>
                    </select>
                    <!--/Blue select-->

                  </div>
                  <!--Grid column-->

                </div>
                <!--Grid row-->

              </div>
              <!--Top Table UI-->

              <!-- Table responsive wrapper -->
              <div class="table-responsive mx-3">
                <!--Table-->
                <table class="table table-hover mb-0">

                  <!--Table head-->
                  <thead>
                    <tr>
                      <th>
                        <input class="form-check-input" type="checkbox" id="checkbox">
                        <label for="checkbox" class="mr-2 label-table"></label>
                      </th>
                      <th class="th-lg"><a>Name <i class="fas fa-sort ml-1"></i></a></th>
                      <th class="th-lg"><a>Condition<i class="fas fa-sort ml-1"></i></a></th>
                      <th class="th-lg"><a>Last edited<i class="fas fa-sort ml-1"></i></a></th>
                      <th></th>
                    </tr>
                  </thead>
                  <!--Table head-->

                  <!--Table body-->
                  <tbody>
                    <tr>
                      <th scope="row">
                        <input class="form-check-input" type="checkbox" id="checkbox1">
                        <label for="checkbox1" class="label-table"></label>
                      </th>
                      <td>Test subscription</td>
                      <td>Scroll % is equal or greater than <strong>80</strong></td>
                      <td>12.06.2017</td>
                      <td>
                        <a><i class="fas fa-info mx-1" data-toggle="tooltip" data-placement="top"
                            title="Tooltip on top"></i></a>
                        <a><i class="fas fa-pen-square mx-1"></i></a>
                        <a><i class="fas fa-times mx-1"></i></a>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">
                        <input class="form-check-input" type="checkbox" id="checkbox2">
                        <label for="checkbox2" class="label-table"></label>
                      </th>
                      <td>Product Hunt Visitor</td>
                      <td>Scroll % is equal or greater than <strong>80</strong></td>
                      <td>13.06.2017</td>
                      <td>
                        <a><i class="fas fa-info mx-1" data-toggle="tooltip" data-placement="top"
                            title="Tooltip on top"></i></a>
                        <a><i class="fas fa-pen-square mx-1"></i></a>
                        <a><i class="fas fa-times mx-1"></i></a>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">
                        <input class="form-check-input" type="checkbox" id="checkbox3">
                        <label for="checkbox3" class="label-table"></label>
                      </th>
                      <td>Test subscription</td>
                      <td>Scroll % is equal or greater than <strong>80</strong></td>
                      <td>12.06.2017</td>
                      <td>
                        <a><i class="fas fa-info mx-1" data-toggle="tooltip" data-placement="top"
                            title="Tooltip on top"></i></a>
                        <a><i class="fas fa-pen-square mx-1"></i></a>
                        <a><i class="fas fa-times mx-1"></i></a>
                      </td>
                    </tr>
                  </tbody>
                  <!--Table body-->
                </table>
                <!--Table-->
              </div>
              <!-- Table responsive wrapper -->

            </div>
          </div>
        </div>
        <!-- Accordion card -->

      </div><!--/.Accordion wrapper-->

      </div><!--row-->

    </main>
      
      
      <!--Main Layout-->
      <br><br>
   
  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="{{ URL::asset('js/jquery-3.3.1.min.js')}}"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="{{ URL::asset('js/popper4.min.js')}}"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="{{ URL::asset('js/bootstrap4.min.js')}}"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="{{ URL::asset('js/mdb.min.js')}}"></script>
</body>

</html>