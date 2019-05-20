<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listarUsuario()
    {
        $usuarios = Usuario::all();
        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function criarUsuario(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('usuarios.create');
        }

        if ($request->isMethod('post')) {

            $request->validate([
                'nome'            => 'required|string',
                'email'           => 'required|string|email|unique:usuarios',
                'data_nascimento' => 'required|date',
                'senha'           => 'required|min:6|string|required_with:confirma_senha|same:confirma_senha',
                'confirma_senha'  => 'required|min:6|string',
            ]);


            
          $date = date('Y-m-d', strtotime($request->data_nascimento));
          $password =  bcrypt($request->senha);

          $request->merge(['data_nascimento' => $date, 'senha' => $password]);

          $data = $request->all();

          $create = Usuario::create($data);

          if($create)
          {
            return redirect()->route('lista')->with('success','Usuário cadastrado com sucesso');
       
          }
          else
          {
            return redirect()->back()->with('danger','Erro ao cadastrar usuário');
          }

        }
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function atualizarUsuario(Request $request, $id)
    {
        if ($request->isMethod('get')) {

            $usuario = Usuario::find($id);


            
            return view('usuarios.update', compact('usuario'));
        }

        if ($request->isMethod('put')) {

            $request->validate([
                'nome'            => 'required|string',
                'email'           => 'required|string|email',
                'data_nascimento' => 'required|date',
                'senha'           => 'nullable|min:6|string|required_with:confirma_senha|same:confirma_senha',
                'confirma_senha'  => 'nullable|min:6|string',
            ]);

            $date = date('Y-m-d', strtotime($request->data_nascimento));

            $request->merge(['data_nascimento' => $date]);

            if($request->has('senha') && $request->filled('senha'))
            {
              $password =  bcrypt($request->senha);
              $request->merge(['senha' => $password]);
              $request->request->remove('confirma_senha');

            }else{
                $request->request->remove('senha');
                $request->request->remove('confirma_senha');
            }
              
            $data = $request->except(['_method', '_token']);
            
            $update = Usuario::whereId($id)->update($data);
  
            if($update)
            {
              return redirect()->route('lista')->with('info','Usuário atualizado com sucesso');
         
            }
            else
            {
              return redirect()->back()->with('danger','Erro ao cadastrar usuário');
            }
           
            

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deletarUsuario($id)
    {
        $usuario = Usuario::find($id);
        $usuario->delete();

        return redirect()->route('lista')->with('info','Usuário excluido com sucesso');
    }
}
