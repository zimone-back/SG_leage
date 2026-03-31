<?php
// pagina notizie del torneo
$news = [
    [
        'titolo' => 'Presentazione Ufficiale del Torneo',
        'data' => '2024-02-01',
        'immagine' => 'immagini/torneo1.jpg',
        'testo' => 'La nuova edizione della Sangiorgio League sta per iniziare! Le squadre si stanno preparando per un torneo ricco di emozioni e spettacolo.'
    ],
    [
        'titolo' => 'Regole e Struttura del Torneo',
        'data' => '2024-02-05',
        'immagine' => 'immagini/regole.jpg',
        'testo' => 'Il torneo sarà composto da una fase a gironi e una fase finale a eliminazione diretta. Ogni partita assegnerà 3 punti alla vittoria, 1 al pareggio e 0 alla sconfitta.'
    ],
    [
        'titolo' => 'Calendario delle Partite',
        'data' => '2024-02-10',
        'immagine' => 'immagini/calendario.jpg',
        'testo' => 'Il calendario completo è stato pubblicato e include tutte le partite suddivise per giornata.'
    ],
];
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notizie Torneo - Sangiorgio League</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body { background: #000; color: #fff; font-family: Arial, sans-serif; padding: 20px; }
        .news-container { display: flex; flex-direction: column; gap: 20px; }
        .news-item { background: #111; border: 1px solid #333; border-radius: 12px; overflow: hidden; }
        .news-item img { width: 100%; height: 180px; object-fit: cover; }
        .news-content { padding: 15px; }
        .news-title { font-size: 1.2rem; font-weight: bold; margin-bottom: 6px; }
        .news-date { font-size: 0.85rem; color: #aaa; margin-bottom: 10px; }
        .news-text { font-size: 0.95rem; color: #ddd; }
    </style>
</head>
<body>
    <h1>📰 Notizie sul Torneo</h1>
    <div class="news-container">
        <?php foreach ($news as $item): ?>
            <article class="news-item">
                <img src="<?= $item['immagine'] ?>" alt="<?= $item['titolo'] ?>">
                <div class="news-content">
                    <div class="news-title"><?= $item['titolo'] ?></div>
                    <div class="news-date">Pubblicato il <?= $item['data'] ?></div>
                    <div class="news-text"><?= $item['testo'] ?></div>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</body>
</html>
