<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Archivo Central - {{auth()->user()->name}}</title>

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
                                    @foreach ($datos_usuario as $d)
                                  <h5 class="my-3">{{$d->name}} {{$d->apellido}}</h5>
                                  <p class="text-muted mb-1">{{$d->nombre_rol}}</p>
                                  <p class="text-muted mb-4">{{$d->nombre_unidad}}</p>
                                  
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
                                      <p class="text-muted mb-0">{{$d->name}} {{$d->apellido}}</p>
                                    </div>
                                  </div>
                                  <hr>
                                  <div class="row">
                                    <div class="col-sm-3">
                                      <p class="mb-0">Correo</p>
                                    </div>
                                    <div class="col-sm-9">
                                      <p class="text-muted mb-0">{{$d->email}}</p>
                                    </div>
                                  </div>
                                  <hr>
                                  <div class="row">
                                    <div class="col-sm-3">
                                      <p class="mb-0">Telefono</p>
                                    </div>
                                    <div class="col-sm-9">
                                      <p class="text-muted mb-0">{{$d->telefono}}</p>
                                    </div>
                                  </div>
                                  <hr>
                                  <div class="row">
                                    <div class="col-sm-3">
                                      <p class="mb-0">Rut</p>
                                    </div>
                                    <div class="col-sm-9">
                                      <p class="text-muted mb-0">{{$d->rut}}</p>
                                    </div>
                                  </div>
                                  <hr>
                                  <div class="row">
                                    <div class="col-sm-3">
                                      <p class="mb-0">Rol</p>
                                    </div>
                                    <div class="col-sm-9">
                                      <p class="text-muted mb-0">{{$d->nombre_rol}}</p>
                                      @endforeach
                                    </div>
                                  </div>
                                  <hr>
                                  <div class="row">
                                    <div class="col-sm-3">
                                      <p class="mb-0">Estado</p>
                                    </div>
                                    <div class="col-sm-9">
                                      <p class="text-success mb-0">Activo</p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              
                            </div>
                          </div>
                          <div class="row">
                            <div class="col">
                              <br>
                              <h3 class="text-primary">Mis Solicitudes de Decreto</h3>
                              {{--Pendientes--}}
                              <br>
                              <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                  <button class="nav-link active text-primary" id="nav-home-tab" data-toggle="tab" data-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Pendientes</button>
                                  <button class="nav-link text-success" id="nav-profile-tab" data-toggle="tab" data-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Aceptadas</button>
                                  <button class="nav-link text-danger" id="nav-contact-tab" data-toggle="tab" data-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Rechazadas</button>
                                </div>
                              </nav>
                              <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                              
                            <div class="list-group">
                            @if(count($solicitud_pendiente) >= 1)
                              @foreach ($solicitud_pendiente as $sp)
                              <li href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                <div class="d-flex w-100 justify-content-between">
                                  <h5 class="mb-1">Decreto N° {{$sp->numero}}</h5>
                                  <small>Fecha: {{$sp->created_at}}</small>
                                </div>
                                <p class="mb-1">Materia: {{$sp->materia}}</p>
                                <small>Numero de Solicitud {{$sp->id}}</small>
                              </li>
                              @endforeach
                              @else
                              <div class="list-group">
                                <li class="list-group-item list-group-item-action flex-column align-items-start">
                                  <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">No existen registros</h5>
                                    
                                  </div>
                                  
                                  
                                </li>
                                
                              </div>
                              @endif
                            </div>
                          </div>
                            {{--Aceptadas--}}
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            
                            @if(count($solicitud_aceptada) >= 1)
                              @foreach ($solicitud_aceptada as $sa)
                              <div class="list-group">
                                <a href="{{Storage::url($sa->nombre_archivo)}}" download="{{$sa->cod_decreto}}" class="list-group-item list-group-item-action flex-column align-items-start">
                                  <div class="d-flex w-100 justify-content-between">
                                    
                                    <h5 class="mb-1">Decreto N° {{$sa->numero}}</h5>
                                    <small>Fecha de Aceptación: {{$sa->updated_at}}</small>
                                  </div>
                                  <p class="mb-1">Materia: {{$sa->materia}}</p>
                                  <small>Numero de Solicitud: {{$sa->id}} </small>
                                </a>
                                
                              </div>
                              @endforeach
                            @else
                            <div class="list-group">
                              <li class="list-group-item list-group-item-action flex-column align-items-start">
                                <div class="d-flex w-100 justify-content-between">
                                  <h5 class="mb-1">No existen registros</h5>
                                  
                                </div>
                                
                                
                              </li>
                              
                            </div>
                            @endif
                          </div>
                            {{--Rechazadas--}}
                            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                            
                              @if(count($solicitud_rechazada) >= 1)
                               @foreach ($solicitud_rechazada as $sr)
                                  <div class="list-group">
                                    <li class="list-group-item list-group-item-action flex-column align-items-start">
                                      <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">Decreto N° {{$sr->numero}}</h5>
                                        <small>Fecha de Rechazo: {{$sr->updated_at}}</small>
                                      </div>
                                      <p class="mb-1">Materia: {{$sr->materia}}</p>
                                      <small>Numero de Solicitud: {{$sr->id}}</small>
                                    </li>
                                    
                                  </div>
                                @endforeach
                                @else
                                  <div class="list-group">
                                    <li class="list-group-item list-group-item-action flex-column align-items-start">
                                      <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">No existen registros</h5>
                                      </div>
                                    </li>
                                    
                                  </div>
                                @endif
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