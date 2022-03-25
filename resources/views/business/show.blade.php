@extends('layouts.app')
@section('styles')
@endsection
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                {{-- <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Good Morning Jason!</h3> --}}
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Negocios</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-5 align-self-center">
                <div class="customize-input float-right">
                    <a href="{{ url('negocios') }}" class="btn waves-effect waves-light btn-dark">Regresar</a>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- *************************************************************** -->
        <!-- Start First Cards -->
        <!-- *************************************************************** -->
        <!-- basic table -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Ver Negocio</h4>
                        <form class="mt-3">
                            @csrf
                            <div class="form-group">
                                <label class="form-control-label" for="inputDanger1">Categoria</label>
                                <input type="text" class="form-control" name="name" readonly value="{{ $data->subcategories->categorys->name }}" id="inputDanger1">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="inputDanger1">Subcategoria</label>
                                <input type="text" class="form-control" name="name" readonly value="{{ $data->subcategories->name }}" id="inputDanger1">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="inputDanger1">Nombre de Negocio</label>
                                <input type="text" class="form-control" name="name" readonly value="{{ $data->name }}" id="inputDanger1">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="inputDanger1">Descripción de Negocio</label>
                                <textarea readonly class="form-control" id="inputDanger1">{{ $data->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="inputDanger1">Ciudad</label>
                                <input type="text" class="form-control" name="name" readonly value="{{ $data->sectores->ciudades->name }}" id="inputDanger1">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="inputDanger1">Sector</label>
                                <input type="text" class="form-control" name="name" readonly value="{{ $data->sectores->name }}" id="inputDanger1">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="inputDanger1">Logo de Negocio</label><br>
                                <img src="{{ $data->url_logo }}" class="w-50" alt="{{ $data->name }}">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="inputDanger1">Dirección de Negocio</label>
                                <textarea readonly class="form-control" id="inputDanger1">{{ $data->direccion }}</textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="inputDanger1">Teléfono de Negocio</label>
                                <input type="text" class="form-control" name="name" readonly value="{{ $data->phone }}" id="inputDanger1">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="inputDanger1">Correo de Negocio</label>
                                <input type="text" class="form-control" name="name" readonly value="{{ $data->email }}" id="inputDanger1">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="inputDanger1">Delivery</label>
                                @if ($data->delivery == 1)
                                <input type="text" class="form-control" name="name" readonly value="Si" id="inputDanger1">
                                @else
                                <input type="text" class="form-control" name="name" readonly value="No" id="inputDanger1">
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="inputDanger1">Sitio Web</label>
                                <input type="text" class="form-control" name="name" readonly value="{{ $data->sitio_web }}" id="inputDanger1">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="inputDanger1">Tags</label>
                                <ul>
                                    @foreach ($tags as $item)
                                    <li>{{$item->description}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
@endsection
@section('scripts')
@endsection
