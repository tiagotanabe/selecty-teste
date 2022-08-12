<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidato;
use App\Models\Academica;

class AcademicasController extends Controller
{
    public function index($id) {
        $candidato = Candidato::find($id);
        $academicas = Academica::where('candidatos_id', $id)->get();
        return view('academicas/index', ['academicas' => $academicas, 'candidato' => $candidato]);
    }

    public function create($id) {
         // procura o candidato pelo id informado na url
         $candidato = Candidato::find($id);
         // verifica se encontrou o candidato
         if (!empty($candidato)) {
             return view('academicas/create', ['candidato' => $candidato]);
         } else {
             return reditect()->route('candidatos-index');
         }
    }

    public function novaacademicas() {
        return view('academicas/novaformacao');
    }

    public function store(Request $request) {
        // pega o id do candidato
        $idCandidato = $request->candidato;
        // verifica quantas experiencias foi informado
        $academicas = count($request->instituicao);
        // percorre as experiencias para salvar no banco
        for ($i = 0; $i < $academicas; $i++ ) {            
           $dados = [
                'instituicao' => $request->instituicao[$i],
                'curso' => $request->curso[$i],        
                'inicio' => $this->ajustaData($request->inicio[$i]),
                'final' => $this->ajustaData($request->fim[$i]),
                'candidatos_id' => $idCandidato,
           ];
           // salva a experiencia no banco
           Academica::create($dados);
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
        $academica = Academica::find($id);

        $candidato = Candidato::find($academica->candidatos_id);
        return view('academicas/edit', ['academica' => $academica, 'candidato' => $candidato]);
    }

    public function update(Request $request, $id) {
        $data = [
            'id' => $id,
            'instituicao' => $request->instituicao,
            'curso' => $request->curso,
            'inicio' => $this->ajustaData($request->inicio),
            'final' => $this->ajustaData($request->fim)
        ];
        Academica::where('id', $id)->update($data);
        return redirect()->route('academicas-index', ['id' => $request->candidato]);
    }

    public function destroy($idCandidato, $id) {
        Academica::where('id', $id)->delete();
        return redirect()->route('academicas-index', ['id' => $idCandidato]);
    }
}
