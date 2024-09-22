<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    

    <title>Archivo Central - Subir Decreto</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('vendor/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('vendor/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('vendor/jquery-ui/jquery-ui.min.css')}}">
    <script src="https://kit.fontawesome.com/27f2e108a5.js" crossorigin="anonymous"></script>

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <form class="user" action="{{ route('decreto.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block py-5 pl-5">
                        <div class="custom-file">
                            <input type="file" name="nombre_archivo" id="pdffile" accept="application/pdf" class="custom-file-input" id="validatedCustomFile">
                            <label class="custom-file-label" for="validatedCustomFile">Elegir Decreto...</label>
                            <div class="invalid-feedback">Example invalid custom file feedback</div>
                          </div><hr>
                          <embed id="vistaPrevia" type="application/pdf" width="100%" height="650px">
                        
                        
                        
                    </div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Subir Decreto</h1>
                                @if ($errors->any())
                                    @foreach($errors->all() as $e)
                                    <div class="alert alert-danger" role="alert">
                                        <span> {{$e}} </span>
                                      </div>
                                    @endforeach
                                  </div>
                                @endif
                    
                            </div>
                            
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="">N° de Decreto</label>
                                        <input type="number" name="numero" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="" required value="{{old('numero')}}">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="">Fecha</label>
                                        <input type="date" name="fecha" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="" required value="{{old('fecha')}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Materia</label>
                                    <input type="text" name="materia" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="" required value="{{old('materia')}}">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <label for="">Documento</label>
                                        <select name="id_tipo_documento" class="form-control" required>
                                            <option value=""></option>
                                            @foreach ($tipo_documentos as $nombre => $id)
                                                <option value=" {{ $id }} "> {{$nombre}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="">CR</label>
                                        
                                        <select name="id_cr" class="form-control" required>
                                            <option value=""></option>
                                            @foreach ($centros as $c)
                                                <option value=" {{ $c->id }} "> {{$c->nombre_unidad}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="">Restringido</label>
                                        <select name="id_restringido" class="form-control" required>
                                            <option value=""></option>
                                            @foreach ($restringidos as $nombre => $id)
                                                <option value="{{ $id }}"> {{$nombre}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group" id="dinamic">
                                    <label for="">Firmador</label> <button type="button" id="agregar" style="border: none; background: none;"><i class="fa-solid fa-plus" style="color: #4e73df;"></i></button>
                                    <input type="text" name="firmador[]" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="" required>
                                </div>
                                <div class="form-group" id="dinamic2">
                                    <label for="">Interesado</label> <button type="button" id="agregar2" style="border: none; background: none;"><i class="fa-solid fa-plus" style="color: #4e73df;"></i></button>
                                    <input type="text" name="interesado[]" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="" required>
                                </div>
                                <div class="form-group" id="dinamic3">
                                    <label for="">Creador</label> <button type="button" id="agregar3" style="border: none; background: none;"><i class="fa-solid fa-plus" style="color: #4e73df;"></i></button>
                                    <input type="text" name="creador[]" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="" required>
                                </div><hr>
                                {{--<div class="custom-file">--}}
                                    <label for="">Anexos</label>
                                    <section id="multi-selector-uniq">
                                        <input id="files" name="anexo" type="file" accept=".rar, .zip, .7zip">
                                        <ul id="preview" class="list-group list-group-flush">
                                            
                                        </ul>
                                    </section>
                                    {{--<label class="custom-file-label" for="validatedCustomFile">Anexos</label>
                                  </div>--}}
                                  {{--<ul class="list-group list-group-flush">
                                    <li class="list-group-item" id="lista"></li>
                                    
                                  </ul>--}}

                                {{--<div class="form-group" id="dinamic4">
                                    <label for="">Vistos</label> <button type="button" id="agregar4" style="border: none; background: none;"><i class="fa-solid fa-plus" style="color: #4e73df;"></i></button>
                                    <input type="text" name="vistos[]" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="" required>
                                </div>
                                <div class="form-group" id="dinamic5">
                                    <label for="">Considerando</label> <button type="button" id="agregar5" style="border: none; background: none;"><i class="fa-solid fa-plus" style="color: #4e73df;"></i></button>
                                    <input type="text" name="conciderando[]" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="" required>
                                </div>--}}
                                <hr>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Subir Decreto
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
    <script src="{{asset('vendor/jquery-ui/jquery-ui.min.js')}}"></script>
    <script src="{{asset('vendor/misjs/variospdf.js')}}"></script>

    

</body>

</html>