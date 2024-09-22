<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Archivo Central - Registro</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('vendor/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('vendor/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                   
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Editar Usuario "{{$usuario->name}} {{$usuario->apellido}}"</h1><br>
                                @if ($errors->any())
                                    @foreach($errors->all() as $e)
                                    <div class="alert alert-danger" role="alert">
                                        <span> {{$e}} </span>
                                      </div>
                                    @endforeach
                                  </div>
                                @endif
                            
                            <form class="user" action="{{ route('usuario.update', $usuario->id) }}" method="POST">
                              @csrf
                              @method('PATCH')
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                      <label for="">Nombre</label>
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="" name="name" value="{{$usuario->name}}" required>
                                    </div>
                                    <div class="col-sm-6">
                                      <label for="">Apellido</label>
                                        <input type="text" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="" name="apellido" value="{{$usuario->apellido}}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Correo Institucional</label>
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="" name="email" value="{{$usuario->email}}" required>
                                </div>
                                
                                <div class="form-group row">
                                  <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="">Telefono o Anexo</label>
                                      <input type="number" class="form-control form-control-user"
                                          id="exampleInputPassword" placeholder="" name="telefono" value="{{$usuario->telefono}}" required>
                                  </div>
                                  <div class="col-sm-6">
                                    <label for="">Rut</label>
                                      <input type="text" class="form-control form-control-user"
                                           placeholder="" name="rut" id="rut" maxlength="12" value="{{$usuario->rut}}"disabled>
                                  </div>
                                  
                                  
                              </div>
                              
                              
                              <div class="form-group row">
                                <div class="col-sm-4">
                                <label for="">Unidad</label>
                                <select name="id_centro" class="form-control" required>
                                  @foreach ($selectCentro as $sc)
                                        <option value="{{$sc->id_unidad}}">{{$sc->nombre_unidad}}</option>    
                                      @endforeach
                                  @foreach ($centros as $cr)
                                  {{--<option {{old("id_centro", "") == $cr->centro ? 'selected' : ''}} value="{{ $cr->centro }}"> {{$cr->nombre_unidad}} </option>--}}
                                    <option value="{{ $cr->id }}"> {{$cr->nombre_unidad}} </option>

                                  @endforeach
                               </select>
                                </div>
                                <div class="col-sm-4">
                                    <label for="">Rol</label>
                                    <select style="text-transform:uppercase;" name="id_rol" class="form-control" required >
                                      @foreach ($selectRol as $sr)
                                        <option value="{{$sr->id}}">{{$sr->nombre_rol}}</option>    
                                      @endforeach
                                      
                                      @foreach ($rol as $r)
                                        <option  value="{{ $r->id }}"> {{$r->nombre_rol}} </option>
                                      @endforeach
                                  </select>
                                    </div>
                                    <div class="col-sm-4">
                                      <label for="">Activo</label>
                                      <select style="text-transform:uppercase;" name="activo" class="form-control" required>
                                        @if($usuario->activo == 1)
                                        <option value="1">SI</option>
                                        @else
                                        <option value="2">NO</option>
                                        @endif
                                        <option value="1">SI</option>
                                        <option value="2">NO</option>
                                        
                                    </select>
                                      </div>
                              </div><br><hr>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Editar Usuario
                                </button><br>
                                <button type="button" class="btn btn-primary btn-user btn-block bg-danger border border-danger" value="" onClick="history.go(-1);">Cancelar</button>
                            </form>
                            
                            <br>
                            
                            <div class="text-center">
                                {{--<a class="small" href="">¿Ya tienes una cuenta?</a>--}}
                            </div>
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
    <!-- Mis JS -->
    <script src="{{asset('vendor/misjs/formatorut.js')}}"></script>

</body>

</html>