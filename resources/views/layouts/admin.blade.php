<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
       
        <title>{{ config('app.name', 'Immobilier Bénin') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="icon" type="image/x-icon" href="{{ asset('/img/logo.ico')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
        <meta name='description'
            content="site web d'annonces gratuites de vente et location de biens immobiliers au benin" />
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <link href="{{ asset('css/main.css') }}" rel="stylesheet" />
     
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                <section id='app'>
                {{ $slot }}
                admin
                </section>
            </main>

            <!-- Footer Start -->
            <footer class="footer">
                <div class="footer__items">
                                <div class="footer__items__item">
                                    <h4>
                                        Contact
                                    </h4>

                                    <ul>
                                        <li>
                                        <i class="bi bi-phone"></i> +229 96 66 36 44
                                        </li>

                                        <li>
                                        <i class="bi bi-whatsapp"></i> +229 96 66 36 44
                                        </li>

                                        <li>
                                        <i class="bi bi-envelope"></i> contact@immobilierbenin.com
                                        </li>

                                        <li>
                                        <i class="bi bi-facebook"></i>  Immobilier Bénin
                                        </li>
                                    </ul>
                                </div>

                                <div class="footer__items__item">
                                    <h4>
                                        Liens
                                    </h4>

                                    <ul>
                                        <li>
                                            <a href="{{ url('/')}}">Accueil</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/account')}}">Mon compte</a>
                                        </li>

                                        <li>
                                            <a href="{{ url('/ads')}}">Annonces</a>
                                        </li>

                                        <li>
                                            <a href="{{ url('/advertisers')}}">Annonceurs</a>
                                        </li>
                                        
                                        <li>
                                            <a href="">FAQ</a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="footer__items__item">
                                    <h4>
                                    Notre entreprise
                                    </h4>

                                    <ul>
                                        <li><a href="{{ url('/contact')}}">Contact</a></li>
                                        <li><a href="{{ url('/about')}}">Qui sommes nous ?</a></li>
                                        <li><a href="{{ url('/home#about')}}">Nos services</a></li>
                                        <li><a href="{{ url('/cgv')}}">Conditions générales</a></li>
                                        <li><a href="{{ url('/terms')}}">Politique de confidentialité</a></li>
                                    </ul>
                                </div>

                                <div class="footer__items__item">
                                    <h4>
                                        Gallerie 
                                    </h4>
                                    <div class="footer__gallery">
                                        <img src="{{ url('img/home1.jpeg')}}" alt="annonces gratuites au Bénin">
                                        <img src="{{ url('img/home2.jpeg')}}" alt="Immobilier Bénin">
                                        <img src="{{ url('img/home3.jpeg')}}" alt="Louer et vendre au Bénin">
                                        <img src="{{ url('img/terrain.jpg')}}" alt="Acheter maison au Bénin">
                                        <img src="{{ url('img/magasin3.jpg')}}" alt="Louer appartement au Bénin">
                                        <img src="{{ url('img/home5.jpeg')}}" alt="Agence immobilière Bénin">
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <div class="footer__bottom">
                                <div class="text text-center">
                                    <p class="text-center">
                                    © Immobilier Bénin, 2024, Tous droits réservés <br>
                                Built with blood, sweat and tears by <strong>Codeur Créatif</strong>
                                    </p>
                                </div>
                </div>
            </footer>
            <!-- Footer End -->


            <!-- Back to Top -->
            <a href="#app" class="btn btn-lg btn-blue btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

            <!-- JavaScript Libraries -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
            <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
            
            <!-- Template Javascript -->
            <script src="public/js/main.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
                
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
