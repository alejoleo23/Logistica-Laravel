@extends('layouts.app')

@section('section')


<!-- Bread crumb -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">EMPLEADOS</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('empleado.index') }}">Empleados</a></li>
            <li class="breadcrumb-item active">Lista de Empleados</li>
        </ol>
    </div>
</div>
<!-- End Bread crumb -->


<!-- Container fluid  -->
<div class="container-fluid">
    <!-- Start Page Content -->

    <div class="col-lg-12">
        <div class="card">

            @if (session('datos'))
            <div class="alert alert-warning alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                <strong></strong> {{ session('datos') }}
            </div>
            @endif

            <div class="card-body">
                <div>
                    <h2 style="float: left">Empleados</h2>
                    <a href="{{ route('empleado.create') }}" type="button" class="btn btn-info m-b-10 m-l-5" style="float: right">Nuevo Empleado</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover " id="myTable">
                        <thead style="background: #1976D2; color:white; opacity: 0.9">
                            <tr>
                                <th>N°</th>
                                <th>Nombre</th>
                                <th>DNI</th>
                                <th>Dirección</th>
                                <th>Telefono</th>
                                <th>Email</th>
                                <th>Fecha Nacimiento</th>
                                <th style="text-align:center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach($employee as $item)
                            <tr>
                                <th scope="row" style="color: black; text-align: center">{{ $item->id }}</th>
                                <td>{{ $item->nombre }}</td>
                                <td>{{ $item->dni }}</td>
                                <td>{{ $item->direccion }}</td>
                                <td>{{ $item->telefono }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->fecha_nac }}</td>
                                <td style="text-align:center">
                                    <a href="{{route('empleado.edit', $item->id)}}"><i class="fas fa-edit" style="color:#3084D7; font-size: 20px;"></i></a>
                                    <a href="#" data-toggle="modal" data-target="#Eliminar" data-id="{{$item['empresa_id']}}"><i class="fas fa-trash-alt fa-fw" style="color:#3084D7; font-size: 20px;"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /# card -->
    </div>

    <!-- End PAge Content -->
</div>
<!-- End Container fluid  -->

<div class="modal" id="Eliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content" style="width: 140%;">
            <div class="modal-header bg-danger text-white d-flex justify-content-center">
                <h5 class="modal-title" id="exampleModalLabel" style="color: white">ELIMINAR EMPRESA</h5>
            </div>
            <div class="modal-body d-flex justify-content-center" style="text-align: center;">¿ Quieres eliminar esta Empresa ?</div>
            <div class="modal-body d-flex justify-content-center" style="padding-top: 0px;">
                <i class="fas fa-trash-alt fa-3x text-danger"></i>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button class="btn btn-outline-danger cerrarModal" style="margin-right: 6%;" type="button" data-dismiss="modal">Cancelar</button>
                <form method="POST" action="">
                    @method('DELETE')
                    @csrf
                    <a class="btn btn-danger" style="color: white" onclick="$(this).closest('form').submit();">Eliminar</a>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
    $('#Eliminar').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var modal = $(this)
        modal.find('form').attr('action', '/empresa/' + id);
    })
</script>
@endsection


@section('script1')

<script src="/Plantilla/js/lib/datatables/datatables.min.js"></script>
<script src="/Plantilla/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="/Plantilla/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
<script src="/Plantilla/js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="/Plantilla/js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="/Plantilla/js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="/Plantilla/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script src="/Plantilla/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
<script src="/Plantilla/js/lib/datatables/datatables-init.js"></script>

@endsection
