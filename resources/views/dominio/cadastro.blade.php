@extends('templates.template2')

@section('content')

    @if(isset($alterar))
        <h1 class="title-pg"> Alterar de Domínio</h1>
            <form class="form" method="post" action="{{url('dominios/alterada')}}">
                {!! method_field('PUT') !!}
    @else
        <h1 class="title-pg"> Cadastro de Domínio</h1>
            <form class="form" method="post" action="{{url('dominios/novocadastro')}}">
    @endif
            <div  class="container">
            @csrf
            <div class="form-group">
                <input type="text" name="no_dominio" placeholder="Endereço do Domínio:" class="form-control" value="{{$alterar->no_dominio or old ('no_dominio')}}">
            </div>

            <div class="form-group">
                <input type="text" name="ip_dns_interno" placeholder="IP Interno:" class="form-control" value="{{$alterar->ip_dns_interno or old ('ip_dns_interno')}}">
            </div>

            <div class="form-group">
                <input type="text" name="ip_dns_externo" placeholder="IP Externo:" class="form-control" value="{{$alterar->ip_dns_externo or old ('ip_dns_externo')}}">
            </div>


            <div class="row">
                <div class="col-md-1">
                    <a href="{{url('inicial')}}" class="btn btn-success">Voltar</a>
                </div>
                <div class="col-md-1">
                    @if(isset($alterar))
                        <button class="btn btn-primary">Alterar</button>
                     @else
                        <button class="btn btn-primary">Cadastrar</button>
                    @endif
                </div>
            </div>
                @if (isset($alterar))
                    <input type="hidden" name="id_dominio" value="{{$alterar->id_dominio}}"/>
                @endif

            </form>
    </div>

    <table class="table table-striped table-bordered mt-2">
        <tr>
            <th>Nome</th>
            <th>IP DNS Interno</th>
            <th>IP DNS Externo</th>
            <th>Máquina Virtual Vinculada</th>
            <th>Ações</th>
        </tr>

    @foreach($dominios as $dominio)

        <tr>
            <td>{{$dominio->no_dominio}}</td>
            <td>{{$dominio->ip_dns_interno}}</td>
            <td>{{$dominio->ip_dns_externo}}</td>
            <td>
                @foreach( $dominio->maquina_virtual  as $maquinavirtual )
                   {{$maquinavirtual->no_virtual}}
                @endforeach</td>
            <td class="opcoes">
                <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                    <button type="button" class="btn btn-primary" href="{{url('dominios/maquina')}}/{{$dominio->id_dominio}}" >Detalhes</button>

                    <div class="btn-group" role="group">
                        <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        </button>
                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                            <a class="dropdown-item" href="{{url('dominios/alterar')}}/{{$dominio->id_dominio}}">Alterar</a>
                            <a class="dropdown-item" href="javascript:void(0);" onclick="deletar({{$dominio->id_dominio}})" >Excluir</a>
                            <a class="dropdown-item" href="{{url('virtualdominio/maquina')}}/{{$dominio->id_dominio}}">Vincular Máquina</a>

                            </div>

                    </div>
                </div>
            </td>

        </tr>
        @endforeach
    </table>

    <script type="text/javascript">

        function deletar(id) {
            if ( confirm("Deseja realmente excluir este registro?") )
            {
                window.location.href = baseUrl+'dominios/deletar'+'/'+id;
            }
        }

    </script>

@endsection