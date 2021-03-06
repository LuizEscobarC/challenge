<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
        <meta name="mit" content="2022-01-19T19:49:01-03:00+193737">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <?= $head; ?>

    <link rel="" type="image/png" href="<?= theme("/assets/images/favicon.png"); ?>"/>
    <link rel="stylesheet" href="<?= theme("/assets/style.css"); ?>"/>
</head>
<body>

<div class="ajax_load">
    <div class="ajax_load_box">
        <div class="ajax_load_box_circle"></div>
        <p class="ajax_load_box_title">Aguarde, carregando...</p>
    </div>
</div>

<!--HEADER-->
<header class="main_header gradient gradient-green">
    <div class="container">
        <div class="main_header_logo">
            <h1><a class="coffee transition" title="Home" href="<?= url(); ?>">Cafe<b>Control</b></a></h1>
        </div>

        <nav class="main_header_nav">
            <span class="main_header_nav_mobile j_menu_mobile_open menu notext radius transition"></span>
            <div class="main_header_nav_links j_menu_mobile_tab">
                <span class="main_header_nav_mobile_close j_menu_mobile_close error notext transition"></span>
                <a class="link login transition radius sign-in" title="Entrar"
                   href="<?= url("/"); ?>">Entrar</a>
            </div>
        </nav>
    </div>
</header>

<!--CONTENT-->
<main class="main_content">
    <?= $v->section("content"); ?>
</main>

<?php if ($v->section("optout")): ?>
    <?= $v->section("optout"); ?>
<?php else: ?>
    <article class="footer_optout">
        <div class="footer_optout_content content">
            <span class=" coffee notext"></span>
            <h2>...</h2>
            <p>...</p>
            <a href="<?= url("/cadastrar"); ?>"
               class="footer_optout_btn gradient gradient-green gradient-hover radius check-square-o">...</a>
        </div>
    </article>
<?php endif; ?>

<!--FOOTER-->
<footer class="main_footer">
    <div class="container content">
        <section class="main_footer_content">
            <article class="main_footer_content_item">
                <h2>Sobre:</h2>
                <p>...</p>
                <a title="Termos de uso" href="<?= url("/"); ?>">Termos de uso</a>
            </article>

            <article class="main_footer_content_item">
                <h2>Mais:</h2>

                <a class="link transition radius" title="Entrar" href="<?= url("/entrar"); ?>">Entrar</a>
            </article>

            <article class="main_footer_content_item">
                <h2>Contato:</h2>
                <p class="phone"><b>Telefone:</b><br> +55 55 5555.5555</p>
                <p class="envelope"><b>Email:</b><br> ..</p>
                <p class="map-marker"><b>Endere??o:</b><br> ..</p>
            </article>

            <article class="main_footer_content_item social">
                <h2>Social:</h2>
                <a target="_blank" class="facebook"
                   href="https://www.facebook.com/" title="CafeControl no Facebook">/challenge</a>
                <a target="_blank" class=""
                   href="https://www.instagram.com/" title="CafeControl no Instagram"></a>
                <a target="_blank" class="" href="https://www.youtube.com/"
                   title="CafeControl no YouTube">challenge</a>
            </article>
        </section>
    </div>
</footer>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-53658515-18"></script>
<script src="<?= theme("/assets/scripts.js"); ?>"></script>
<?= $v->section("scripts"); ?>

</body>
</html>