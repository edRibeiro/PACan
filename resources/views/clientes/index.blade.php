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
                        <th>
                            <a class="text-dark" href="{{ url('clientes?order=id') }}">
                                ID
                            </a>
                        </th>
                        <th>
                            <a class="text-dark" href="{{ url('clientes?order=nome') }}">
                                Nome
                            </a>
                        </th>
                        <th>CPF</th>
                        <th>Celular</th>                        
                        <th>
                            <a class="text-dark" href="{{ url('clientes?order=created_at') }}">
                                Data de Registro
                            </a>
                        </th>                        
                        <th>Ações</th>
                    </tr>
                    @foreach($clientes as $cliente)
                    <tr>
                        <td>{{ $cliente->id }}</td>
                        <td>{{ $cliente->nome.' '.$cliente->sobrenome }}</td>
                        <td>{{ $cliente->getFullCPF() }}</td>
                        <td>{{ $cliente->celular }}</td>
                        <td>{{ $cliente->created_at->format("d/m/Y") }}</td>
                        <td>
                        <a href="{{ url('clientes'.'\\'.$cliente->id) }}">
                                <i class="fa fa-eye"></i>
                            </a>
                            /
                            <a href="{{ url('clientes'.'\\'.$cliente->id.'\edit') }}">
                                <i class="fa fa-edit blue"></i>
                            </a>
                            /
                            <a href="#" data-toggle="modal" onclick="deleteData({{$cliente->id}})" 
                                data-target="#DeleteModal">
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

<div id="DeleteModal" class="modal fade " role="dialog">
    <div class="modal-dialog" role="document">
      <!-- Modal content-->
      <form action="" id="deleteForm" method="post">
          <div class="modal-content">
              <div class="modal-header bg-danger">                  
                  <h4 class="modal-title text-center">Confirmar Exclusão</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                @method('delete')
                @csrf 
                  <p class="text-center">Tem certeza de que deseja excluir?</p>
              </div>
              <div class="modal-footer">
                  
                <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
                <button type="submit" name="" class="btn btn-danger" data-dismiss="modal" onclick="formSubmit()">Sim, Remover</button>
                  
              </div>
          </div>
      </form>
    </div>
   </div>

   <script type="application/javascript">
    function deleteData(id)
     {
         var id = id;
         var url = '{{ route("clientes.destroy", ":id") }}';
         url = url.replace(':id', id);
         $("#deleteForm").attr('action', url);
     }

    function formSubmit()
    {
        $("#deleteForm").submit();
    }
 </script>

@endsection