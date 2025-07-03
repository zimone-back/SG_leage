<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <title>San Giorgio League</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="./style.css">
</head>

<body class="bg-light">

    
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top shadow">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">San Giorgio League</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="partite.php">Partite</a></li>
                    <li class="nav-item"><a class="nav-link" href="Notizie.php">Notizie</a></li>
                    <li class="nav-item"><a class="nav-link" href="Classifica.php">Classifica</a></li>
                    <li class="nav-item"><a class="nav-link" href="Eventi_passati.php">Eventi Passati</a></li>
                </ul>
            </div>
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
                <a href="Eventi_passati.php" class="text-decoration-none text-dark">
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
