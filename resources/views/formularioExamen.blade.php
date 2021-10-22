@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header"> Formulario de Examen
          <div class="float-right">
            <a href="#" class="btn btn-warning" onclick="history.go(-1)">Átras</a>
          </div>
        </div>
        <crear-examen> </crear-examen>
      </div>
    </div>
  </div>
</div>

@endsection
