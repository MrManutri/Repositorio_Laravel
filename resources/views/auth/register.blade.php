{{--<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="ml-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>--}}
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
                                <h1 class="h4 text-gray-900 mb-4">Crear una cuenta</h1><br>
                                @if ($errors->any())
                                    @foreach($errors->all() as $e)
                                    <div class="alert alert-danger" role="alert">
                                        <span> {{$e}} </span>
                                      </div>
                                    @endforeach
                                  </div>
                                @endif
                            
                            <form class="user" action="{{ route('register') }}" method="POST">
                              @csrf
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                      <label for="">Nombre</label>
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="" name="name" value="{{old('name')}}" required>
                                    </div>
                                    <div class="col-sm-6">
                                      <label for="">Apellido</label>
                                        <input type="text" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="" name="apellido" value="{{old('apellido')}}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Correo Institucional</label>
                                    <input type="email" class="form-control form-control-user" id="correo"
                                        placeholder="" name="email" value="{{old('email')}}" required>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                      <label for="">Contraseña</label>
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="" name="password" required>
                                    </div>
                                    <div class="col-sm-6">
                                      <label for="">Confirmar Contraseña</label>
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="" name="password_confirmation" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                  <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="">Telefono o Anexo</label>
                                      <input type="number" class="form-control form-control-user"
                                          id="exampleInputPassword" placeholder="" name="telefono" value="{{old('telefono')}}" required>
                                  </div>
                                  <div class="col-sm-6">
                                    <label for="">Rut</label>
                                      <input type="text" class="form-control form-control-user"
                                           placeholder="" name="rut" id="rut" maxlength="12" value="{{old('rut')}}" required>
                                  </div>
                                  
                              </div>
                              
                              <div class="form-group row">
                                <div class="col-sm-12">
                                <label for="">Unidad</label>
                                <select name="id_centro" class="form-control" required>
                                  <option value=""></option>
                                  @foreach ($centros as $cr)
                                    <option value="{{ $cr->id }}"> {{$cr->nombre_unidad}} </option>
                                  @endforeach 
                              </select>
                                </div>
                                <input type="hidden" value="3" name="id_rol">
                                <input type="hidden" value="1" name="activo">
                                        
                                        
                                    
                              </div><br><hr>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Crear Usuario
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
    

    
    <script>
        let email = document.getElementById('correo');
        let dominios = new Array('ulagos.cl', 'ULAGOS.CL'); //creo un arreglo con los dominios aceptados
        email.addEventListener('blur', function(){
        if(email.value == '' || email.value == 'undefined'){
            console.log('El campo es obligatorio');
            
            return false;

        }
        let value = email.value.split('@'); //split() funciona para dividir una cadena en un array pasando un caracter como delimitador
            console.log(value[1]);
            if(dominios.indexOf(value[1]) == -1){ //.indexOf() sirve para encontrar un elemento en un array
                alert('solo correo @ulagos.cl'); 
                
            dominios.forEach(function(dominio){ //utilizamos forEach para recorrer el arreglo.
                
                console.log(`Los dominios aceptados son: ${dominio}`);
            
            })
            return false;
            }else{
            
                console.log('dominio aceptado');
            
            }

        });
    </script>

</body>

</html>
