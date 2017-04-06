<div class="c-card">
	<div class="c-card__head">
		<h2><?=$title?></h2>
	</div>
	<hr>
	<div class="c-card__body">
		<? if ($aFound['data']) :?>
			<ol start="<?=$iOlStart?>">
			<? foreach ($aFound['data'] as $aVal) :?>
				<li>
					<a href="/a/<?=$aVal['name']?>"><?=$aVal['title']?></a>
					<p class="text-muted"><i class="<?=SSCE\H\getChapterIcon($aVal['chapter'])?>"></i> <?=SSCE\H\date2ru($aVal['date_c'])?></p>					
				</li>
			<? endforeach;?>
			</ol>
		<? else :?>
			<p>Ничего не найдено.</p>
		<? endif;?>
	</div>
	
	<? if ($aFound['total'] && $aFound['total'] > 1) :?>
	<hr />
	<div class="c-card__footer">
		<? include 'paginator.tpl.php';?>
	</div>
	<? endif; ?>
</div>
