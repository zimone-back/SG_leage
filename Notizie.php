<!DOCTYPE html>
<html lang="it">

<head>
    <title>Notizie - San Giorgio League</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/svg+xml" href="./immagini/logosgl.jpg" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="./style.css">
    <style>
        body {
            padding-top: 70px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
        }

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
            opacity: 0.3;
        }

        body::after {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: -1;
            background-color: rgba(255, 255, 255, 0.7);
        }

        .nav-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 8px 12px;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.2s ease;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .home-btn {
            background-color: #1e3a8a;
            color: white;
        }

        .news-container {
            background-color: rgba(255, 255, 255, 0.85);
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
        }

        .news-header {
            background: linear-gradient(135deg, #1e3a8a, #2c4fa6);
            color: white;
            padding: 1rem;
            margin-bottom: 1.5rem;
        }

        .news-card {
            border-left: 4px solid #1e3a8a;
            transition: all 0.3s ease;
            margin-bottom: 1.5rem;
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .news-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .news-card-header {
            background-color: #f8f9fa;
            padding: 1rem;
            border-bottom: 1px solid #e9ecef;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .news-date {
            color: #6c757d;
            font-size: 0.9rem;
        }

        .news-card-body {
            padding: 1.5rem;
        }

        .news-title {
            color: #1e3a8a;
            margin-bottom: 1rem;
            font-weight: 600;
        }

        .news-content {
            color: #495057;
            line-height: 1.6;
        }

        .news-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-bottom: 1px solid #e9ecef;
        }

        .no-news {
            text-align: center;
            padding: 2rem;
            color: #6c757d;
        }

        @media (max-width: 768px) {
            .news-card {
                margin-bottom: 1rem;
            }

            .news-card-body {
                padding: 1rem;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top shadow" style="
    background: rgba(30, 58, 138, 0.8);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    border-bottom: 1px solid rgba(255,255,255,0.1);
">
    <div class="container">
        <a class="navbar-brand fw-bold d-flex align-items-center" href="#">
            <img src="./immagini/logosgl.jpg" alt="Logo" width="30" height="30" class="rounded-circle me-2">
            San Giorgio League
        </a>
        
        <!-- Bottone hamburger -->
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            <span class="ms-2 d-none d-sm-inline text-white">Menu</span>
        </button>

        <!-- Menu a tendina mobile -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="d-lg-none mt-2">
                <div class="dropdown-menu-mobile p-0">
                    <a href="Notizie.php" class="dropdown-item-mobile text-decoration-none">
                        <i class="bi bi-newspaper"></i> Notizie
                    </a>
                    <a href="partite.php" class="dropdown-item-mobile text-decoration-none">
                        <i class="bi bi-calendar-event"></i> Calendario
                    </a>
                    <a href="Classifica.php" class="dropdown-item-mobile text-decoration-none">
                        <i class="bi bi-list-ol"></i> Classifica
                    </a>
                    <a href="Eventi_passati.php" class="dropdown-item-mobile text-decoration-none">
                        <i class="bi bi-clock-history"></i> Eventi Passati
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>

<!-- Aggiungi questo stile nella sezione <style> del tuo head -->
<style>
    /* Stili per il menu mobile */
    .dropdown-menu-mobile {
        background-color: rgba(30, 58, 138, 0.95);
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        overflow: hidden;
    }
    
    .dropdown-item-mobile {
        display: block;
        padding: 12px 16px;
        color: white;
        transition: all 0.2s ease;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }
    
    .dropdown-item-mobile:last-child {
        border-bottom: none;
    }
    
    .dropdown-item-mobile:hover {
        background-color: rgba(255, 255, 255, 0.1);
        padding-left: 20px;
    }
    
    .dropdown-item-mobile i {
        margin-right: 10px;
        width: 20px;
        text-align: center;
    }
    
    /* Miglioramenti per il toggler */
    .navbar-toggler {
        border: none;
        padding: 8px 12px;
    }
    
    .navbar-toggler:focus {
        box-shadow: none;
    }
    
    /* Animazione per l'icona hamburger */
    .navbar-toggler.collapsed .navbar-toggler-icon {
        transition: transform 0.3s ease;
    }
    
    .navbar-toggler:not(.collapsed) .navbar-toggler-icon {
        transform: rotate(90deg);
    }
</style>

    <div class="container mt-4">
        <h1 class="text-center mb-5 position-relative animate__animated animate__fadeInDown" style="
    font-size: 2.8rem;
    font-weight: 800;
    background: linear-gradient(90deg, #1e3a8a, #3b82f6);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    text-shadow: 0 2px 4px rgba(0,0,0,0.1);
    padding-bottom: 15px;
">
            <span class="position-absolute bottom-0 start-50 translate-middle-x" style="
        content: '';
        width: 80px;
        height: 4px;
        background: linear-gradient(90deg, #3b82f6, #1e3a8a);
        border-radius: 2px;
    "></span>
            Ultime Notizie
        </h1>

        <!-- Pulsanti navigazione -->
        <div class="d-flex justify-content-center gap-3 mb-4">
            <a href="index.php" class="nav-btn home-btn">
                <i class="bi bi-house-door me-2"></i>Home
            </a>
        </div>

        <div class="news-container animate__animated animate__fadeIn">
            <div class="news-header">
                <h2><i class="bi bi-newspaper me-2"></i>Novità e Aggiornamenti</h2>
            </div>

            <div class="container py-3">
                <!-- Messaggio di benvenuto -->
                <div class="news-card animate__animated animate__fadeIn">
                    <div class="news-card-header">
                        <span class="news-date"><i class="bi bi-calendar me-1"></i><?php echo date('d F Y'); ?></span>
                        <span class="badge bg-primary">Benvenuto</span>
                    </div>
                    <div class="news-card-body">
                        <h3 class="news-title">Benvenuti nella San Giorgio League 2025</h3>
                        <div class="news-content">
                            <p>La San Giorgio League è lieta di darti il benvenuto nella stagione 2025!</p>
                            <p>Qui troverai tutte le ultime notizie, aggiornamenti e comunicati ufficiali relativi al nostro torneo.</p>
                            <p>Segui la tua squadra del cuore, scopri i risultati delle partite e rimani aggiornato su tutte le novità della competizione.</p>
                            <p>Buona navigazione e che vinca il migliore!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>