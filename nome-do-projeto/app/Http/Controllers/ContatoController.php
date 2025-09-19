<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContatoController extends Controller
{
    // Exibe o formulário de contato
    public function index()
    {
        return view('contato.index');
    }

    // Recebe os dados do formulário
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|min:3',
            'email' => 'required|email',
            'mensagem' => 'required|min:5',
        ]);

        // Aqui você pode salvar no banco ou enviar por e-mail
        // Exemplo: salvar no banco
        // \App\Models\Contato::create($request->all());

        // Exemplo: enviar por e-mail (opcional)
        /*
        Mail::to('seuemail@dominio.com')->send(new \App\Mail\ContatoMail($request->all()));
        */

        return redirect()->route('contato.index')->with('success', 'Mensagem enviada com sucesso!');
    }
}
    