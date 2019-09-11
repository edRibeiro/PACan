<?php

namespace App\Repositories;

use App\Cliente;
use Illuminate\Support\Facades\DB;

class ClienteRepository implements ClienteRepositoryInterface{

    public function get($cliente_id){
        return Cliente::find($cliente_id);
    }

    public function getAllOrderBy($order){
        return DB::table('clientes')->orderByRaw($order)->paginate(10);
    }

    public function all(){
        return Cliente::paginate(10);
    }

    public function delete($cliente_id){
        Cliente::destroy($cliente_id);
    }
    
    public function update($cliente_id, array $cliente_data){
        Cliente::find($cliente_id)->update($cliente_data);
    }

    public function create(array $cliente_data){
        Cliente::create($cliente_data);
    }
}