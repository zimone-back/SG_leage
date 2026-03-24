<?php
// Costanti di configurazione: navbar, opzioni in basso, sponsor
const BOTTOM_TABS = [
    ['id' => 'partite', 'label' => 'Partite', 'icon' => '⚽'],
    ['id' => 'notizie', 'label' => 'Notizie', 'icon' => '📰'],
    ['id' => 'classifica', 'label' => 'Classifica', 'icon' => '🏆'],
];

// Dati sponsor
$sponsors = [
    [
        'image' => 'immagini/sponsor1.JPG',
        'title' => 'Ringraziamo Acme Sports',
        'message' => 'Per aver reso possibile questo torneo con il loro supporto logistico e finanziario.',
    ],
    [
        'image' => 'immagini/sponsor2.jpeg',
        'title' => 'Un grazie speciale a BallMaster',
        'message' => 'Per aver fornito palloni e attrezzature di alta qualità per tutte le partite.',
    ],
    [
        'image' => 'immagini/sponsor3.jpeg',
        'title' => 'Apprezziamo GoalZone',
        'message' => 'Per la promozione del calcio locale e il sostegno alla comunità sportiva.',
    ],
];
?>
<!doctype html>
<html lang="it">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Serie A - Sangiorgio League</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #000; color: #fff; }
        .app { min-height: 100vh; display: flex; flex-direction: column; }
        .topbar { display: flex; align-items: center; justify-content: space-between; padding: 12px; background: #101010; border-bottom: 1px solid #333; }
        .topbar .brand { display: flex; align-items: center; gap: 8px; font-size: 1.1rem; font-weight: 700; }
        .topbar .brand span { font-size: .85rem; color: #8f8; }
        .content { flex: 1; overflow-y: auto; padding: 12px; }
        .block { margin-bottom: 12px; border-radius: 16px; overflow: hidden; background: #121212; border: 1px solid #333; }
        .block img { width: 100%; display: block; aspect-ratio: 16/9; object-fit: cover; }
        .block .text { padding: 10px; }
        .block .title { font-size: 1rem; font-weight: 700; margin-bottom: 4px; }
        .block .subtitle { font-size: .86rem; color: #ccc; }
        .grid { display: grid; gap: 10px; }
        .bottom-tabs { position: sticky; bottom: 0; display: flex; background: rgba(15,15,15,.96); border-top: 1px solid #222; }
        .bottom-tabs button { flex: 1; border: 0; background: transparent; color: #aaa; padding: 9px 4px; font-size: .75rem; display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 3px; }
        .bottom-tabs button.active { color: #fff; font-weight: 700; }
        .toast { position: fixed; inset: 0; background: rgba(0,0,0,.7); display: flex; align-items: center; justify-content: center; z-index: 30; }
        .toast .card { background: #111; border: 1px solid #444; border-radius: 14px; padding: 16px; width: min(92vw, 360px); }
        .toast .card p { margin-bottom: 12px; color: #ddd; font-size: .95rem; }
        .toast .card button { margin-right: 8px; padding: 9px 12px; border: none; border-radius: 8px; font-weight: 700; }
        .toast .card button.accept { background: #2a9d2f; color: #fff; }
        .splash { position: fixed; inset: 0; display: flex; align-items: center; justify-content: center; background: #000; z-index: 90; color: #fff; font-size: 1.2rem; letter-spacing: .5px; }
        .hidden { display: none !important; }
        .hidden-while { visibility: hidden; }
    </style>
</head>
<body>
<div class="app">
    <!-- Navbar top -->
    <header class="topbar">
        <div class="brand">San Giorgio League</div>
        <div>🏆</div>
    </header>

    <!-- Contenuto principale -->
    <main id="mainContent" class="content hidden-while">
        <h2 style="padding:8px 0 4px; font-size:1rem;">I nostri sponsor</h2>
        <div class="grid">
            <?php foreach ($sponsors as $sponsor) : ?>
                <article class="block">
                    <img src="<?php echo htmlspecialchars($sponsor['image']); ?>" alt="<?php echo htmlspecialchars($sponsor['title']); ?>">
                    <div class="text">
                        <div class="title"><?php echo htmlspecialchars($sponsor['title']); ?></div>
                        <div class="subtitle"><?php echo htmlspecialchars($sponsor['message']); ?></div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </main>

    <!-- Bottom tabs -->
    <nav class="bottom-tabs" id="bottomTabs">
        <?php foreach (BOTTOM_TABS as $tab) : ?>
            <button data-id="<?php echo htmlspecialchars($tab['id']); ?>">
                <span><?php echo $tab['icon']; ?></span>
                <span><?php echo htmlspecialchars($tab['label']); ?></span>
            </button>
        <?php endforeach; ?>
    </nav>
</div>

<div id="splash" class="splash">Caricamento in corso…</div>
<div id="cookieToast" class="toast hidden">
    <div class="card">
        <p>Questo sito usa cookie per migliorare l'esperienza. Accetti l'utilizzo dei cookie?</p>
        <button class="accept" id="acceptCookies">Accetta</button>
        <button id="denyCookies">Rifiuta</button>
    </div>
</div>

<script>
    const splash = document.getElementById('splash');
    const cookieToast = document.getElementById('cookieToast');
    const mainContent = document.getElementById('mainContent');
    const bottomTabs = document.getElementById('bottomTabs');

    function showMain() {
        splash.classList.add('hidden');
        mainContent.classList.remove('hidden-while');
    }

    function setActiveTab(tabId) {
        bottomTabs.querySelectorAll('button').forEach(btn => {
            btn.classList.toggle('active', btn.dataset.id === tabId);
        });
        // Per ora la sola tab cambia solo testo; in un'app reale qui carico dati specifici
        if (tabId === 'notizie') {
            document.getElementById('mainContent').scrollIntoView({behavior:'smooth'});
        }
    }

    document.querySelectorAll('#bottomTabs button').forEach(button => {
        button.addEventListener('click', () => {
            setActiveTab(button.dataset.id);
        });
    });

    document.getElementById('acceptCookies').addEventListener('click', () => {
        localStorage.setItem('cookieAccepted', '1');
        cookieToast.classList.add('hidden');
    });
    document.getElementById('denyCookies').addEventListener('click', () => {
        localStorage.setItem('cookieAccepted', '0');
        cookieToast.classList.add('hidden');
    });

    window.addEventListener('load', () => {
        setTimeout(() => {
            showMain();
            const accepted = localStorage.getItem('cookieAccepted');
            if (accepted === null) {
                cookieToast.classList.remove('hidden');
            }
            setActiveTab('notizie');
        }, 1100);
    });
</script>
</body>
</html>
