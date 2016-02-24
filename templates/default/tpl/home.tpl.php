<? if ($aData) :?>
    <? foreach ($aData as $aPost) :?>
        <? $bList = true; include 'article.tpl.php'; ?>
    <? endforeach;?>
<? endif;?>