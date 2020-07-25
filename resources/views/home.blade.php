@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

@section('content')
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">Dat@_Vet Software</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto my-2 my-lg-0">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">NOSOTROS</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#services">SERVICIOS</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#portfolio">PORTAFOLIO</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">CONTACTO</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-10 align-self-end">
                    <h1 class="text-uppercase text-white font-weight-bold">Somos una solucion Inteligente a su medida</h1>
                    <hr class="divider my-4" />
                </div>
                <div class="col-lg-8 align-self-baseline">
                    <p class="text-white-75 font-weight-light mb-5">Administre usted mismo todos sus inventarios, exixtencias de productos citas facturacion e historia clinica.</p>
                    <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">En un solo Software</a>
                </div>
            </div>
        </div>
    </header>
    <!-- About-->
    <section class="page-section bg-primary" id="about">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="text-white mt-0">Tenemos lo que usted Busca!</h2>
                    <hr class="divider light my-4" />
                    <p class="text-white-50 mb-4">Comience ya mismo su implementacion gratuita!</p>
                    <a class="btn btn-light btn-xl js-scroll-trigger" href="#services">Avancemos!</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Services-->
    <section class="page-section" id="services">
        <div class="container">
            <h2 class="text-center mt-0">Su Veterinaria totalmente en Linea</h2>
            <hr class="divider my-4" />
            <div class="row">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <i class="fas fa-4x fa-gem text-primary mb-4"></i>
                        <h3 class="h4 mb-2">Inventarios</h3>
                        <p class="text-muted mb-0">Orgranizados en un solo lugar</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <i class="fas fa-4x fa-laptop-code text-primary mb-4"></i>
                        <h3 class="h4 mb-2">Facturacion</h3>
                        <p class="text-muted mb-0">Nosotros nos encargamos.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <i class="fas fa-4x fa-globe text-primary mb-4"></i>
                        <h3 class="h4 mb-2">Citas</h3>
                        <p class="text-muted mb-0">Maneje todo en un solo lugar!</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <i class="fas fa-4x fa-heart text-primary mb-4"></i>
                        <h3 class="h4 mb-2">Historias</h3>
                        <p class="text-muted mb-0">Toda la evolucion de sus pacientes!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Portfolio-->
    <div id="portfolio">
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" href="{{ asset('images/home/Data Vet(3).jpg')}}">
                        <img class="img-fluid" src="{{ asset('images/home/Data Vet(3).jpg')}}" alt="" />
                        <div class="portfolio-box-caption">
                            <div class="project-category text-white-50">Category</div>
                            <div class="project-name">Project Name</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" href="/opt/lampp/htdocs/Landing_Datavet/dist/assets/img/Data Vet(5).jpg">
                        <img class="img-fluid" src="/opt/lampp/htdocs/Landing_Datavet/dist/assets/img/Data Vet(5).jpg" alt="" />
                        <div class="portfolio-box-caption">
                            <div class="project-category text-white-50">Category</div>
                            <div class="project-name">Project Name</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" href="/opt/lampp/htdocs/Landing_Datavet/dist/assets/img/Data Vet(4).jpg">
                        <img class="img-fluid" src="/opt/lampp/htdocs/Landing_Datavet/dist/assets/img/Data Vet(4).jpg" alt="" />
                        <div class="portfolio-box-caption">
                            <div class="project-category text-white-50">Category</div>
                            <div class="project-name">Project Name</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" href="/opt/lampp/htdocs/Landing_Datavet/dist/assets/img/Data Vet(5).jpg">
                        <img class="img-fluid" src="/opt/lampp/htdocs/Landing_Datavet/dist/assets/img/Data Vet(5).jpg" alt="" />
                        <div class="portfolio-box-caption">
                            <div class="project-category text-white-50">Category</div>
                            <div class="project-name">Project Name</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" href="/opt/lampp/htdocs/Landing_Datavet/dist/assets/img/Data Vet(6).jpg">
                        <img class="img-fluid" src="/opt/lampp/htdocs/Landing_Datavet/dist/assets/img/Data Vet(6).jpg" alt="" />
                        <div class="portfolio-box-caption">
                            <div class="project-category text-white-50">Category</div>
                            <div class="project-name">Project Name</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" href="/opt/lampp/htdocs/Landing_Datavet/dist/assets/img/Data Vet(3).jpg">
                        <img class="img-fluid" src="/opt/lampp/htdocs/Landing_Datavet/dist/assets/img/Data Vet(3).jpg" alt="" />
                        <div class="portfolio-box-caption p-3">
                            <div class="project-category text-white-50">Category</div>
                            <div class="project-name">Project Name</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Call to action-->
    <section class="page-section bg-dark text-white">
        <div class="container text-center">
            <h2 class="mb-4">Descargalo Aca!</h2>
            <a class="btn btn-light btn-xl" href="https://startbootstrap.com/themes/creative/">Descarga</a>
        </div>
    </section>
    <!-- Contact-->
    <section class="page-section" id="contact">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="mt-0">CONTACTO</h2>
                    <hr class="divider my-4" />
                    <p class="text-muted mb-5">Estamos listo para resolver cualquier duda o consulta.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
                    <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
                    <div>+1 (350) 2445417</div>
                </div>
                <div class="col-lg-4 mr-auto text-center">
                    <i class="fas fa-envelope fa-3x mb-3 text-muted"></i>
                    <!-- Make sure to change the email address in BOTH the anchor text and the link target below!-->
                    <a class="d-block" href="mailto:contacto@datavet.co">contacto@datavet.co</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="bg-light py-5">
        <div class="container"><div class="small text-center text-muted">Copyright © 2020 - Dat@_Vet</div></div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
    <!-- Third party plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <!-- Core theme JS-->
<script src="js/scripts.js"></script>

@endsection
