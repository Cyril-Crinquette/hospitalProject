<!------------------ ------------------------------ Header  ------------------------------------------------- -->

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hôpital des 4 chênes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/assets/css/style.css">
    <!-- Chargement de la feuille de style commune aux différentes pages -->
    <link rel="stylesheet" href="/public/assets/css/css_home/style.css">
    <!-- Chargement de la feuille de style correspondant à la page d'accueil -->
</head>
<body>
    
    <header>
        <!---------------------------------------- Navigation----------------------------------------------------- -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <div class="container">
                <a class="navbar-brand" href="/accueil">Hôpital des 4 chênes</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="/accueil">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/accueil">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/accueil">A propos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/accueil">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- ------------------------------------------------------------------------------------------------------ -->
        <!-------------------------------------------- Header video------------------------------------------------ -->
            <div class="overlay"></div>
            <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
                <source src="https://storage.googleapis.com/coverr-main/mp4/Mt_Baker.mp4" type="video/mp4">
            </video>
            <div class="container h-100">
                <div class="d-flex h-100 text-center align-items-center">
                    <div class="w-100 text-white">
                        <h1 class="display-3">Bienvenue sur le site de notre hôpital</h1>
                        <p class="lead mb-0">Nous faisons de votre santé notre priorité</p>
                    </div>
                </div>
            </div>
            <!-- --------------------------------------------------------------------------------------------------- -->
        </header>

        