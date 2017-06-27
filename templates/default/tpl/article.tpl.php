<? if ($aPost) :?>
	<article class="c-card" data-id="<?=$aPost['id']?>">
		<div class="c-card__head">
			<h2>
				<i class="text-muted <?=SSCE\H\getChapterIcon($aPost['chapter'])?>"></i>
				<? if ($bList) :?>
					<a href="/a/<?=$aPost['name']?>"><?=$aPost['title']?></a>
				<? else :?>
					<?=$aPost['title']?>
				<? endif;?>
			</h2>
			<p class="text-muted small">
				<span class="pull-right"><?=SSCE\H\date2ru($aPost['date_c'])?></span>
				<? if ($aPost['tags'] || $aUser['role'] === 'admin') :?>
					<? foreach ($aPost['tags'] as $iKey => $sTag) :?>
						<a href="/tag/<?=htmlspecialchars($sTag)?>"><i class="fa fa-tag"></i>&nbsp;<?=$sTag?></a>
						<? if ($aUser['role'] === 'admin') :?>
							<button class="btn btn-default btn-xs admin-tag-remove" data-tag-id="<?=$iKey?>"><i class="fa fa-times text-danger"></i></button>
						<? endif;?>
						&nbsp;&nbsp;
					<? endforeach;?>
					<? if ($aUser['role'] === 'admin') :?>
						<button class="btn btn-default btn-xs admin-tag-add"><i class="fa fa-plus text-success"></i></button>
						&nbsp;&nbsp;
					<? endif;?>
				<? endif;?>
			</p>
		</div>
		<hr>
		<div class="c-card__body c-post">
			<? if ($bList) :?>
				<p><?=$aPost['text_short']?></p>
				<? if ($aPost['text']) :?>
					<p>
						<a class="btn btn-primary btn-md" href="/a/<?=$aPost['name']?>"><?=$aPost['text_goto']?$aPost['text_goto']:'Далее'?></a>
					</p>
				<? endif;?>
			<? else :?>
				<p><?=$aPost['text_short']?></p>
				<? if ($aPost['text']) :?>
					<hr />
					<?=$aPost['text']?>
				<? endif;?>
			<? endif;?>
		</div>
		
		<? if (!$bList) :?>
		<hr>
		<div class="c-card__footer">
			<? include 'comments.tpl.php';?>
		</div>
		<? endif;?>
	</article>
<? endif; ?>