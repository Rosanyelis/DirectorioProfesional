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
                            <li class="breadcrumb-item active">Categorias</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-5 align-self-center">
                <div class="customize-input float-right">
                    <a href="{{ url('categorias') }}" class="btn waves-effect waves-light btn-dark">Regresar</a>
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
                        <h4 class="card-title">Nueva Categoria</h4>
                        <form class="mt-3" method="POST"  action="{{ url('categorias/guardar-categoria') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-4">
                                <label for="exampleFormControlSelect1">Ciudad</label>
                                <select class="form-control @error('ciudades') is-invalid @enderror" name="ciudades_id" id="selectCiudades">
                                    <option>Seleccione una Ciudad</option>
                                    @foreach ($data as $item)
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
                                <label class="form-control-label" for="inputDanger1">Nombre de Categoria</label>
                                <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name"
                                    placeholder="ejemplo: Alimentos Caseros" value="{{ old('name') }}" id="inputDanger1">
                                @if ($errors->has('name'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('name') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="inputDanger1">Imagen de Categoria</label>
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
<script>
    $(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
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
    });
</script>
@endsection
