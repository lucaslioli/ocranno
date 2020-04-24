<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Lucas Lima" />

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>OCRAnno - Annotation</title>

        <link rel="shortcut icon" href="{{ asset('icon.png') }}" />

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/layout.css') }}" rel="stylesheet">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        @yield('include')
        
    </head>
    <body>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-gray">
            <div class="container justify-content-between">
                <div>
                    <a class="navbar-brand" href="/">
                        <img src="{{ asset('logo.png') }}" alt="logo">
                    </a>
                    <span class="navbar-text">
                       OCR Text Annotation Tool
                    </span>
                </div>
    
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
              
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item {{ Request::is('annotations.create') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('annotations.create') }}">Annotation</a>
                            </li>

                            <li class="nav-item {{ Request::is('annotations.index') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('annotations.index') }}">My annotations</a>
                            </li>

                            @can('id-admin')
                                <li class="nav-item {{ Request::is('sentences') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('sentences.index') }}">Sentences</a>
                                </li>

                                <li class="nav-item {{ Request::is('pages') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('pages.index') }}">Pages</a>
                                </li>

                                <li class="nav-item {{ Request::is('project') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('project.index') }}">Project</a>
                                </li>

                                <li class="nav-item {{ Request::is('users') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('users.index') }}">Users</a>
                                </li>
                            @endcan

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"   aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest

                    </ul>
                </div>
            </div>
        </nav>

        <!-- Content -->
        <div class="content">

            @yield('content')

        </div>

        <!-- Footer -->
        <footer class="footer font-small bg-gray pt-4">

            <div class="container">
        
                <div class="row">
            
                    <div class="col-md-4">
            
                        <h5 class="text-uppercase">About</h5>
                        <p>OCRAnno is a text annotation tool designed to provide annotated data to improve the results of OCR systems. 
                        OCRAnno is being developed as part of a collaboration between the Institute of Informatics at UFRGS and Petrobras.</p>
            
                    </div>
            
                    <div class="col-md-2">
            
                        <h5 class="text-uppercase">Links</h5>
                
                        <ul class="list-unstyled">
                            <li>
                                <a href="https://github.com/lucaslioli/ocranno" target="_blank">Github</a>
                            </li>
                            <li>
                                <a href="http://inf.ufrgs.br" target="_blank">Institute of Informatics</a>
                            </li>
                            <li>
                                <a href="http://ufrgs.br" target="_blank">UFRGS</a>
                            </li>
                            <li>
                                <a href="https://petrobras.com.br/" target="_blank">Petrobras</a>
                            </li>
                        </ul>
            
                    </div>

                    <div class="col-md-3">

                        <h5>&nbsp;</h5>
                        
                        <div class="d-flex">
                            <div class="logo">
                                <img src="{{ asset('images/logo-ppgc.png') }}" alt="Logo PPGC">
                            </div>
                            <div class="logo">
                                <img src="{{ asset('images/logo-ufrgs.png') }}" alt="Logo UFRGS">
                            </div>
                            <div class="logo">
                                <img src="{{ asset('images/logo-petrobras.png') }}" alt="Logo Petrobras">
                            </div>
                        </div>
                        
                    </div>
            
                    <div class="col-md-3">
            
                        <h5 class="text-uppercase">Address</h5>
                        <p>Institute of Informatics, UFRGS</b><br>Av. Bento Gonçalves, 9500<br>Porto Alegre, RS, Brasil<br>91501-970</p>
            
                    </div>
            
                </div>
        
            </div>
        
        </footer>

        @yield('scripts')

    </body>
</html>
