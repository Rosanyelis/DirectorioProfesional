@extends('layouts.app')
@section('styles')
    <link href="{{ asset('assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
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
                    <a href="{{ url('negocios/nuevo-negocio') }}" class="btn waves-effect waves-light btn-primary">Nuevo Negocio</a>
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
        @include('layouts.alerts')
        <!-- *************************************************************** -->
        <!-- Start First Cards -->
        <!-- *************************************************************** -->
        <!-- basic table -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Listado de Negocios</h4>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-sm table-striped  no-wrap">
                                <thead>
                                    <tr>
                                        <th width="5px">#</th>
                                        <th width="500px">Negocio</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                    <tr>
                                        <td scope="row">{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            <!-- Agregar productos -->
                                            <a href="{{ url('negocios/' . $item->id . '/productos') }}"
                                                class="btn waves-effect waves-light btn-sm btn-info">
                                                <i class="fas fa-boxes"></i></a>
                                            <!-- Agregar Servicios -->
                                            <a href="{{ url('negocios/' . $item->id . '/servicios') }}"
                                                class="btn waves-effect waves-light btn-sm btn-success">
                                                <i class="fas fa-tasks"></i></a>
                                            <!-- Agregar redes -->
                                            <a href="{{ url('negocios/' . $item->id . '/redes') }}"
                                                class="btn waves-effect waves-light btn-sm btn-ligth">
                                                <i class="fas fa-share-alt"></i></a>
                                            <!-- Ver Categoria -->
                                            <a href="{{ url('negocios/' . $item->id . '/ver-negocio') }}"
                                                class="btn waves-effect waves-light btn-sm btn-dark"><i
                                                    class="fas fa-eye"></i></a>

                                            <button type="button" class="btn waves-effect waves-light btn-sm btn-danger"
                                            data-toggle="modal"
                                            data-target="#warning-header-modal-{{ $item->id }}"><i
                                                class="fas fa-trash-alt"></i></button>
                                                <!-- Warning Alert Modal -->
                                                <div id="warning-header-modal-{{ $item->id }}" class="modal fade"
                                                    tabindex="-1" role="dialog" aria-labelledby="warning-header-modalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form method="POST"
                                                                action="{{ url('negocios/' . $item->id . '/eliminar-negocio') }}">
                                                                @method('DELETE')
                                                                @csrf
                                                                <div class="modal-header modal-colored-header bg-warning">
                                                                    <h4 class="modal-title"
                                                                        id="warning-header-modalLabel">
                                                                        Alerta
                                                                    </h4>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-hidden="true">×</button>
                                                                </div>
                                                                <div class="modal-body text-center">
                                                                    <h1 class=""><i
                                                                            class="fas fa-exclamation-triangle text-warning"></i>
                                                                    </h1>
                                                                    <h3 class="mt-1">¿Está Seguro de Eliminar el
                                                                        Registro?</h5>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-light"
                                                                        data-dismiss="modal">Cerrar</button>
                                                                    <button type="submit" class="btn btn-warning">Si, Estoy
                                                                        Seguro</button>
                                                                </div>
                                                            </form>
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                </div><!-- /.modal -->
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
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
    <script src="{{asset('assets/extra-libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('dist/js/pages/datatable/datatable-basic.init.js')}}"></script>
@endsection
