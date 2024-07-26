@extends('layouts.app')

@section('content')
<div>
    <div class="row">
        <div class="col-lg-12 text-center">
            <h2 class="pt-3" style="color:#000000; font-family: 'Gobold Bold italic'">
                BIENVENIDO</h2>
        </div>
    </div>
    <div class="pt-1" style="display: flex; flex-wrap: wrap; justify-content:center">
        @foreach($menu as $opciones)
        <div class="col-lg-4">
            <a href="{{route($opciones->ruta)}}"
                class="btn btn-primary font-weight-bold text-uppercase"
                style="border: 2px solid #000000; border-radius: 10px; width: 100%;
                padding: .7em 0; ">
                {{$opciones->opcion}}</a>
        </div>
        @endforeach
    </div>
</div>
@endsection
