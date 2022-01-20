<?php $v->layout("_theme"); ?>

<div class="app_invoice app_widget">
    <form class="app_form" action="<?= url('/app/primos'); ?>" method="post">
        <div class="label_group">
            <label>
                <span class="field icon-user">Primeiro número:</span>
                <input class="radius" type="number" name="first" placeholder="Ano:" required/>
            </label>
            <label>
                <span class="field icon-user">segundo Número:</span>
                <input class="radius" type="number" name="last" placeholder="Ano:" required/>
            </label>
        </div>
        <label>
            <span class="field icon-money">Numeros:</span>
            <ul class="app_header_widget">
                <li id="generator" class="radius transition icon-warning"></li>
            </ul>
        </label>

        <div class="al-center">
            <div>
                <button class="btn btn_inline radius transition icon-pencil-square-o">Gerar Primos</button>
            </div>
        </div>
    </form>
</div>