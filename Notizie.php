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
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .home-btn {
            background-color: #1e3a8a;
            color: white;
        }
        
        .news-container {
            background-color: rgba(255, 255, 255, 0.85);
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
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
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        
        .news-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
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
        <h1 class="text-center mb-4 animate__animated animate__fadeInDown">Ultime Notizie</h1>
        
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
                <!-- Notizia 1 -->
                <div class="news-card animate__animated animate__fadeIn">
                    <img src="./immagini/news1.jpg" alt="Immagine notizia" class="news-image">
                    <div class="news-card-header">
                        <span class="news-date"><i class="bi bi-calendar me-1"></i>10 Luglio 2025</span>
                        <span class="badge bg-primary">Aggiornamento</span>
                    </div>
                    <div class="news-card-body">
                        <h3 class="news-title">Finale del Torneo: San Giorgio vs Al Baretto</h3>
                        <div class="news-content">
                            <p>Dopo un'emozionante stagione, le due squadre si sfideranno nella finale del torneo il prossimo 24 luglio. La partita promette di essere un vero spettacolo, con entrambe le squadre in ottima forma.</p>
                            <p>Il capitano del San Giorgio, Paolo Serafino, ha dichiarato: "Siamo pronti a dare tutto in campo per portare a casa il trofeo".</p>
                        </div>
                    </div>
                </div>
                
                <!-- Notizia 2 -->
                <div class="news-card animate__animated animate__fadeIn">
                    <div class="news-card-header">
                        <span class="news-date"><i class="bi bi-calendar me-1"></i>5 Luglio 2025</span>
                        <span class="badge bg-success">Nuovo</span>
                    </div>
                    <div class="news-card-body">
                        <h3 class="news-title">Classifica Marcatori Aggiornata</h3>
                        <div class="news-content">
                            <p>Ecco la top 3 dei marcatori del torneo:</p>
                            <ol>
                                <li>Serafino (San Giorgio) - 9 gol</li>
                                <li>Borgo (Al Baretto) - 6 gol</li>
                                <li>Rossini (74023 FC) - 6 gol</li>
                            </ol>
                            <p>La competizione per il titolo di capocannoniere è ancora aperta con due partite rimanenti!</p>
                        </div>
                    </div>
                </div>
                
                <!-- Notizia 3 -->
                <div class="news-card animate__animated animate__fadeIn">
                    <img src="./immagini/news2.jpg" alt="Immagine notizia" class="news-image">
                    <div class="news-card-header">
                        <span class="news-date"><i class="bi bi-calendar me-1"></i>1 Luglio 2025</span>
                        <span class="badge bg-info">Evento</span>
                    </div>
                    <div class="news-card-body">
                        <h3 class="news-title">Festa del Calcio San Giorgio League</h3>
                        <div class="news-content">
                            <p>Il 15 luglio si terrà la tradizionale festa di fine stagione presso lo stadio comunale. Tutti i tifosi sono invitati a partecipare per celebrare insieme una stagione indimenticabile.</p>
                            <p>Programma della serata:</p>
                            <ul>
                                <li>18:00 - Apertura cancelli</li>
                                <li>19:00 - Esibizione delle squadre giovanili</li>
                                <li>20:30 - Premiazioni ufficiali</li>
                                <li>21:30 - Buffet e musica</li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <!-- Notizia 4 -->
                <div class="news-card animate__animated animate__fadeIn">
                    <div class="news-card-header">
                        <span class="news-date"><i class="bi bi-calendar me-1"></i>28 Giugno 2025</span>
                        <span class="badge bg-warning text-dark">Importante</span>
                    </div>
                    <div class="news-card-body">
                        <h3 class="news-title">Nuovo Sponsor Ufficiale</h3>
                        <div class="news-content">
                            <p>La San Giorgio League è lieta di annunciare la partnership con "Beauty Car Autolavaggio" come nuovo sponsor ufficiale del torneo.</p>
                            <p>"Siamo entusiasti di supportare questo fantastico torneo e la comunità locale", ha dichiarato il proprietario dell'autolavaggio.</p>
                            <p>Lo sponsor apparirà sulle maglie delle squadre a partire dalla prossima stagione.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>