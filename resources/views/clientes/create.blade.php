@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
           
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Cliente</h3>                     
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="needs-validation" method="post" action="{{url('clientes')}}">
                            @csrf
                            
                        @include('clientes.form')

                        <hr class="mb-4">
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Salvar</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection