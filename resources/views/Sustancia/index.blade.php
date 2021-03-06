@extends('layouts.layout')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Lista Sustancias</h3></div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{ route('sustancia.create') }}" class="btn btn-info" >Añadir Sustancia</a>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Nombre</th>
               <th>Vida Media</th>
               <th>Editar</th>
               <th>Eliminar</th>
             </thead>
             <tbody>
              @if($sustancias->count())
              @foreach($sustancias as $sustancia)  
              <tr>
                <td>{{$sustancia->nombre}}</td>
                <td>{{$sustancia->vidaMedia}}</td>
                <td><a class="btn btn-primary btn-xs" href="{{action('SustanciaController@edit', $sustancia->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                  <form action="{{action('SustanciaController@destroy', $sustancia->id)}}" method="post">
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">

                   <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                 </td>
               </tr>
               @endforeach 
               @else
               <tr>
                <td colspan="8">¡¡No hay registros!!</td>
              </tr>
              @endif
            </tbody>

          </table>
        </div>
      </div>
      {{ $sustancias->links() }}
    </div>
  </div>
</section>

@endsection