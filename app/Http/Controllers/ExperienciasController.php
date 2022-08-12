<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidato;
use App\Models\Experiencia;

class ExperienciasController extends Controller
{
    public function index($id) {
        // procura o candidato pelo id informado na url
        $candidato = Candidato::find($id);
        // pesquisa as experiencias do candidato
        $experiencias = Experiencia::where('candidatos_id', $id)->get();
        return view('experiencias/index', ['candidato' => $candidato, 'experiencias' =>$experiencias]);
    }

    public function create($id) {
        // procura o candidato pelo id informado na url
        $candidato = Candidato::find($id);
        // verifica se encontrou o candidato
        if (!empty($candidato)) {
            return view('experiencias/create', ['candidato' => $candidato]);
        } else {
            return reditect()->route('candidatos-index');
        }
        
    }

    public function novaexperiencia() {
        // retorna o html para cadastrar mais de uma experiencia por vez
        return view('experiencias/novaexperiencia');
    }

    public function store(Request $request) {
        // pega o id do candidato
        $idCandidato = $request->candidato;
        // verifica quantas experiencias foi informado
        $experiencias = count($request->empresa);
        // percorre as experiencias para salvar no banco
        for ($i = 0; $i < $experiencias; $i++ ) {            
           $dados = [
                'empresa' => $request->empresa[$i],
                'cargo' => $request->cargo[$i],
                'atividades' => $request->atividades[$i],
                'salario' => $request->salario[$i],
                'inicio' => $this->ajustaData($request->inicio[$i]),
                'fim' => $this->ajustaData($request->fim[$i]),
                'candidatos_id' => $idCandidato,
           ];
           // salva a experiencia no banco
           Experiencia::create($dados);
        }
        // retorna para a listagem de candidatos
        return redirect()->route('candidatos-index');
    }

    public function ajustaData($data) {
        // separa a data, mes e ano
        $explode = explode('/', $data);
        // cria o timestamp da data
        $novaData = mktime(0, 0, 0, $explode[1], $explode[0], $explode[2]);
        // retorna a data no formato para aceitar no banco de dados
        return date('Y/m/d', $novaData);
    }

    public function edit($id) {
        $experiencia = Experiencia::find($id);
        // dd($experiencia->candidatos_id);
        $candidato = Candidato::find($experiencia->candidatos_id);
        return view('experiencias/edit', ['experiencia' => $experiencia, 'candidato' => $candidato]);
    }

    public function update(Request $request, $id) {
        $data = [
            'id' => $id,
            'empresa' => $request->empresa,
            'cargo' => $request->cargo,
            'atividades' => $request->atividades,
            'salario' => $request->salario,
            'inicio' => $this->ajustaData($request->inicio),
            'fim' => $this->ajustaData($request->fim)
        ];
        Experiencia::where('id', $id)->update($data);
        return redirect()->route('experiencias-index', ['id' => $request->candidato]);
    }

    public function destroy($idCandidato, $id) {
        Experiencia::where('id', $id)->delete();
        return redirect()->route('experiencias-index', ['id' => $idCandidato]);
    }
}
