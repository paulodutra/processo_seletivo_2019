@extends('templates.template')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form class="form-horizontal" method="post" action="{{ url('usuarios/cadastro') }}">
  {{ csrf_field() }}
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="nome">Nome</label>
      <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome">
    </div>
    <div class="form-group col-md-6">
      <label for="email">Email</label>
      <input type="email" class="form-control" name="email" id="email" placeholder="Email">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="data_nascimento">Data de nascimento</label>
      <input type="text" class="form-control" name="data_nascimento" id="data_nascimento" placeholder="Data de nascimento">
    </div>
    <div class="form-group col-md-4">
      <label for="senha">Senha</label>
      <input type="password" class="form-control" name="senha"  id="senha" placeholder="Senha">
    </div>
    <div class="form-group col-md-4">
      <label for="confirma_senha">Confirmação de senha</label>
      <input type="password" class="form-control" name="confirma_senha" id="confirma_senha" placeholder="Confirmação de senha">
    </div>
  </div>
  <button class="btn btn-success" type="submit">Salvar</button>
</form>

@endsection