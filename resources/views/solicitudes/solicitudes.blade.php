@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class=" row shadow- border-radius-lg pt-4 pb-3" style="background-color: #e23633">
                        <div class="col-md-6 col-xs-12">
                            <h6 class="text-white text-capitalize ps-3">Solicitudes</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Nombre</th>
                                    <th
                                        class=" text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Email</th>
                                        <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Estatus</th>
                                        <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Aceptar</th>
                                        <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Recharzar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($solicitudes as $solicitud )
                                    <tr>
                                        <td class="text-center font-weight-bold">{{ $solicitud->name }}</td>
                                        <td class="text-center font-weight-bold">{{ $solicitud->email }}</td>
                                        @if ($solicitud->estatus ==0)
                                            <td class="text-center font-weight-bold">En proceso</td>
                                        @else
                                            <td class="text-center font-weight-bold">Procesada</td>
                                        @endif
                                        <td class="text-center font-weight-bold">
                                            <a href="{{route('aceptar',['id'=>$solicitud->id])}}" class="btn btn-primary ">Aceptar</a>
                                        </td>
                                        <td class="text-center font-weight-bold">
                                            <a href="{{route('rechazar',['id'=>$solicitud->id])}}" class="btn btn-primary">Recharzar</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
            <div class="text-left">
                <a href="{{route('home')}}"
                class="btn btn-outline-light pr-4 pl-4 font-weight-bold"
                style="border: 2px solid #ffffff; border-radius: 10px; background-color: #e23633" >Volver</a>
            </div>
    </div>
@endsection