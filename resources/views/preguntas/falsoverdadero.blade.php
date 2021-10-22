@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header"> Falso - Verdadero
          <div class="float-right">
            <a href="#" class="btn btn-warning" onclick="history.go(-1)">Átras</a>
          </div>
        </div>
        <falso-verdadero> </falso-verdadero>
      </div>
    </div>
  </div>
</div>

@endsection
