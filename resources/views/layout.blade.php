<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Lucas Lima" />

        <title>ocranno - OCR Text Annotation Tool</title>

        <link rel="shortcut icon" href="{{ asset('icon.png') }}" />
    
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

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
    
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
              
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">

                        <li class="nav-item active">
                            <a class="nav-link" href="/annotation">Annotation</a>
                        </li>

                        <li class="nav-item active">
                            <a class="nav-link" href="/login">Login</a>
                        </li>

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
            
                    <div class="col-md-6 mt-md-0 mt-3">
            
                        <h5 class="text-uppercase">About</h5>
                        <p>Ocranno it's a text annotation tool for data extracted with OCR techniques from PDF files. Developed as part of a collaboration project between Institute of Informatics from UFRGS and Petrobras.</p>
            
                    </div>
            
                    <hr class="clearfix w-100 d-md-none pb-3">
            
                    <div class="col-md-3 mb-md-0 mb-3">
            
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
            
                    <div class="col-md-3 mb-md-0 mb-3">
            
                        <h5 class="text-uppercase">Address</h5>
                        <p>Institute of Informatics, UFRGS</b><br>Av. Bento Gonçalves, 9500<br>Porto Alegre, RS, Brasil<br>91501-970</p>
            
                    </div>
            
                </div>
        
            </div>
        
        </footer>

    </body>
</html>
