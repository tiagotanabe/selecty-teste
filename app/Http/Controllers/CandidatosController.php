<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidato;

class CandidatosController extends Controller
{
    // pagina inical, listagem dos candidatos cadastrados
    public function index() {
        // busca todos os candidatos
        $candidatos = Candidato::all();
        // retorna a view passando a lista de candidatos
        return view('candidatos\index', ['candidatos' => $candidatos]);
    }

    public function create() {
        return view('candidatos\create');
    }

    public function store(Request $request) {
        // realiza o insert do candidato
        Candidato::create($request->all());
        // redireciona para o index, a tela de listagem dos candidatos
        return redirect()->route('candidatos-index');
    }

    public function edit($id) {
        $candidato = Candidato::find($id);

        if (!empty($candidato)) {
            return view('candidatos/edit', ['candidato' => $candidato]);
        } else {
            return route('candidatos-index');
        }        
    }

    public function update(Request $request, $id) {
        $data = [
            'id' => $id,
            'nome' => $request->nome,
            'email' => $request->email,
            'telefone' => $request->telefone
        ];

        Candidato::where('id', $id)->update($data);
        return redirect()->route('candidatos-index');
    }

    public function destroy($id) {
        Candidato::where('id', $id)->delete();
        return redirect()->route('candidatos-index');
    }

    public function usuariocreate($id) {
       return view('candidatos/usuariocreate', ['id' => $id]);
    }

    public function usuariostore(Request $request, $id) {
        $data = [
            'usuario' => $request->usuario,
            'senha' => md5($request->senha)
        ];
        Candidato::where('id', $id)->update($data);
        return redirect()->route('candidatos-index');
    }
}
