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
        </div>
    </nav>

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