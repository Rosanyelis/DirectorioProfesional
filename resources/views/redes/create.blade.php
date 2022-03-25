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
                            <li class="breadcrumb-item active">Redes Sociales</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-5 align-self-center">
                <div class="customize-input float-right">
                    <a href="{{ url('negocios/'.$id.'/redes') }}" class="btn waves-effect waves-light btn-dark">Regresar</a>
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
                        <h4 class="card-title">Nueva Red Social</h4>
                        <form class="mt-3"  method="POST"  action="{{ url('negocios/'.$id.'/redes/guardar-red') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-4">
                                <label for="exampleFormControlSelect1">Tipo de Red Social</label>
                                <select class="form-control @error('red_social') is-invalid @enderror" name="red_social">
                                    <option>Seleccione</option>
                                    <option value="facebook" @if (old('red_social') == 'facebook') selected @else @endif>Facebook</option>
                                    <option value="youtube" @if (old('red_social') == 'youtube') selected @else @endif>Youtube</option>
                                    <option value="instagram" @if (old('red_social') == 'instagram') selected @else @endif>Instagram</option>
                                    <option value="tik-tok" @if (old('red_social') == 'tik-tok') selected @else @endif>Tik Tok</option>
                                </select>
                                @if ($errors->has('red_social'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('red_social') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="inputDanger1">Url de Red Social</label>
                                <input type="text" class="form-control @error('redsocial_url') is-invalid @enderror" name="redsocial_url"
                                    placeholder="ejemplo: pizzas" value="{{ old('redsocial_url') }}" id="inputDanger1">
                                @if ($errors->has('redsocial_url'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('redsocial_url') }}
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
