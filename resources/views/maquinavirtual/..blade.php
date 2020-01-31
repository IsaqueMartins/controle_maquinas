@extends('templates.template2')
@push('scripts')
@endpush
@section('content')

    <h1 class="title-pg"> Maquinas Virtuais</h1>
    <a href="{{url('inicial')}}" class="btn btn-success">Voltar</a>
    <a href="{{url('virtuais/cad-maq-virtual')}}" class="btn btn-primary">Cadastrar Nova Maquina </a>

    <table class="table table-striped table-bordered mt-2">
        <tr>
            <th>Servidor</th>
            <th>Nome da Maquina Virtual</th>
            <th>Ip da Maquina Virtual</th>
            <th> Nome do Responsável</th>
            <th>Mac Andress</th>
            <th>Ação</th>
        </tr>
        @foreach($virtuais as $maquinavirtual)
            <tr>
                <td>{{$maquinavirtual->id_maq_fisica}}</td>
                <td>{{$maquinavirtual->no_virtual}}</td>
                <td>{{$maquinavirtual->ip_virtual}}</td>
                <td>{{$maquinavirtual->no_responsavel_virtual}}</td>
                <td>{{$maquinavirtual->nu_macaddress}}</td>
                <td>
                    <div class="btn-group" role="group">
                        <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Detalhes
                        </button>
                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                            <a class="dropdown-item" href="{{url('virtuais/alterar')}}">Alterar</a>
                            <a class="dropdown-item" href="{{url('')}}">Excluir</a>
                        </div>
                    </div>
                </td>

            </tr>

        @endforeach
    </table>


@endsection