@extends('layout') 
@section('title', "{$title}")
@section('content')

    
        <!--<h1><//?php e($title)?></h1>-->
        <div class="d-flex justify-content-between align-items-end  mb-3">
            <h1 class="pb-1">{{$title}}</h1><!--La manera de imprimir variables con blade-->
            <p><a href="{{ route('users.create')}}" class="btn btn-primary" >Nuevo Usuario</a> </p>    
        </div>
        

        @if ($users->isNotEmpty())<!--Verifica que el objeto de la clase collection no esté vacio!-->
            <table class="table table-striped">
                <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nombre</th>
                      <th scope="col">Email</th>
                      <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)    
                        
                        <tr>
                            <th scope="row">{{$user->id}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                
                                <form action={{  route('users.destroy', $user) }} method="POST">

                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <a href="{{route('users.show', $user )}}" class="btn btn-link"><i class="fas fa-eye"></i></a><!--Usando Rutas Con nombre-->
                                    <a href="{{route('users.edit', $user )}}" class="btn btn-link"><i class="fas fa-pencil-alt"></i></a>
                                    <button type="submit" class="btn btn-link"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>                    
                                      
                    @endforeach                
                </tbody> 
            </table>                
        @else
            <p>No hay usuarios registrados.</p>
        @endif
                    <!--<li><//?php echo e($user) ?></li>-->
                    
                        
                    <!--<a href="{{ url('/usuarios/'.$user->id)}}">Ver detalles</a>tambien se pueden usar comillas dobles para no tener que concatenar!-->
                    <!--<br><a href={{action('UserController@show', ['id' => $user->id])}}>ver detalles de otra manera</a>-->                   
                   
                    <!-- esta es una forma de redireccionar enlaces que nos ofrece laravel, tambien se puede hacer
                     de la siguiente manera otra manera de redireccionar rutas es usando rutas con nombre, es la mejor manera
                     revisar en el archivo de rutas!-->
    

@endsection 

@section('sidebar')
    @parent
       <!-- <h2>Barra lateral personalizada</h2>!-->

@endsection