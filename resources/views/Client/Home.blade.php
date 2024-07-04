<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Mon Loyer</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/favicons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicons/favicon-16x16.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicons/favicon.ico') }}">
    <link rel="manifest" href="{{ asset('assets/img/favicons/manifest.json') }}">
    <meta name="msapplication-TileImage" content="{{ asset('assets/img/favicons/mstile-150x150.png') }}">
    <meta name="theme-color" content="#ffffff">


    <link href="{{ asset('assets/css/theme.css') }}" rel="stylesheet" />

</head>

<body>
    <main class="main" id="top">
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 d-block" data-navbar-on-scroll="data-navbar-on-scroll">
            <div class="container"><a class="navbar-brand" href="index.html"><img class="d-inline-block" src="{{ asset('assets/img/gallery/logo.png') }}" width="50" alt="logo" /><span class="fw-bold text-primary ms-2">MADA-IMMO</span></a>
                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto pt-2 pt-lg-0 font-base">
                    </ul>
                    <form>
                    </form>
                </div>
            </div>
        </nav>
        <section class="mt-7 py-0">
            <div class="bg-holder w-50 bg-right d-none d-lg-block" style="background-image:url({{ asset('assets/img/gallery/1.png') }});">
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-lg-6 py-5 py-xl-5 py-xxl-7">
                        <h1 class="display-3 text-1000 fw-normal">Locations</h1>
                        <h1 class="display-3 text-primary fw-bold">Loyer a payer</h1>
                        <div class="pt-5">
                            <nav>
                                    
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <form class="row g-4 mt-5" action="{{route('loyer')}}" method="post">

                                            <div class="col-sm-6 col-md-6 col-xl-5">
                                                <label for="">Debut</label>
                                                <div class="input-group-icon">
                                                    <input class="form-control input-box form-voyage-control" name="debut" id="inputdateOne" type="date" /><span class="nav-link-icon text-800 fs--1 input-box-icon"><i class="fas fa-calendar"></i></span>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-xl-5">
                                                <label for="">Fin</label>
                                                <div class="input-group-icon">
                                                    <input class="form-control input-box form-voyage-control" name="fin" id="inputDateTwo" type="date" /><span class="nav-link-icon text-800 fs--1 input-box-icon"><i class="fas fa-calendar"></i></span>
                                                </div>
                                            </div>

                                            <div class="col-12 col-xl-10 col-lg-12 d-grid mt-6">
                                                <button class="btn btn-secondary" type="submit">Voir mon loyer</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- end of .container-->

        </section>
        <!-- <section> close ============================-->
        <!-- ============================================-->


    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->




    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="{{ asset('vendors/@popperjs/popper.min.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendors/is/is.min.js') }}"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="{{ asset('vendors/fontawesome/all.min.js') }}"></script>
    <script src="{{ asset('assets/js/theme.js') }}"></script>

    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@300;400;600;700&amp;display=swap" rel="stylesheet">
</body>

</html>
