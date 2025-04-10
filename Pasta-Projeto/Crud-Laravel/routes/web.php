<?php

use Illuminate\Support\Facades\Route;
use App\Models\Clientes;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Página inicial
Route::get('/', function () {
    $clientes = \App\Models\Clientes::all();
    return view('welcome', ['clientes' => $clientes]);
});

// Cadastro de cliente
Route::post('/cadastrar-cliente', function(Request $request) {
    Clientes::create([
        'name' => $request->name,
        'tel' => $request->tel,
        'ori' => $request->ori,
        'date' => $request->date,
        'obs' => $request->obs
    ]);
    return redirect('/')->with('success', 'Cliente cadastrado com sucesso!');
});

// Listar clientes
Route::get('/listar-cliente', function() {
    $clientes = Clientes::all();
    return view('listar-cliente', ['clientes' => $clientes]);
});

// Formulário para editar cliente
Route::get('/editar-cliente', function(Request $request) {
    $id = $request->id;
    $cliente = Clientes::findOrFail($id);
    return view('editar-cliente', ['cliente' => $cliente]);
});


// Envio do formulário de edição de cliente
Route::post('/editar-cliente/{id}', function(Request $request, $id) {
    $cliente = Clientes::findOrFail($id);
    $cliente->update([
        'name' => $request->name,
        'tel' => $request->tel,
        'ori' => $request->ori,
        'date' => $request->date,
        'obs' => $request->obs
    ]);
    return redirect('/')->with('success', 'Cliente editado com sucesso!');
});

// ✅ Agora está fora e será registrada corretamente
Route::post('/deletar-cliente', function(Request $request) {
    $cliente = Clientes::findOrFail($request->id);
    $cliente->delete();

    return redirect('/')->with('success', 'Cliente deletado com sucesso!');
});

