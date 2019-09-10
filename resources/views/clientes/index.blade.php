@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-5">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
                <a class="btn btn-primary float-right" href="{{ url('clientes\create')}}">Novo Cliente
                        <i class="fas fa-user-plus"></i>
                    </a>
            <h3 class="card-title">Clientes</h3>

            
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover">
                <tbody>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Celular</th>                        
                        <th>Data de Registro</th>                        
                        <th>Ações</th>
                    </tr>
                    @foreach($clientes as $cliente)
                    <tr>
                        <td>{{ $cliente->id }}</td>
                        <td>{{ $cliente->nome.' '.$cliente->sobrenome }}</td>
                        <td>{{ $cliente->getFullCPF() }}</td>
                        <td>{{ $cliente->celular }}</td>
                        <td>{{ $cliente->created_at->format("m/d/Y") }}</td>
                        <td>
                            <a href="#">
                                <i class="fa fa-eye"></i>
                            </a>
                            /
                            <a href="#">
                                <i class="fa fa-edit blue"></i>
                            </a>
                            /
                            <a href="#">
                                <i class="fa fa-trash red"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
          </div>
          <!-- /.card-body -->
          <div class="card-footer ">
              <!-- <pagination :data="users" @pagination-change-page="getResults"></pagination> -->
              
              <div class="d-flex justify-content-center">{{ $clientes->links() }}</div>
          </div>
        </div>
        <!-- /.card -->
      </div>
    </div>    

</div>

@endsection