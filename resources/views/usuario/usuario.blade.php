<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Archivo Central - {{$usuario->name}}</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('vendor/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('vendor/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/27f2e108a5.js" crossorigin="anonymous"></script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('layout.side-bar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('layout.top-bar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <section style="background-color: #eee;">
                        <div class="container py-5">                      
                          <div class="row">
                            <div class="col-lg-4">
                              <div class="card mb-4">
                                <div class="card-body text-center">
                                  <img src="{{asset('img/profile.svg')}}" alt="avatar"
                                    class="rounded-circle img-fluid" style="width: 150px;">
                                  <h5 class="my-3">{{$usuario->name}} {{$usuario->apellido}}</h5>
                                  @foreach($datos as $d)
                                  <p class="text-muted mb-1">{{$d->nombre_rol}}</p>
                                  @endforeach
                                  @foreach($centros as $c)
                                  <p class="text-muted mb-4">{{$c->nombre_unidad}}</p>
                                  @endforeach
                                  <div class="d-flex justify-content-center mb-2">
                                    <button type="button" class="btn btn-primary">Follow</button>
                                    <button type="button" class="btn btn-outline-primary ms-1">Message</button>
                                  </div>
                                </div>
                              </div>
                              <div class="card mb-4 mb-lg-0">
                                <div class="card-body p-0">
                                  <ul class="list-group list-group-flush rounded-3">
                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                      <i class="fas fa-globe fa-lg text-warning"></i>
                                      <p class="mb-0">https://mdbootstrap.com</p>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                      <i class="fab fa-github fa-lg" style="color: #333333;"></i>
                                      <p class="mb-0">mdbootstrap</p>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                      <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                                      <p class="mb-0">@mdbootstrap</p>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                      <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                                      <p class="mb-0">mdbootstrap</p>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                      <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                                      <p class="mb-0">mdbootstrap</p>
                                    </li>
                                  </ul>
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-8">
                              <div class="card mb-4">
                                <div class="card-body">
                                  <div class="row">
                                    <div class="col-sm-3">
                                      <p class="mb-0">Nombre Completo</p>
                                    </div>
                                    <div class="col-sm-9">
                                      <p class="text-muted mb-0">{{$usuario->name}} {{$usuario->apellido}}</p>
                                    </div>
                                  </div>
                                  <hr>
                                  <div class="row">
                                    <div class="col-sm-3">
                                      <p class="mb-0">Correo</p>
                                    </div>
                                    <div class="col-sm-9">
                                      <p class="text-muted mb-0">{{$usuario->email}}</p>
                                    </div>
                                  </div>
                                  <hr>
                                  <div class="row">
                                    <div class="col-sm-3">
                                      <p class="mb-0">Telefono</p>
                                    </div>
                                    <div class="col-sm-9">
                                      <p class="text-muted mb-0">{{$usuario->telefono}}</p>
                                    </div>
                                  </div>
                                  <hr>
                                  <div class="row">
                                    <div class="col-sm-3">
                                      <p class="mb-0">Rut</p>
                                    </div>
                                    <div class="col-sm-9">
                                      <p class="text-muted mb-0">{{$usuario->rut}}</p>
                                    </div>
                                  </div>
                                  <hr>
                                  <div class="row">
                                    <div class="col-sm-3">
                                      <p class="mb-0">Rol</p>
                                    </div>
                                    <div class="col-sm-9">
                                      @foreach($datos as $d)
                                      <p class="text-muted mb-0">{{$d->nombre_rol}}</p>
                                      @endforeach
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="card mb-4 mb-md-0">
                                    <div class="card-body">
                                      <p class="mb-4"><span class="text-primary font-italic me-1">assigment</span> Project Status
                                      </p>
                                      <p class="mb-1" style="font-size: .77rem;">Web Design</p>
                                      <div class="progress rounded" style="height: 5px;">
                                        <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80"
                                          aria-valuemin="0" aria-valuemax="100"></div>
                                      </div>
                                      <p class="mt-4 mb-1" style="font-size: .77rem;">Website Markup</p>
                                      <div class="progress rounded" style="height: 5px;">
                                        <div class="progress-bar" role="progressbar" style="width: 72%" aria-valuenow="72"
                                          aria-valuemin="0" aria-valuemax="100"></div>
                                      </div>
                                      <p class="mt-4 mb-1" style="font-size: .77rem;">One Page</p>
                                      <div class="progress rounded" style="height: 5px;">
                                        <div class="progress-bar" role="progressbar" style="width: 89%" aria-valuenow="89"
                                          aria-valuemin="0" aria-valuemax="100"></div>
                                      </div>
                                      <p class="mt-4 mb-1" style="font-size: .77rem;">Mobile Template</p>
                                      <div class="progress rounded" style="height: 5px;">
                                        <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="55"
                                          aria-valuemin="0" aria-valuemax="100"></div>
                                      </div>
                                      <p class="mt-4 mb-1" style="font-size: .77rem;">Backend API</p>
                                      <div class="progress rounded mb-2" style="height: 5px;">
                                        <div class="progress-bar" role="progressbar" style="width: 66%" aria-valuenow="66"
                                          aria-valuemin="0" aria-valuemax="100"></div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="card mb-4 mb-md-0">
                                    <div class="card-body">
                                      <p class="mb-4"><span class="text-primary font-italic me-1">assigment</span> Project Status
                                      </p>
                                      <p class="mb-1" style="font-size: .77rem;">Web Design</p>
                                      <div class="progress rounded" style="height: 5px;">
                                        <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80"
                                          aria-valuemin="0" aria-valuemax="100"></div>
                                      </div>
                                      <p class="mt-4 mb-1" style="font-size: .77rem;">Website Markup</p>
                                      <div class="progress rounded" style="height: 5px;">
                                        <div class="progress-bar" role="progressbar" style="width: 72%" aria-valuenow="72"
                                          aria-valuemin="0" aria-valuemax="100"></div>
                                      </div>
                                      <p class="mt-4 mb-1" style="font-size: .77rem;">One Page</p>
                                      <div class="progress rounded" style="height: 5px;">
                                        <div class="progress-bar" role="progressbar" style="width: 89%" aria-valuenow="89"
                                          aria-valuemin="0" aria-valuemax="100"></div>
                                      </div>
                                      <p class="mt-4 mb-1" style="font-size: .77rem;">Mobile Template</p>
                                      <div class="progress rounded" style="height: 5px;">
                                        <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="55"
                                          aria-valuemin="0" aria-valuemax="100"></div>
                                      </div>
                                      <p class="mt-4 mb-1" style="font-size: .77rem;">Backend API</p>
                                      <div class="progress rounded mb-2" style="height: 5px;">
                                        <div class="progress-bar" role="progressbar" style="width: 66%" aria-valuenow="66"
                                          aria-valuemin="0" aria-valuemax="100"></div>
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
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('layout.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    
    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('vendor/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('vendor/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('vendor/js/sb-admin-2.min.js')}}"></script>

</body>

</html>