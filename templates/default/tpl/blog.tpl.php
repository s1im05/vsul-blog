<? if ($aData) :?>
    <? foreach ($aData as $aPost) :?>
        <? $bList = true; include 'article.tpl.php'; ?>
    <? endforeach;?>
    
    <? include 'paginator.tpl.php';?>
<? else :?>
	<article class="c-card">
		<div class="c-card__head">
			<h2>Пустой раздел</h2>
		</div>
		<hr>
		<div class="c-card__body">
			<p>Здесь пока ничего нет, но это не надолго.</p>
		</div>
	</article>
<? endif;?>