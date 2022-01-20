<?php $v->layout("_theme"); ?>

<div class="app_invoice app_widget">
    <form class="app_form" action="<?= url('/app/nao-repetidos'); ?>" method="post">
        <div class="label_group">
            <label>
                <span class="field icon-user">Gerador de 20 numeros aleatórios entre 1 e 10:</span>
                <input readonly class="radius" type="text" name="generate" placeholder="gerador:" value="true" required/>
            </label>
            <label>
                <span class="field icon-money">resultado:</span>
                <ul class="app_header_widget">
                    <li id="generator" class="radius transition icon-warning"></li>
                </ul>
            </label>
        </div>

        <div class="al-center">
            <div>
                <button class="btn btn_inline radius transition icon-pencil-square-o">Gerar array</button>
            </div>
        </div>
    </form>
</div>