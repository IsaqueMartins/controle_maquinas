@extends('templates.template2')
@section('content')
@push('scripts')




@endpush

@if (isset($maquina))
     <h1 class="title-pg"> Alterar Máquina</h1>
    <form class="form" method="post" action="{{url('maquinas/alterada')}}">
        {!! method_field('PUT') !!}
@else
            <h1 class="title-pg"> Cadastro de Máquinas</h1>
    <form class="form" method="post" action="{{url('maquinas/novocadastro')}}">
@endif
<div  class="container">

        @csrf
        <div class="form-group">
             <select name="tipomaquina" class="form-control"  @if (isset($maquina))  @if ( $maquina->id_tipo_maquina == 1) disabled="disabled"  @endif @endif>
           <option>Tipo de Máquina</option>
                @foreach($tipo_maquinas as $tipo_maquina)
                     @if (isset($maquina))
                         @php
                            $selected = ($tipo_maquina->id_tipo_maquina == $maquina->id_tipo_maquina) ? ' selected="selected" ' : '';
                         @endphp
                     @endif
                     <option value="{{$tipo_maquina->id_tipo_maquina}}" {{$selected}}>{{$tipo_maquina->no_tipo_maquina}}</option>
                @endforeach
             </select>
        </div>

        <div class="form-group">
        <input type="text" name="ip_fisico" placeholder="IP da Máquina:" class="form-control" value="{{$maquina->ip_fisico or old  ('ip_fisico')}}">
        </div>

        <div class="form-group">
        <input type="text" name="no_maquina" placeholder="Nome da Máquina:" class="form-control" value="{{$maquina->no_maquina or old ('no_maquina')}}">
        </div>

        <div class="form-group">
        <input type="text" name="no_responsavel" placeholder="Nome do Responsável:" class="form-control" value="{{$maquina->no_responsavel or old ('no_responsavel')}}">
        </div>

        <div class="form-group">
            <select name="no_local" class="form-control" value="{{$maquina->no_localizacao or old ('no_local')}}">
            <option>Localização</option>
                @if (isset($maquina))
                    <option value="1" @if ( $maquina->no_localizacao == 1 ) selected="selected" @endif >Brasília</option>
                    <option value="2" @if ( $maquina->no_localizacao == 2 ) selected="selected" @endif >Rio de Janeiro</option>
                @else
                    <option value="1">Brasília</option>
                    <option value="2">Rio de Janeiro</option>
                @endif

            </select>
        </div>

        <div class="form-group">
        <input type="text" name="nu_macaddress" placeholder="Mac Address:" class="form-control" value="{{$maquina->nu_macaddress or old ('nu_macaddress')}}">
        </div>

        <div class="form-group">
        <input type="text" name="nu_patrimonio" placeholder="Patrimônio:" class="form-control" value="{{$maquina->nu_patrimonio or old ('nu_patrimonio')}}">
        </div>

        <div class="row">
            <div class="col-md-1">
                <a href="{{url('maquinas/lista')}}" class="btn btn-success">Voltar</a>
            </div>
            <div class="col-md-1">
                @if (isset($maquina))
                <button class="btn btn-primary">Alterar</button>
                @else
                    <button class="btn btn-primary">Cadastrar</button>
                @endif
            </div>
        </div>
        @if (isset($maquina))
            <input type="hidden" name="id_maq_fisica" value="{{$maquina->id_maq_fisica}}"/>
        @endif
    </form>
</div>













@endsection

