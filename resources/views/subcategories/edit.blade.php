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
                            <li class="breadcrumb-item active">Subcategorias</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-5 align-self-center">
                <div class="customize-input float-right">
                    <a href="{{ url('subcategorias') }}" class="btn waves-effect waves-light btn-dark">Regresar</a>
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
                        <h4 class="card-title">Editar Subcategoria</h4>
                        <form class="mt-3" method="POST"  action="{{ url('subcategorias/'.$data->id.'/actualizar-subcategoria') }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <div class="form-group mb-4">
                                    <label for="exampleFormControlSelect1">Categorias</label>
                                    <select class="form-control @error('categorys_id') is-invalid @enderror" name="categorys_id" id="exampleFormControlSelect1">
                                        <option>Seleccione una categoria</option>
                                        @foreach ($datos as $item)
                                            <option value="{{ $item->id }}" @if ($item->id == $data->categorys_id) selected @endif>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('categorys_id'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('categorys_id') }}
                                    </div>
                                @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="inputDanger1">Nombre de Subcategoria</label>
                                <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name"
                                    placeholder="ejemplo: Alimentos Caseros" value="{{ $data->name }}" id="inputDanger1">
                                @if ($errors->has('name'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('name') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="inputDanger1">Imagen de Subcategoria</label>
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
                                <img src="{{ $data->url_imagen }}" alt="{{ $data->name }}">
                            </div>
                            <div class="customize-input float-right">
                                <button class="btn waves-effect waves-light btn-info">Actualizar</button>
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
