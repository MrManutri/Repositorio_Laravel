<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    

    <title>Archivo Central - Decretos</title>

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
                <div class="container-fluid">
                    @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                  </div>
                    @endif
                    @if(session('addSuccess'))
                    <div class="alert alert-success">
                      {{ session('addSuccess') }}
                    </div> 
                @endif

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Decretos</h1>
                    <p class="mb-4">Todos los Decretos de la Universidad de los Lagos desde 2017 hasta {{ strftime("%Y"); }}</p>
                    

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <!-- <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"></h6>
                        </div> -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>N°</th>
                                            <th>Fecha de Decreto</th>
                                            <th>Materia</th>
                                            <th>Firmador</th>
                                            <th>Interesado</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>N°</th>
                                            <th>Fecha de Decreto</th>
                                            <th>Materia</th>
                                            <th>Firmador</th>
                                            <th>Interesado</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach ($decretos as $d)
                                        
                                    
                                        <tr>
                                            <td>{{ $d->numero }}</td>
                                            <td>{{ $d->fecha }}</td>
                                            <td>{{ $d->materia }}</td>
                                            <td>{{ $d->firmador }}</td>
                                            <td>{{ $d->interesado }}</td>
                                            
                                            <td style="display: flex"><a href="{{ route('decreto.show', $d->id) }}"><i class="fa-solid fa-eye"></i></a>&nbsp;&nbsp;
                                                @if(auth()->user()->id_rol == 2 || auth()->user()->id_rol == 1)
                                                <a href="{{ route('decreto.edit', $d) }}"><i class="fa-solid fa-pen"></i></a>&nbsp;&nbsp;
                                                @endif
                                                @if($d->id_restringido == 2)
                                                <a href="{{ route('decretoAdd', $d->id) }}"><i class="fa-solid fa-folder-plus"></i></a>&nbsp;&nbsp;
                                                @endif
                                                {{-- @if(auth()->user()->id_rol == 1)
                                                <form action="{{ route('decreto.destroy', $d) }}" method="post">
                                                    @method("DELETE")
                                                    @csrf
                                                    <button type="submit" style="border:none; background:none;"><i class="fa-solid fa-eraser text-danger"></i></button>
                                                @endif 
                                                </form>--}}

                                                
                                            </td>
                                        
                                        </tr>

                                        
                                        
                                    @endforeach    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

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

    <!-- Page level plugins -->
    <script src="{{asset('vendor/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('vendor/js/demo/datatables-demo.js')}}"></script>

</body>

</html>