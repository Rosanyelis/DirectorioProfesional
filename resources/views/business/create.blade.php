@extends('layouts.app')
@section('styles')
<link rel="stylesheet" href="{{ asset('assets/libs/select2/css/select2.min.css')}}">
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
                        <h4 class="card-title">Nueva Negocio</h4>
                        <form class=" mt-3"  method="POST"  action="{{ url('negocios/guardar-negocio') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-4">
                                <label for="exampleFormControlSelect1">Categoria</label>
                                <select class="form-control @error('categorias_id') is-invalid @enderror" name="categorias_id" id="selectCategorias">
                                    <option>Seleccione una Categoria</option>
                                    @foreach ($categorias as $item)
                                        <option value="{{ $item->id }}" @if ($item->id == old('categorias_id')) selected @else @endif>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('categorias_id'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('categorias_id') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group mb-4">
                                <label for="exampleFormControlSelect1">Subcategoria</label>
                                <select class="form-control @error('subcategory_id') is-invalid @enderror" name="subcategory_id" id="selectSubcategory">
                                    <option>Seleccione un Subcategoria</option>
                                </select>
                                @if ($errors->has('subcategory_id'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('subcategory_id') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="inputDanger1">Logo de Negocio</label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" name="url_logo" class="form-control custom-file-input @error('url_logo') is-invalid @enderror" id="inputGroupFile01">
                                        <label class="custom-file-label" for="inputGroupFile01">Seleccione un archivo</label>
                                    </div>
                                </div>
                                @if ($errors->has('url_logo'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('url_logo') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="inputDanger1">Nombre de Negocio</label>
                                <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name"
                                    placeholder="ejemplo: pizzas" value="{{ old('name') }}" id="inputDanger1">
                                @if ($errors->has('name'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('name') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="inputDanger1">Información del Negocio</label>
                                <textarea type="text" class="form-control  @error('description') is-invalid @enderror" name="description"
                                    placeholder="ejemplo: pizzas" id="inputDanger1">{{ old('description') }}</textarea>
                                @if ($errors->has('description'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('description') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group mb-4">
                                <label for="exampleFormControlSelect1">Ciudad</label>
                                <select class="form-control @error('ciudades_id') is-invalid @enderror" name="ciudades_id" id="selectCiudades">
                                    <option>Seleccione una Ciudad</option>
                                    @foreach ($ciudades as $item)
                                        <option value="{{ $item->id }}" @if ($item->id == old('ciudades_id')) selected @else @endif>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('ciudades_id'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('ciudades_id') }}
                                </div>
                                @endif
                            </div>
                            <div class="form-group mb-4">
                                <label for="exampleFormControlSelect1">Sectores</label>
                                <select class="form-control @error('sectores_id') is-invalid @enderror" name="sectores_id" id="selectSectores">
                                    <option>Seleccione un Sector</option>
                                </select>
                                @if ($errors->has('sectores_id'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('sectores_id') }}
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="inputDanger1">Dirección del Negocio</label>
                                <textarea type="text" class="form-control  @error('direccion') is-invalid @enderror" name="direccion"
                                    placeholder="ejemplo: pizzas" id="inputDanger1">{{ old('direccion') }}</textarea>
                                @if ($errors->has('direccion'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('direccion') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="inputDanger1">Teléfono del Negocio</label>
                                <input type="text" class="form-control  @error('phone') is-invalid @enderror" name="phone"
                                    placeholder="ejemplo: pizzas" value="{{ old('phone') }}" id="inputDanger1">
                                @if ($errors->has('phone'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('phone') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="inputDanger1">Correo del Negocio</label>
                                <input type="text" class="form-control  @error('email') is-invalid @enderror" name="email"
                                    placeholder="ejemplo: pizzas" value="{{ old('email') }}" id="inputDanger1">
                                @if ($errors->has('email'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="inputDanger1">Catálogo de Negocio</label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" name="url_catalogo" class="form-control custom-file-input @error('url_catalogo') is-invalid @enderror" id="inputGroupFile01">
                                        <label class="custom-file-label" for="inputGroupFile01">Seleccione un archivo</label>
                                    </div>
                                </div>
                                @if ($errors->has('url_catalogo'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('url_catalogo') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group mb-4">
                                <label for="exampleFormControlSelect1">¿Tiene Delivery?</label>
                                <select class="form-control @error('delivery') is-invalid @enderror" name="delivery">
                                    <option>Seleccione</option>
                                    <option value="1" @if (1 == old('delivery')) selected @else @endif>Si</option>
                                    <option value="0" @if (0 == old('delivery')) selected @else @endif>No</option>
                                </select>
                                @if ($errors->has('delivery'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('delivery') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="inputDanger1">Sitio Web</label>
                                <input type="text" class="form-control  @error('sitio_web') is-invalid @enderror" name="sitio_web"
                                    placeholder="ejemplo: pizzas" value="{{ old('sitio_web') }}" id="inputDanger1">
                                @if ($errors->has('sitio_web'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('sitio_web') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Tags</label>
                                <select class="js-example-basic-multiple js-states form-control" style="width: 100%" name="tags[]" multiple="multiple">
                                    @foreach ($tags as $item)
                                        <option value="{{ $item->id }}">{{ $item->description }}</option>
                                    @endforeach
                                </select>
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
<script src="{{ asset('assets/libs/select2/js/select2.full.min.js')}}"></script>
<script>
    $(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.js-example-basic-multiple').select2({
            width: 'resolve', // need to override the changed default
        });
        $('#selectCiudades').on('change', function() {
            let ciudadId = this.value;
            let baseUrl = '{{ url('sectores') }}/' + ciudadId + '/sectores-por-ciudad';
            $.ajax({
                type: "GET",
                url: baseUrl,
                success: function(response)
                {
                   console.log(response.sectores);
                    var data = JSON.parse(response.sectores);
                   $.each(data, function(index,dato){
                    $("#selectSectores").append('<option value="'+dato.id+'">'+dato.name+'</option>');
                   });
                }
            });
        });

        $('#selectCategorias').on('change', function() {
            let categoriaId = this.value;
            let baseUrl = '{{ url('subcategorias') }}/' + categoriaId + '/subcategorias-por-categoria';
            $.ajax({
                type: "GET",
                url: baseUrl,
                success: function(response)
                {
                //    console.log(response.subcategorias);
                    var data = JSON.parse(response.subcategorias);
                    $('#selectSubcategory').children('option:not(:first)').remove();
                    $.each(data, function(index,dato){
                        $("#selectSubcategory").append('<option value="'+dato.id+'">'+dato.name+'</option>');
                    });
                }
            });
        });
    });
</script>
@endsection

