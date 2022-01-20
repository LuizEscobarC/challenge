<?php $v->layout("_theme"); ?>
    <div class="ajax_response"><?= flash(); ?></div>
    <div class="app_main_box">
        <section class="app_main_left">
            <article class="app_widget">
                <header class="app_widget_title">
                    <h2 class="icon-info">Passo a Passo para navegar:</h2>
                </header>
                <h3>Cada um dos itens do menu a esqueda correspondem a uma questão do desafio.</h3>
                <p>São praticamente formulários que possíbilitam a interação amigável com os desafios PHP propostos</p>
                <br>
                <i style="font-size: 0.8em;"> Detalhes importam, vale a pena esperar e fazê-los direito.
                <b>Steve Jobs</b></i>

            </article>

        </section>
    </div>

<?php $v->start("scripts"); ?>
<?php $v->end(); ?>