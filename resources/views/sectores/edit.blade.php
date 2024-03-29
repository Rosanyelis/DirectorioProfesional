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
                            <li class="breadcrumb-item active">Sectores</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-5 align-self-center">
                <div class="customize-input float-right">
                    <a href="{{ url('sectores') }}" class="btn waves-effect waves-light btn-dark">Regresar</a>
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
                        <h4 class="card-title">Editar Sector</h4>
                        <form class="mt-3" method="POST"  action="{{ url('sectores/'.$data->id.'/actualizar-sector') }}" >
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <div class="form-group mb-4">
                                    <label for="exampleFormControlSelect1">Ciudades</label>
                                    <select class="form-control @error('ciudades_id') is-invalid @enderror" name="ciudades_id" id="exampleFormControlSelect1">
                                        <option>Seleccione una ciudad</option>
                                        @foreach ($datos as $item)
                                            <option value="{{ $item->id }}" @if ($item->id == $data->ciudades_id) selected @endif>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('ciudades_id'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('ciudades_id') }}
                                    </div>
                                @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="inputDanger1">Nombre de Sector</label>
                                <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name"
                                    placeholder="ejemplo: Sector Los Olivos" value="{{ $data->name }}" id="inputDanger1">
                                @if ($errors->has('name'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('name') }}
                                    </div>
                                @endif
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
