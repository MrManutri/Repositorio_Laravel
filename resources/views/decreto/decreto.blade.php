<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Archivo Central - Decreto {{$decreto->numero}}</title>

    <!-- Custom fonts for this template -->
    <link href="{{asset('vendor/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('vendor/css/sb-admin-2.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="{{asset('vendor/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
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
                
                <center>
                    @if(session('solicitudSuccess'))
                    <div class="alert alert-success">
                      {{ session('solicitudSuccess') }}
                    </div> 
                @endif
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-4" style="padding-left: 60px;" >
                            <h1> Decreto N° {{$decreto->numero}} </h1><br><br>
                        </div>
                        <div class="col-4"></div>
                        @if($decreto->id_restringido == 2)
                        <div class="col-4">
                            <a href="{{Storage::url($decreto->nombre_archivo)}}" download="{{$decreto->cod_decreto}}"><button type="button" class="btn btn-primary">Descargar Decreto</button></a>
                            @if($decreto->anexo)
                            <a href="{{Storage::url($decreto->anexo)}}" download="AnexoDecreto{{$decreto->decreto}}"><button type="button" class="btn btn-warning">Descargar Anexos</button></a>
                            @endif
                        </div>
                        @endif
                    </div>
                            @if($decreto->id_restringido == 2)
                            <embed src="{{Storage::url($decreto->nombre_archivo)}}" type="application/pdf" style="width: 80%; height:500px;"><br><br><br><br>
                            @else
                            <div class="alert alert-warning" role="alert">
                              No tiene permisos para visualizar el documento, si desea visualizar solicitelo aqui&nbsp;&nbsp;  <a href="{{ route('solicitudDecreto', $decreto->id) }}"><button class="btn btn-primary" type="button"><i class="fa-solid fa-file-circle-check"></i> Solicitar</button></a>
                            </div>
                            @endif
                              <!-- Nav tabs -->
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Materia</a>
                    </li>
                    
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                    <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab"><br>{{$decreto->materia}}</div>
  
  
  
</div>
                   
                </div>
            </center>
            </div><br><br><br><br><br><br><br>
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

    <!-- Page level plugins -->
    <script src="{{asset('vendor/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('vendor/js/demo/datatables-demo.js')}}"></script>

</body>

</html>