<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <title>San Giorgio League</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/svg+xml" href="./immagini/logosgl.jpg" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="./style.css">
</head>
<style>
    body::before {
    content: "";
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-image: url("./immagini/logosgl.jpg");
    background-repeat: no-repeat;
    background-position: center center;
    z-index: -2;
    background-size: cover;
    object-fit: cover;
    background-attachment: scroll;
}

body::after {
    content: "";
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: -1;
}

@media (max-width: 767px) and (orientation: portrait) {
    body::before {
        background-size: 100% auto;
        min-height: 100vh;
    }
}

@media (max-width: 767px) and (orientation: landscape) {
    body::before {
        background-size: auto 100%; 
        min-width: 100vw;
    }
}

/* Regolazione desktop */
@media (min-width: 768px) {
    body::before {
        background-size: contain;
        background-color: #f8f9fa;
    }
    body::after {
        background: rgba(255,255,255,0.7);
    }
}
</style>

<body class="bg-light">

    
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top shadow">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">San Giorgio League</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    
    <div class="container">
        <div class="hero mb-4 shadow-sm">
            <h1 class="display-5">Benvenuto nella San Giorgio League</h1>
            <p class="lead mt-3">Segui tutte le partite, classifiche, notizie e risultati dei nostri tornei. Vivi la passione del calcio da protagonista!</p>
        </div>

        
        <div class="row g-3">
            <div class="col-12 col-md-6">
                <a href="partite.php" class="text-decoration-none text-dark">
                    <div class="card shadow-sm p-3">
                        <h5><i class="bi bi-calendar-event me-2"></i>Partite</h5>
                        <p class="mb-0">Scopri il calendario completo e i risultati delle partite.</p>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-6">
                <a href="Notizie.php" class="text-decoration-none text-dark">
                    <div class="card shadow-sm p-3">
                        <h5><i class="bi bi-newspaper me-2"></i>Notizie</h5>
                        <p class="mb-0">Aggiornamenti, interviste e comunicati ufficiali.</p>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-6">
                <a href="Classifica.php" class="text-decoration-none text-dark">
                    <div class="card shadow-sm p-3">
                        <h5><i class="bi bi-list-ol me-2"></i>Classifica</h5>
                        <p class="mb-0">Consulta la classifica aggiornata dei gironi.</p>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-6">
                <a href="Eventi_passati1.php" class="text-decoration-none text-dark">
                    <div class="card shadow-sm p-3">
                        <h5><i class="bi bi-clock-history me-2"></i>Eventi Passati</h5>
                        <p class="mb-0">Rivivi le competizioni concluse e i vincitori.</p>
                    </div>
                </a>
            </div>
        </div>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
