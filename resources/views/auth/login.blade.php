@extends('layout.main')

@section('title', 'Acesso - SimplificaMed')

@section('content')

    <div class="box-login">

        <div class="login-form">
            <div id="icon-login">
                <!-- <h1 class="mb-4">Simplifica Med</h1> -->
                    <nav class="mb-4" id="icon-login">
                        <a href="#">
                        </a>
                    </nav>


                    @if ($errors->any())
                    <div class="alert alert-danger mt-3">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if(session('success'))
                    <div class="alert alert-success mt-3">
                        {{ session('success') }}
                    </div>
                @endif
            </div>

                <main class="d-flex justify-content-center align-items-center w-100" id="centralizar">


                    <form action="{{ route('perfil_login') }}" method="POST" class="bg-white p-4 rounded shadow w-100 w-md-50">
                        @csrf
                        <h2 class="text-center mb-4">Entrar</h2>
                        <div class="mb-3" id="border-credenciais">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Insira o e-mail" required>
                        </div>
                        <div class="mb-3" id="border-credenciais">
                            <label for="password" class="form-label">Senha</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Insira a senha" required>
                        </div>

                        <a href="#" class="d-block text-primary mt-1">Esqueceu a senha?</a>
                        
                        <button type="submit" class="btn btn-primary w-100">Entrar</button>
                    </form>
                </main>
        </div>
    </div>

@endsection