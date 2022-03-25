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
                            <li class="breadcrumb-item"><a href="{{ url('negocios') }}">Negocios</a></li>
                            <li class="breadcrumb-item active">Productos</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-5 align-self-center">
                <div class="customize-input float-right">
                    <a href="{{ url('negocios/'.$id.'/productos') }}" class="btn waves-effect waves-light btn-dark">Regresar</a>
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
                        <h4 class="card-title">Nuevo Producto</h4>
                        <form class=" mt-3"  method="POST"  action="{{ url('negocios/'.$id.'/productos/guardar-producto') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="form-control-label" for="inputDanger1">Nombre de Producto</label>
                                <input type="text" class="form-control @error('producto') is-invalid @enderror" name="producto"
                                    placeholder="ejemplo: pizzas" value="{{ old('producto') }}" id="inputDanger1">
                                @if ($errors->has('producto'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('producto') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="inputDanger1">Imagen de Producto</label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" name="url_imagen" class="form-control custom-file-input @error('url_imagen') is-invalid @enderror" id="inputGroupFile01">
                                        <label class="custom-file-label" for="inputGroupFile01">Seleccione un archivo</label>
                                    </div>
                                </div>
                                @if ($errors->has('url_imagen'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('url_imagen') }}
                                    </div>
                                @endif
                            </div>
                            <div class="customize-input float-right">
                                <button class="btn waves-effect waves-light btn-info">Guardar</button>
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
