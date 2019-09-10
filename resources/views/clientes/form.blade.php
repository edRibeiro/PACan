<div class="form-group row">
    <label for="nome" class="col-2 col-form-label">Nome</label>
    <div class="col-10">                             
    <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome') ?? $cliente->nome }}" placeholder="Primeiro nome" required>
        <div class="invalid-feedback" style="width: 100%;">
            The name is required.
        </div>
    </div>
    
</div>  

<div class="form-group row">
    <label for="sobrenome" class="col-2 col-form-label">Sobrenome</label> 
    <div class="col-10">                            
    <input type="text" class="form-control" id="sobrenome" name="sobrenome" value="{{ old('sobrenome') ?? $cliente->sobrenome }}" placeholder="Sobrenome" required>
        <div class="invalid-feedback" style="width: 100%;">
            The name is required.
        </div>
    </div>
</div>  

<div class="form-group row">
    <label for="data_nascimento" class="col-2 col-form-label">Data de Nascimento</label>
    
    <div class="col-10">
        <input class="form-control" type="date" value="{{ old('data_nascimento') ?? $cliente->data_nascimento }}" id="data_nascimento" name="data_nascimento" required>
    </div>

</div>

<div class="form-group row">
    <label for="cpf" class="col-2 col-form-label">CPF</label>
    <div class="col-10">
        <input type="number" class="form-control" id="cpf" name="cpf" placeholder="" value="{{ old('cpf') ?? $cliente->cpf }}" required>
        <div class="invalid-feedback">
            Valid first name is required.
        </div>
    </div>
</div>

<div class="form-group row">
    <label for="celular" class="col-2 col-form-label">Celular</label>
    <div class="col-10">
        <input type="text" class="form-control" id="celular" name="celular" placeholder="" value="{{ old('celular') ?? $cliente->celular }}" required>
        <div class="invalid-feedback">
            Valid celular is required.
        </div>
    </div>
</div>

<div class="form-group row">
    <label for="telefone" class="col-2 col-form-label">Telefone</label>
    <div class="col-10">
        <input type="text" class="form-control" id="telefone" name="telefone" placeholder="" value="{{ old('telefone') ?? $cliente->telefone }}" >
        <div class="invalid-feedback">
            Valid celular is required.
        </div>
    </div>
</div>

<div class="form-group row">
    <label for="email" class="col-2 col-form-label">Email </label>
    <div class="col-10">
        <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com"  value="{{ old('email') ?? $cliente->email }}" required>
        <div class="invalid-feedback">
            Please enter a valid email address for shipping updates.
        </div>
    </div>
</div>