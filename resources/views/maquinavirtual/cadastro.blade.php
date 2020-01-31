@extends('templates.template2')
@section('content')
    @push('scripts')
    @endpush

    @if (isset($virtual))
         <h1 class="title-pg"> Alterar Máquina Virtual</h1>
    <form class="form" method="post" action="{{url('virtuais/alterada')}}" >
        {!! method_field('PUT') !!}
    @else
            <h1 class="title-pg"> Cadastro de Máquina Virtual</h1>
        <form class="form" method="post" action="{{url('virtuais/salvar')}}" >
    @endif
            <div  class="container">
            @csrf

            <div class="form-group">
                <select id="id_maq_fisica" name="id_maq_fisica" class="form-control">
                        <option value="0">::Selecione um servidor::</option>
                        @foreach($listaServidores as $servidores)
                        @if (isset($virtual))
                            @if ($virtual->id_maq_fisica == $servidores->id_maq_fisica)  @endif
                                <option value="{{$servidores->id_maq_fisica}}" selected>{{$servidores->no_maquina}}</option>
                            @else
                                <option value="{{$servidores->id_maq_fisica}}">{{$servidores->no_maquina}}</option>
                            @endif
                        @endforeach

                </select>
            </div>

            <div class="form-group">
                <input type="text" name="ip_virtual" placeholder="IP da Máquina Virtual:" class="form-control" value="{{$virtual->ip_virtual or old ('ip_virtual')}}">
            </div>

            <div class="form-group">
                <input type="text" name="no_virtual" placeholder="Nome da Máquina Virtual:" class="form-control" value="{{$virtual->no_virtual or old ('no_virtual')}}">
            </div>

            <div class="form-group">
                <input type="text" name="no_responsavel_virtual" placeholder="Nome do Responsável:" class="form-control" value="{{$virtual->no_responsavel_virtual or old ('no_responsavel_virtual')}}">
            </div>

            <div class="form-group">
                <input type="text" name="nu_macaddress" placeholder="Mac Address:" class="form-control" value="{{$virtual->nu_macaddress or old ('nu_macaddress')}}">
            </div>

            <div class="row">
                <div class="col-md-1">
                    <a href="{{url('maquinas/lista')}}" class="btn btn-success">Voltar</a>
                </div>
                <div class="col-md-1">
                    @if (isset($virtual))
                        <button class="btn btn-primary">Alterar</button>
                    @else
                        <button class="btn btn-primary">Cadastrar</button>
                    @endif
                </div>
            </div>
                @if (isset($virtual))
                    <input type="hidden" name="id_maq_virtual" value="{{$virtual->id_maq_virtual}}"/>
            @endif
        </form>
    </div>

    <table class="table table-striped table-bordered mt-2">
        <tr>
            <th>Servidor</th>
        <!--    <th>Tipo de maquina</th> -->
            <th>Nome da Máquina Virtual</th>
            <th>Ip da Máquina Virtual</th>
            <th>Nome do Responsável</th>
            <th>Mac Andress</th>
            <th>Dominios</th>
            <th>Ação</th>
        </tr>
        @foreach($virtuais as $maquinavirtual)
            <tr>
                <td>{{$maquinavirtual->maquina_fisica->no_maquina}}</td>
            <!--    <td>{{$maquinavirtual->maquina_fisica->tipos_maquinas->no_tipo_maquina}}</td>  -->
                <td>{{$maquinavirtual->no_virtual}}</td>
                <td>{{$maquinavirtual->ip_virtual}}</td>
                <td>{{$maquinavirtual->no_responsavel_virtual}}</td>
                <td>{{$maquinavirtual->nu_macaddress}}</td>
                <td>
                    <ul>
                        @foreach( $maquinavirtual->dominios  as $dominio )
                            <li>{{$dominio->no_dominio}}</li>
                        @endforeach
                    </ul>

                </td>
                <td>
                    <div class="btn-group" role="group">
                        <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Detalhes
                        </button>
                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                            <a class="dropdown-item" href="{{url("virtuais/alterar/$maquinavirtual->id_maq_virtual")}}">Alterar</a>
                            <a class="dropdown-item" href="{{url("virtuais/deletar/$maquinavirtual->id_maq_virtual")}}">Excluir</a>
                            <a class="dropdown-item" href="{{url('virtualdominio/maquina')}}/{{$maquinavirtual->id_maq_virtual}}">Vincular Domínio</a>
                        </div>
                    </div>
                </td>

            </tr>

        @endforeach

    </table>

@endsection