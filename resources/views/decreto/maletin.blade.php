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
                  
                  <div class="card">
                    <div class="card-body">
                      Maletin de Decretos - {{auth()->user()->name}} {{auth()->user()->apellido}}
                    </div>
                  </div>
                  @if(session('deleteSuccess'))
                  <br>  <div class="alert alert-danger text-center">
                      {{ session('deleteSuccess') }}
                    </div> 
                @endif
                  @if(session('maletin'))
                   @foreach (session('maletin') as $id => $detalles)
                    <div class="list-group">
                    
                      <a href="{{route('decreto.show', $detalles['id'])}}" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                          <h5 class="mb-1">Decreto N° {{$detalles['numero']}}</h5>
                          @if($detalles['id_restringido'] == 1 )
                          <small class="text-danger">Restringido</small>
                          @else 
                          <small>Publico</small>
                          @endif
                        </div>
                        <small>Fecha: {{$detalles['fecha']}}</small>
                        <p class="mb-1">Materia: {{$detalles['materia']}}</p>
                        <small>Interesado: {{$detalles['interesado']}}</small>
                      </a>
                     
                  </div>
                       
                  @endforeach
                  
                  <div class="card-body">
                    Cantidad de Decretos: {{ $cuenta = count((array) session('maletin'))}}
                  </div>
                  
                  <div class="d-flex flex-row-reverse ">
                    
                    
                    {{--<a href="{{route ('descargarMaletin')}}" class="btn btn-primary" type="button"><i class="fa-solid fa-download"></i> Descargar</a>&nbsp;--}}
                    
                    {{--<button class="btn btn-primary" type="button"><i class="fa-solid fa-file-circle-check"></i> Solicitar</button>&nbsp;--}}
                    
                    <a href="{{ route('borrarMaletin') }}" class="btn btn-danger" type="button"><i class="fa-solid fa-trash"></i> Borrar Maletin</a>
                    </div> 

                  @else 
                  <br><div class="alert alert-primary text-center" role="alert">
                    No hay decretos en su maletin
                  </div>
                  @endif
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