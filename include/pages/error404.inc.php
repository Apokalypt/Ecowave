<?php
// Redirection if direct access <=> session not active
if (session_status() !== PHP_SESSION_ACTIVE) {
    header('Location:../../?page=error404');
    exit();
} ?>

<link rel="stylesheet" type="text/css" href="css/style_404.css">

<main>
    <article>
        <div class="content">
            <h1 class="text" data-text="ERROR 404">ERROR 404</h1>
        </div>
        
        <p>Il semblerait que tu aies essayé de glitcher mon site... Sache que ce n'est pas possible...</p>
    </article>
</main>