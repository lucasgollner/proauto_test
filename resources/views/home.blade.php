@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Área do Usuário</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <b>Alteração de dados </b> <br><br>


                    {{Form::open(array('route' => 'save','class' => 'form', 'method' => 'post'))}}
                    
                    <label> Nome completo </label>
                    {{ Form::text('name',Auth::user()->name, ["class"=>"form-control text-left","readonly"]) }} <br>

                    <label> CPF </label>
                    {{ Form::text('cpf',Auth::user()->cpf, ["class"=>"form-control text-left","readonly"]) }} <br>

                    <label> Placa </label>
                    {{ Form::text('placa',Auth::user()->placa, ["class"=>"form-control text-left","readonly"]) }} <br>

                    <label> Endereço </label>
                    {{ Form::text('endereco',Auth::user()->endereco, ["class"=>"form-control text-left"]) }} <br>

                    <label> Telefone </label>
                    {{ Form::text('telefone',Auth::user()->telefone, ["class"=>"form-control text-left","readonly"]) }} <br>
                    
                    {{ Form::submit('salvar')}}
                    {{ Form::close() }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
