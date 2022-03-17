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
                            <li class="breadcrumb-item active">Ciudades</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-5 align-self-center">
                <div class="customize-input float-right">
                    <a href="{{ url('ciudades') }}" class="btn waves-effect waves-light btn-dark">Regresar</a>
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
                        <h4 class="card-title">Nueva Ciudad</h4>
                        <form class=" mt-3"  method="POST"  action="{{ url('ciudades/guardar-ciudad') }}"  enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="form-control-label" for="inputDanger1">Nombre de Ciudad</label>
                                <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name"
                                    placeholder="ejemplo: Guayaquil" value="{{ old('name') }}" id="inputDanger1">
                                @if ($errors->has('name'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('name') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="inputDanger1">Imagenes de la Ciudad</label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" name="imagenes[]" class="form-control custom-file-input @error('url_imagen') is-invalid @enderror" id="inputGroupFile01">
                                        <label class="custom-file-label" for="inputGroupFile01">Seleccione imagen 1</label>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" name="imagenes[]" class="form-control custom-file-input @error('url_imagen') is-invalid @enderror" id="inputGroupFile01">
                                        <label class="custom-file-label" for="inputGroupFile01">Seleccione imagen 2</label>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" name="imagenes[]" class="form-control custom-file-input @error('url_imagen') is-invalid @enderror" id="inputGroupFile01">
                                        <label class="custom-file-label" for="inputGroupFile01">Seleccione imagen 3</label>
                                    </div>
                                </div>
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
