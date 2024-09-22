<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    

    <title>Archivo Central - Solicitud</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('vendor/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('vendor/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/27f2e108a5.js" crossorigin="anonymous"></script>

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <form class="user" action="{{route('solicitud.update', $solicitud->id)}}" method="post">
                    @csrf
                    @method('PATCH')
                <div class="row">
                    
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Solicitud N° {{$solicitud->id}}</h1>
                            </div>
                            <br>
                                <div class="form-group row">
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                    <h4>Id del Decreto </h4><h4> {{$solicitud->id_decreto}}</h4>
                                    </div>
                                    <div class="col-sm-4">
                                       <h4>Id del Usuario </h4><h4> {{$solicitud->id_usuario}}</h4>
                                    </div>
                                    <div class="col-sm-4">
                                        <h4>Fecha de Solicitud</h4> <h4> {{$solicitud->created_at}}</h4>
                                     </div>
                                </div>
                                <br><br>
                               
                                <div class="form-group row justify-content-center ">
                                    <div class="form-check form-check-inline align-items-center">
                                        <input class="form-check-input" type="radio" name="estado" id="inlineRadio1" value="1">
                                        <label class="form-check-label text-success mr-5" for="inlineRadio1">Aceptar</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="estado" id="inlineRadio2" value="2">
                                        <label class="form-check-label text-danger" for="inlineRadio2">Rechazar</label>
                                      </div>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Mensaje</label>
                                    <textarea class="form-control" name="mensaje" id="exampleFormControlTextarea1" rows="3"></textarea>
                                  </div>
                            
                                <br><br>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    <i class="fa-solid fa-check"></i> Aceptar
                                </button><br>
                                <button type="button" class="btn btn-primary btn-user btn-block bg-danger border border-danger" value="" onClick="history.go(-1);">Cancelar</button>
                                
                            </form>
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('vendor/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('vendor/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('vendor/js/sb-admin-2.min.js')}}"></script>
    <!-- Mis Scripts  -->
    <script src="{{asset('vendor/misjs/previsualizar.js')}}"></script>
    <script src="{{asset('vendor/misjs/masinput.js')}}"></script>

</body>

</html>