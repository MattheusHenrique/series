<?php

namespace App\Http\Controllers;

use App\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request){
        $series = Serie::query()
            ->orderBy('nome')
            ->get();

        $mensagem = $request->session()->get('mensagem');
        


        return view('series.index', compact('series', 'mensagem'));
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {   
        //lança exessao e redireciona
        $request->validate([
            'nome' => 'required|min:3|max:100'
        ]);

        $serie = Serie::create(['nome' => $request->nome]);
        $qtdTemporadas = $request->qtd_temporadas;
        for ($i=1; $i < $qtdTemporadas; $i++) { 
            $temporada = $serie->temporadas()->create(['numero' => $i]);
            
            for ($j=1; $j <= $request->ep_por_temporada; $j++) { 
                $temporada->episodios()->create(['numero' => $j]);
            }
        }



        $request->session()
        ->flash(
            'mensagem',
            "Serie {$serie->id} criada com sucesso {$serie->nome}"
        );

        return redirect()->route('listar_series');
    }

    public function destroy(Request $request)
    {
        Serie::destroy($request->id);
        $request->session()
        ->flash(
            'mensagem',
            "Serie removida com sucesso criada com sucesso"
        );
        return redirect()->route('listar_series');
    }
}