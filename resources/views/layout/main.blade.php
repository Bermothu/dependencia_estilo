
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="home.css" media="screen" />
    <!-- <link rel="stylesheet" href="/css/welcome.css"> -->

    
    <link rel="stylesheet" href="/css/teste.css">

    <!-- Fontes do Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
    
    <!-- Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Icones -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <title>@yield('title')</title>

</head>

<body>
    <!-- -------------------------------  Cabeçalho  -------------------------------  -->
    <header>
        <div class="logo">
            <span>S</span>
            <h1>Simplifica Med</h1>
        </div>
        <nav class="d-flex justify-content-end align-items-center">
            <ul class="nav me-3">
                <!-- Usuário logado -->
                @if(!empty(Auth::user()))
                    <li class="nav-item"><a href="{{route('home')}}" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="{{ route('agenda') }}" class="nav-link">Agendamento</a></li>
                    @if(Auth::user()->permission_level == 1)
                        <li class="nav-item"><a href="{{route('profissionals')}}" class="nav-link">Profissionais</a></li>  
                    @endif
                    <li class="nav-item"><a href="{{route('consultas')}}" class="nav-link">Consultas</a></li>
                @endif
                <!-- Usuário Deslogado -->
                @if(empty(Auth::user()))
                    <li class="nav-item"><a href="{{route('registro')}}" class="nav-link hover">Registrar</a></li>
                @endif
            </ul> 

            @if(!empty(Auth::user()))
                <div class="user-icon">
                    <a href="{{route('profile')}}" class="text-decoration-none">
                        <i class="fas fa-user"></i>
                    </a>
                </div>
            @endif
        </nav>

    </header>

    @yield('content')

    <!-- -------------------------------  Rodapé  -------------------------------  -->
    <footer class="text-white py-4">
    <div class="container d-flex flex-column align-items-center" id="box-footer">
        <!-- Links das redes sociais -->
        <div class="social-links mb-3">
            <a href="#" class="btn btn-outline-light btn-sm me-2">
                <i class="fab fa-facebook-f"></i> Facebook
            </a>
            <a href="#" class="btn btn-outline-light btn-sm me-2">
                <i class="fab fa-instagram"></i> Instagram
            </a>
            <a href="#" class="btn btn-outline-light btn-sm">
                <i class="fab fa-whatsapp"></i> WhatsApp
            </a>
        </div>

        <!-- Copyright -->
        <div class="sub-footer text-center">
            <p class="m-0">&copy; 2024 SimplificaMed. Todos os direitos reservados.</p>
        </div>
    </div>
</footer>

<!-- -------------------------------  Formulário de login  -------------------------------  -->


</body>
</html>