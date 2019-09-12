<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Repositories\ClienteRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClienteController extends Controller
{

    protected $repository;


    public function __construct(ClienteRepositoryInterface $repository) {
        $this->repository = $repository;
        $this->middleware('auth');
   }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $order = \Request::get('order');
        if($order)
            $clientes = $this->repository->getAllOrderBy($order);
        else
        $clientes = $this->repository->all();
        
        return view('clientes/index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cliente = new Cliente();
        return view('clientes/create', compact('cliente'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nome' => 'required', 
            'sobrenome' => 'required', 
            'data_nascimento' => 'required|before:-18 years', 
            'cpf' => 'required|cpf', 
            'celular'=> 'required|', 
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return redirect('clientes/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        $this->repository->create($request->all());

        return redirect('clientes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = $this->repository->get($id);
        return view('clientes/show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = $this->repository->get($id);
        return view('clientes/edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'nome' => 'required', 
            'sobrenome' => 'required', 
            'data_nascimento' => 'required|before:-18 years', 
            'cpf' => 'required|cpf', 
            'celular'=> 'required|', 
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return redirect('clientes/'.$id.'/edit')
                        ->withErrors($validator)
                        ->withInput();
        }       
        
        $this->repository->update($id, $request->all());
        return redirect('clientes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {        
        $this->repository->delete($id);
        return redirect('clientes');
    }

}
