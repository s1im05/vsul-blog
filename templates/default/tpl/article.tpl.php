<? if ($aPost) :?>
    <article>
        <h2><?=$aPost['title']?></h2>
        <p></p>
        <? if ($bList) :?>
            <p class="text-muted"><i class="fa fa-calendar"></i> <?=SSCE\H\date2ru($aPost['date_c'])?></p>
            <p><?=$aPost['text_short']?></p>
            <p>
                <a class="btn btn-success btn-md" href="/<?=$aPost['name']?>"><?=$aPost['text_goto']?$aPost['text_goto']:'Далее'?></a>
            </p>
        <? else :?>
            <?=$aPost['text']?>
        <? endif;?>
    </article>
<? endif; ?>