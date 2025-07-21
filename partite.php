<!DOCTYPE html>
<html lang="it">

<head>
    <title>Partite - San Giorgio League</title>
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

        @media (min-width: 768px) {
            body::before {
                background-size: contain;
                background-color: #f8f9fa;
            }

            body::after {
                background: rgba(255, 255, 255, 0.7);
            }
        }

        .squadra-logo {
            width: 30px;
            height: 30px;
            margin-right: 10px;
            vertical-align: middle;
            border-radius: 50%;
            object-fit: cover;
        }

        .squadra-nome {
            vertical-align: middle;
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

        .giornata-card {
            margin-bottom: 1rem;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            background-color: rgba(255, 255, 255, 0.85);
        }

        .giornata-header {
            background-color: #1e3a8a;
            color: white;
            padding: 12px 16px;
            font-weight: 600;
        }

        .partita-row {
            display: flex;
            align-items: center;
            padding: 12px 16px;
            border-bottom: 1px solid #e9ecef;
            transition: background-color 0.2s;
        }

        .partita-row:last-child {
            border-bottom: none;
        }

        .partita-row:hover {
            background-color: #f8f9fa;
        }

        .squadra {
            flex: 1;
            display: flex;
            align-items: center;
        }

        .squadra-casa {
            justify-content: flex-end;
            text-align: right;
        }

        .squadra-ospite {
            justify-content: flex-start;
            text-align: left;
        }

        .risultato {
            flex: 0 0 80px;
            text-align: center;
            font-weight: 700;
            font-size: 1.1rem;
        }

        .stato-partita {
            display: inline-block;
            padding: 3px 8px;
            border-radius: 4px;
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
        }

        .stato-terminata {
            background-color: #e9ecef;
            color: #6c757d;
        }

        .stato-in-corso {
            background-color: #dc3545;
            color: white;
            animation: pulse 1.5s infinite;
        }

        .stato-programmata {
            background-color: #6c757d;
            color: white;
        }

        /* Stili per il carosello */
        .carousel-giornate {
            height: 500px;
            /* Altezza fissa */
            display: flex;
            flex-direction: column;
            margin-bottom: 2rem;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .carousel-indicators {
            bottom: -40px;
        }

        .carousel-indicators button {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background-color: rgba(30, 58, 138, 0.5);
            border: none;
        }

        .carousel-indicators .active {
            background-color: #1e3a8a;
        }

        .carousel-control-prev,
        .carousel-control-next {
            width: 36px;
            height: 36px;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 50%;
            opacity: 0.8;
            border: 1px solid rgba(30, 58, 138, 0.2);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .carousel-control-prev {
            left: 15px;
        }

        .carousel-control-next {
            right: 15px;
        }

        .carousel-control-prev:hover,
        .carousel-control-next:hover {
            background-color: white;
            opacity: 1;
            transform: translateY(-50%) scale(1.05);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }


        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-image: none;
            width: 1.5rem;
            height: 1.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .carousel-control-prev-icon:after {
            content: "←";
            font-size: 1.5rem;
            color: #1e3a8a;
            font-weight: bold;
        }

        .carousel-control-next-icon:after {
            content: "→";
            font-size: 1.5rem;
            color: #1e3a8a;
            font-weight: bold;
        }

        /* Nascondi le frecce su mobile quando non serve */
        @media (max-width: 576px) {

            .carousel-control-prev,
            .carousel-control-next {
                display: none;
            }

            /* Mostra le frecce solo se ci sono più giornate */
            .carousel-giornate:hover .carousel-control-prev,
            .carousel-giornate:hover .carousel-control-next {
                display: flex;
            }
        }

        .carousel-item {
            transition: transform 0.6s ease-in-out;
        }

        /* Nuovi stili per il carosello migliorato */
        .carousel-giornate {
            height: 500px;
            /* Altezza fissa */
            display: flex;
            flex-direction: column;
        }

        .carousel-inner {
            flex: 1;
            overflow-y: auto;
            -webkit-overflow-scrolling: touch;
            scrollbar-width: none;
        }

        .carousel-item {
            height: auto;
            min-height: 100%;
        }

        /* Miglioramenti per touch screen */
        .carousel-giornate {
            touch-action: pan-y;
            /* Permette lo scrolling verticale */
        }

        .partite-container {
            flex: 1;
            overflow-y: auto;
            -webkit-overflow-scrolling: touch;
        }

        /* Nascondi la scrollbar per un look più pulito */
        .carousel-inner::-webkit-scrollbar {
            display: none;
        }

        /* Adattamento mobile */
        @media (max-width: 768px) {
            .carousel-giornate {
                height: 400px;
                /* Altezza ridotta su mobile */
            }
        }

        /* Stili aggiuntivi */
        .campionato-header {
            position: relative;
            overflow: hidden;
            border-radius: 8px 8px 0 0;
        }

        .campionato-header::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(30, 58, 138, 0.9) 0%, rgba(59, 130, 246, 0.8) 100%);
            z-index: 1;
        }

        .campionato-header-content {
            position: relative;
            z-index: 2;
            padding: 1.5rem;
            color: white;
        }

        .campionato-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .campionato-subtitle {
            font-size: 0.9rem;
            opacity: 0.9;
        }

        @keyframes pulse {
            0% {
                opacity: 1;
            }

            50% {
                opacity: 0.7;
            }

            100% {
                opacity: 1;
            }
        }

        @media (max-width: 768px) {
            .partita-row {
                padding: 10px 12px;
                font-size: 0.9rem;
            }

            .risultato {
                flex: 0 0 60px;
                font-size: 1rem;
            }

            .squadra-logo {
                width: 25px;
                height: 25px;
                margin-right: 8px;
            }

            .carousel-control-prev,
            .carousel-control-next {
                width: 30px;
                height: 30px;
            }

            .campionato-title {
                font-size: 1.3rem;
            }
        }
    </style>
</head>

<body class="bg-light">
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
        <div class="text-center mb-4 animate__animated animate__fadeInDown">
            <h1 class="display-5 fw-bold mb-3" style="
        color: #1e3a8a;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        position: relative;
        display: inline-block;
        padding-bottom: 10px;
    ">
                <span style="
            background: linear-gradient(135deg, #1e3a8a, #3b82f6);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            position: relative;
            z-index: 1;
        ">
                    Calendario Partite
                </span>
                <span style="
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: linear-gradient(90deg, #1e3a8a, #3b82f6);
            border-radius: 2px;
        "></span>
            </h1>
        </div>


        <!-- Pulsanti navigazione -->
        <div class="d-flex justify-content-center gap-3 mb-4">
            <a href="index.php" class="nav-btn home-btn">
                <i class="bi bi-house-door me-2"></i>Home
            </a>
        </div>

        <?php
        include 'connessione.php';
        include 'utility.php'; // Inclusione del file con le funzioni di utility

        $query_campionato = "SELECT campionati.ID_campionato, campionati.Nome 
                             FROM campionati 
                             WHERE campionati.ID_campionato = 2 
                             LIMIT 1";
        $result_campionato = $conn->query($query_campionato);

        if ($result_campionato->num_rows > 0) {
            $campionato = $result_campionato->fetch_assoc();
            echo '<div class="card shadow-sm mb-4 animate__animated animate__fadeIn">';
            echo '<div class="campionato-header">';
            echo '<div class="campionato-header-content text-center">';
            echo '<h2 class="campionato-title"><img src="./immagini/logosgl.jpg" alt="Logo" width="30" height="30" class="rounded-circle border me-2 me-sm-3" style="';
            echo '            transition: transform 0.3s ease;';
            echo '            box-shadow: 0 2px 8px rgba(0,0,0,0.2);';
            echo '          ">' . $campionato['Nome'] . '</h2>';
            echo '<div class="campionato-subtitle">Calendario completo delle partite</div>';
            echo '</div>';
            echo '</div>';
            echo '<div class="card-body p-0">';

            $query_giornate = "SELECT giornate.ID_giornata, giornate.Numero, giornate.Data_inizio, giornate.Data_fine 
                               FROM giornate 
                               WHERE giornate.Cod_campionato = " . $campionato['ID_campionato'] . " 
                               ORDER BY giornate.Numero";
            $result_giornate = $conn->query($query_giornate);

            if ($result_giornate->num_rows > 0) {
                // Inizio carosello
                echo '<div id="carouselGiornate" class="carousel slide carousel-giornate" data-bs-ride="false" data-bs-touch="true" data-bs-interval="false">';
                echo '<div class="carousel-inner">';

                $giornate_data = array();
                while ($giornata = $result_giornate->fetch_assoc()) {
                    $giornate_data[] = $giornata;
                }

                foreach ($giornate_data as $index => $giornata) {
                    $active = $index === 0 ? 'active' : '';

                    echo '<div class="carousel-item ' . $active . '">';
                    echo '<div class="giornata-card h-100">';
                    echo '<div class="giornata-header">';

                    // Titolo giornata (mantieni il tuo codice esistente)
                    if ($giornata['Numero'] == 3) {
                        echo '<i class="bi bi-trophy me-2"></i>Semifinali • ' . date('d/m/Y', strtotime($giornata['Data_inizio']));
                    }elseif($giornata['Numero'] == 4) {
                        echo '<i class="bi bi-trophy me-2"></i>Finale • ' . date('d/m/Y', strtotime($giornata['Data_inizio']));
                    }else{
                        echo '<i class="bi bi-calendar3 me-2"></i>Giornata ' . $giornata['Numero'] . ' • ' . date('d/m/Y', strtotime($giornata['Data_inizio']));
                    }

                    echo '</div>'; // Chiudi giornata-header

                    // Nuovo contenitore scrollabile per le partite
                    echo '<div class="partite-container">';

                    $query_partite = "SELECT partite.ID_partita, partite.Data, partite.Stato, partite.Gol_casa, partite.Gol_ospite,
                  squadre_casa.Nome AS squadra_casa, squadre_ospite.Nome AS squadra_ospite
                  FROM partite
                  JOIN squadre AS squadre_casa ON partite.Squadra_casa = squadre_casa.ID_squadre
                  JOIN squadre AS squadre_ospite ON partite.Squadra_ospite = squadre_ospite.ID_squadre
                  WHERE partite.Cod_giornata = " . $giornata['ID_giornata'] . "
                  ORDER BY partite.Data";
                    $result_partite = $conn->query($query_partite);

                    if ($result_partite->num_rows > 0) {
                        while ($partita = $result_partite->fetch_assoc()) {
                            echo '<div class="partita-row">';

                            // Squadra casa
                            echo '<div class="squadra squadra-casa">';
                            echo displaySquadraWithLogo($partita['squadra_casa'], $conn);
                            echo '</div>';

                            // Risultato/Stato
                            echo '<div class="risultato">';
                            switch ($partita['Stato']) {
                                case 'terminata':
                                    echo $partita['Gol_casa'] . ' - ' . $partita['Gol_ospite'];
                                    break;
                                case 'in corso':
                                    echo '<span class="stato-partita stato-in-corso">LIVE</span>';
                                    break;
                                case 'rinviata':
                                    echo '<span class="stato-partita stato-programmata">RINV.</span>';
                                    break;
                                default:
                                    echo '<span class="stato-partita stato-programmata">' . date('H:i', strtotime($partita['Data'])) . '</span>';
                            }
                            echo '</div>';

                            // Squadra ospite
                            echo '<div class="squadra squadra-ospite">';
                            echo displaySquadraWithLogo($partita['squadra_ospite'], $conn);
                            echo '</div>';

                            echo '</div>'; // Chiudi partita-row
                        }
                    } else {
                        echo '<div class="partita-row">';
                        echo '<div class="text-center py-3 w-100">Nessuna partita programmata</div>';
                        echo '</div>';
                    }

                    echo '</div>'; // Chiudi partite-container
                    echo '</div>'; // Chiudi giornata-card
                    echo '</div>'; // Chiudi carousel-item
                }

                // Controlli e indicatori del carosello
                if (count($giornate_data) > 1) {
                    echo '<button class="carousel-control-prev" type="button" data-bs-target="#carouselGiornate" data-bs-slide="prev">';
                    echo '<span class="carousel-control-prev-icon" aria-hidden="true"></span>';
                    echo '<span class="visually-hidden">Previous</span>';
                    echo '</button>';
                    echo '<button class="carousel-control-next" type="button" data-bs-target="#carouselGiornate" data-bs-slide="next">';
                    echo '<span class="carousel-control-next-icon" aria-hidden="true"></span>';
                    echo '<span class="visually-hidden">Next</span>';
                    echo '</button>';
                }

                echo '</div>'; // chiusura carousel-inner
                echo '</div>'; // chiusura carousel
            } else {
                echo '<div class="partita-row">';
                echo '<div class="text-center py-3 w-100">Nessuna giornata trovata</div>';
                echo '</div>';
            }

            echo '</div>'; // chiusura card-body
            echo '</div>'; // chiusura card
        } else {
            echo '<div class="alert alert-danger text-center">Nessun campionato attivo trovato</div>';
        }

        $conn->close();
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Disabilita l'autoplay e configura per touch
            var carousel = new bootstrap.Carousel(document.getElementById('carouselGiornate'), {
                interval: false, // Disabilita lo scorrimento automatico
                wrap: false, // Disabilita il loop infinito
                touch: true // Abilita il supporto touch
            });

            // Permette lo scrolling senza interferenze
            var carouselInner = document.querySelector('.carousel-inner');
            carouselInner.addEventListener('touchstart', function(e) {
                // Se stai scorrendo verticalmente, previene l'interferenza del carosello
                if (Math.abs(e.touches[0].pageX - this.startX) < Math.abs(e.touches[0].pageY - this.startY)) {
                    e.stopPropagation();
                }
            }, {
                passive: true
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const carousel = document.getElementById('carouselGiornate');
            const prevBtn = carousel.querySelector('.carousel-control-prev');
            const nextBtn = carousel.querySelector('.carousel-control-next');

            // Mostra/nascondi frecce al passaggio del mouse
            carousel.addEventListener('mouseenter', function() {
                prevBtn.style.opacity = '1';
                nextBtn.style.opacity = '1';
            });

            carousel.addEventListener('mouseleave', function() {
                prevBtn.style.opacity = '0.7';
                nextBtn.style.opacity = '0.7';
            });

            // Inizialmente le frecce sono semi-trasparenti
            prevBtn.style.opacity = '0.7';
            nextBtn.style.opacity = '0.7';
            prevBtn.style.transition = 'opacity 0.3s ease';
            nextBtn.style.transition = 'opacity 0.3s ease';
        });
    </script>

</body>

</html>