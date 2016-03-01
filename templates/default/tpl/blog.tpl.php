<? if ($aData) :?>
    <? foreach ($aData as $aPost) :?>
        <? $bList = true; include 'article.tpl.php'; ?>
    <? endforeach;?>
    
    <? include 'paginator.tpl.php';?>
<? endif;?>