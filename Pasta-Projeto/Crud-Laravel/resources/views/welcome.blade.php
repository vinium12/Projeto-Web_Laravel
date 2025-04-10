<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    <!-- Styles -->
    <style>
    .success-message {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #d1e7dd;
        color: #0f5132;
        border: 1px solid #badbcc;
        border-radius: 15px;
        padding: 20px 30px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        z-index: 9999;
        text-align: center;
        font-size: 1rem;
        animation: fadeIn 0.4s ease-in-out;
    }

    .success-message button {
        margin-top: 10px;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translate(-50%, -60%); }
        to { opacity: 1; transform: translate(-50%, -50%); }
    }
</style>

</head>
<body class="antialiased">

<div class="container">
    <div class="row text-center">
        <div class="col">
            <nav class="navbar navbar-expand-lg bg-primary text-light p-3"> 
                <div class="container-fluid">
                <a class="navbar-brand text-white" href="#">SISTEMA WEB</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                        <a class="nav-link text-white" href="#">Cadastrar</a>
                        <a class="nav-link text-white" href="/listar-cliente">Consultar</a>
                            
                            <!-- Botão Editar -->
                            <form class="d-flex align-items-center ms-3" action="/editar-cliente" method="GET">
                                <select name="id" class="form-select me-2" style="width: auto;" required>
                                    <option disabled selected>Selecionar ID</option>
                                    @foreach($clientes as $cliente)
                                        <option value="{{ $cliente->id }}">ID {{ $cliente->id }}</option>
                                    @endforeach
                                </select>
                                <!-- Alterado para btn-primary -->
                                <button type="submit" class="btn" style="background-color: #6EC1E4; color: white;">Editar</button>
                            </form>

                            <!-- Botão Deletar -->
                            <form class="d-flex align-items-center ms-3" action="/deletar-cliente" method="POST" onsubmit="return confirm('Tem certeza que deseja deletar este cliente?');">
                                @csrf
                                <select name="id" class="form-select me-2" style="width: auto;" required>
                                    <option disabled selected>Selecionar ID</option>
                                    @foreach($clientes as $cliente)
                                        <option value="{{ $cliente->id }}">ID {{ $cliente->id }}</option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-danger">Deletar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <div class="p-3">
        <br>
        <h4>Cadastrar - Agendamento de Potenciais Clientes</h4>
        <br>
        <h6>Sistema Ultilizado para agendamento de serviços.</h6>
        <br>
        <div class="row">
            <form action="/cadastrar-cliente" method="POST">
                @csrf
                <div class="col">
                    <div class="mb-3">
                        <label class="form-label">Nome:</label>
                        <input id="name" type="text" class="form-control" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Telefone:</label>
                        <input id="tel" type="text" class="form-control" name="tel" required>
                    </div>
                    <div class="mb-3">
                        <label id="ori" class="form-label">Origem:</label>
                        <select class="form-select" name="ori" required>
                            <option>Celular</option>
                            <option>Telefone Fixo</option>
                            <option>Whatsapp</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Data do Contato:</label>
                        <input id="date" type="date" class="form-control" name="date" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Observação:</label>
                        <textarea id="obs" class="form-control" name="obs" rows="3"></textarea>
                    </div>

                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Cadastrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@if (session('success'))
    <div class="success-message">
        <strong>✅ Sucesso!</strong><br>
        {{ session('success') }}
        <br>
        <button class="btn btn-success mt-2" onclick="this.parentElement.style.display='none'">OK</button>
    </div>
@endif


</body>
</html>
