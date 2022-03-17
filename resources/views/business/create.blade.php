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
                                <select class="form-control @error('categorias') is-invalid @enderror" name="categorias_id" id="selectCategorias">
                                    <option>Seleccione una Categoria</option>
                                    @foreach ($categorias as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-4">
                                <label for="exampleFormControlSelect1">Subcategoria</label>
                                <select class="form-control" name="subcategory_id" id="selectSubcategory">
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
                                <label class="form-control-label" for="inputDanger1">Descripción o Quienes Somos del Negocio</label>
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
                                <select class="form-control @error('ciudades') is-invalid @enderror" name="ciudades_id" id="selectCiudades">
                                    <option>Seleccione una Ciudad</option>
                                    @foreach ($ciudades as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-4">
                                <label for="exampleFormControlSelect1">Sectores</label>
                                <select class="form-control" name="sectores_id" id="selectSectores">
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
                                <select class="form-control @error('categorias') is-invalid @enderror" name="delivery">
                                    <option>Seleccione</option>
                                    <option value="1">Si</option>
                                    <option value="0">No</option>
                                </select>
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
                                <label class="form-control-label" for="inputDanger1">Instagram</label>
                                <input type="text" class="form-control  @error('url_instagram') is-invalid @enderror" name="url_instagram"
                                    placeholder="ejemplo: pizzas" value="{{ old('url_instagram') }}" id="inputDanger1">
                                @if ($errors->has('url_instagram'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('url_instagram') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="inputDanger1">Facebook</label>
                                <input type="text" class="form-control  @error('url_facebook') is-invalid @enderror" name="url_facebook"
                                    placeholder="ejemplo: pizzas" value="{{ old('url_facebook') }}" id="inputDanger1">
                                @if ($errors->has('url_facebook'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('url_facebook') }}
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
                            <div class="form-group">
                                <label class="form-control-label" for="inputDanger1">Imagenes de la Negocio</label>
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
                   console.log(response.subcategorias);
                    var data = JSON.parse(response.subcategorias);
                   $.each(data, function(index,dato){
                    $("#selectSubcategory").append('<option value="'+dato.id+'">'+dato.name+'</option>');
                   });
                }
            });
        });
    });
</script>
@endsection

