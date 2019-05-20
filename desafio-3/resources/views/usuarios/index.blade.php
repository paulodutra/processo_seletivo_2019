@extends('templates.template')

@section('content')

  <a href="/usuarios/cadastro/" class="btn btn-success">Cadastrar</a>
  <hr>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>#</td>
          <td>Nome</td>
          <td>E-mail</td>
          <td>Data Nascimento</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($usuarios as $usuario)
        <tr>
            <td>{{$usuario->id}}</td>
            <td>{{$usuario->nome}}</td>
            <td>{{$usuario->email}}</td>
            <td>{{date('d/m/Y', strtotime($usuario->data_nascimento))}}</td>
            <td><a href="/usuarios/atualizar/{{$usuario->id}}" class="btn btn-primary">Editar</a></td>
            <td>
               <form action="{{ url('usuarios/excluir', $usuario->id) }}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>

@endsection