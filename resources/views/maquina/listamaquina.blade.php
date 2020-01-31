@extends('templates.template2')

@section('content')

    <h1 class="title-pg"> Máquinas</h1>
    <a href="{{url('inicial')}}" class="btn btn-success">Voltar</a>
    <a href="{{url('maquinas/cadastro')}}" class="btn btn-primary">Cadastrar Nova Máquina </a>
    <a href="{{url('virtuais/cadastro')}}" class="btn btn-primary">Máquinas Virtuais </a>



    <table class="table table-striped table-bordered mt-2">
        <tr>
            <th>Tipo de Máquina</th>
            <th>Ip da Maquina</th>
            <th>Nome da Maquina</th>
            <th> Nome do Responsável</th>
            <th> Localização</th>
            <th>Mac Address</th>
            <th> Patrimônio</th>
            <th>Ação</th>
        </tr>
        @foreach($maquinas as $maquina)
        <tr>
            <td>{{$maquina->tipos_maquinas->no_tipo_maquina}}</td>
            <td>{{$maquina->ip_fisico}}</td>
            <td>{{$maquina->no_maquina}}</td>
            <td>{{$maquina->no_responsavel}}</td>
            <td>@if($maquina->no_localizacao  == 1)  Brasília @else Rio de Janeiro @endif</td>
            <td>{{$maquina->nu_macaddress}}</td>
            <td>{{$maquina->nu_patrimonio}}</td>
                <td>
                    <div class="btn-group" role="group">
                        <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Detalhes
                        </button>
                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                            <a class="dropdown-item" href="{{url("maquinas/alterar/$maquina->id_maq_fisica")}}">Alterar</a>
                            <a class="dropdown-item" href="javascript:void(0);" onclick="deletar({{$maquina->id_maq_fisica}})" >Excluir</a>
                            @if($maquina->id_tipo_maquina == 1 )
                                <a class="dropdown-item" href="{{url('virtuais/cad-maq-virtual')}}/{{$maquina->id_maq_fisica}}">Cadastrar Máquina Virtual</a>
                            @endif
                        </div>
                    </div>
                </td>
        </tr>

        @endforeach
    </table>

    <script type="text/javascript">

        function deletar(id) {
            if ( confirm("Deseja realmente excluir este registro? caso seja um servidor, suas maquinas virtuais e domínios serão excluidos no processo!") )
            {
                window.location.href = baseUrl+'maquinas/deletar'+'/'+id;
            }
        }

    </script>

@endsection