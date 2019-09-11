@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="float-right">
                            <p>Atualizado em: {{ $cliente->updated_at->format("d/m/Y")  }}</p>                                
                    </div>

                    <h3>{{ $cliente->getNomeCompleto() }} </h3>
                    <p>Código: {{ $cliente->id }}</p>
                    
                </div>

                <div class="card-body">
                    <div >
                            <div class="float-right"><p>Data de Registro: {{ $cliente->created_at->format("d/m/Y") }}</p></div>
                    <p>Data de Nascimento: {{ date("m/d/Y", strtotime($cliente->data_nascimento))  }}</p>
                    <p>CPF: {{ $cliente->getFullCPF() }}</p>
                    <p>Celular: {{ $cliente->celular }}</p>
                    <p>Telefone: {{ $cliente->telefone }}</p>
                    <p>E-mail: {{ $cliente->email }}</p>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection