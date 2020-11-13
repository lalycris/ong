<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Caixa;

class CaixaController extends Controller
{
    public function index()
    {
        $caixas = Caixa::where('data', date('y-m-d'))->orderBy('data', 'ASC')->get();
        return view('caixa', compact('caixas'));
    }

    public function store(Request $request)
    {
        $caixas = Caixa::where('data', $request->dataBusca)->orderBy('data', 'ASC')->get();
        return view('caixa', compact('caixas'));
    }

    public function destroy($id)
    {
        Caixa::find($id)->delete();
        return redirect()->back();
    }

    public function edit($id)
    {
        $caixas::find($id);

        if(stripos(session()->get('_previsous') ['url'], 'home') !==false)
        return view('edit', compact('caixas'))->withSimple(true);
    
            return view('edit', compact('caixas'));
}

    public function update(Request $request, $id)
    {
        $inicio = session()->get('inicio');
        $idfim = session()->get('fim');
        return redirect('extrato/gerar?dataInic='.$inicio. '&dataFinal=' .$fim);
    }
}
