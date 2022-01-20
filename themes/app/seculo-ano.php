<?php $v->layout("_theme"); ?>

<div class="app_invoice app_widget">
    <form class="app_form" action="<?= url('/app/seculo-ano'); ?>" method="post">
        <div class="label_group">
            <label>
                <span class="field icon-user">Ano:</span>
                <input class="radius" type="number" name="year" placeholder="Ano:" required/>
            </label>
            <label>
                <span class="field icon-money">Seculo:</span>
                <ul class="app_header_widget">
                    <li id="generator" class="radius transition icon-warning"></li>
                </ul>
            </label>
        </div>

        <div class="al-center">
            <div>
                <button class="btn btn_inline radius transition icon-pencil-square-o">Gerar Seculo</button>
            </div>
        </div>
    </form>
</div>