@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header"> Opción multiple
          <div class="float-right">
            <a href="#" class="btn btn-warning" onclick="history.go(-1)">Átras</a>
          </div>
        </div>
        <multiple> </multiple>
      </div>
    </div>
  </div>
</div>

@endsection
