<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Lista de Clientes</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container my-5">

  <!-- Linha com título centralizado REAL + botão à direita -->
  <div class="row align-items-center mb-5">
    <div class="col-4"></div> <!-- Espaço vazio à esquerda -->
    <div class="col-4 text-center">
      <h2 class="text-primary m-0">Clientes Cadastrados</h2>
    </div>
    <div class="col-4 text-end">
      <a href="/" class="btn btn-danger">&larr; Voltar</a>
    </div>
  </div>

  @if(session('success'))
    <div class="alert alert-success text-center">
      {{ session('success') }}
    </div>
  @endif

  @foreach ($clientes as $cliente)
    <div class="card shadow-sm mb-4">
      <div class="card-body">
        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label">Nome</label>
            <input type="text" class="form-control" value="{{ $cliente->name }}" disabled>
          </div>
          <div class="col-md-6">
            <label class="form-label">Telefone</label>
            <input type="text" class="form-control" value="{{ $cliente->tel }}" disabled>
          </div>
          <div class="col-md-6">
            <label class="form-label">Origem</label>
            <input type="text" class="form-control" value="{{ $cliente->ori }}" disabled>
          </div>
          <div class="col-md-6">
            <label class="form-label">Data do Contato</label>
            <input type="text" class="form-control" value="{{ $cliente->date }}" disabled>
          </div>
          <div class="col-12">
            <label class="form-label">Observação</label>
            <textarea class="form-control" rows="3" disabled>{{ $cliente->obs }}</textarea>
          </div>
        </div>
      </div>
    </div>
  @endforeach
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
