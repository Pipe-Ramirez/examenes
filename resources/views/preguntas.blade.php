@extends('layouts.app')

@section('content')
<Preguntas :examen="{{$examen}}" :preguntas="{{$preguntas}}"> </Preguntas>
@endsection
