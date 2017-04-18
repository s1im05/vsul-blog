<? if ($aPost) :?>
	<article class="c-card" data-id="<?=$aPost['id']?>">
		<div class="c-card__head">
			<h2><?=$aPost['title']?></h2>
			<button class="btn btn-link c-post__likebtn"><i class="fa fa-heart-o"></i></button>
			<p class="text-muted">
				<i class="<?=SSCE\H\getChapterIcon($aPost['chapter'])?>"></i> <?=SSCE\H\date2ru($aPost['date_c'])?>
				&nbsp;&nbsp;
				<? if ($aPost['tags'] || $aUser['role'] === 'admin') :?>
					<? if ($aUser['role'] === 'admin') :?>
						<button class="btn btn-default btn-xs admin-tag-add"><i class="fa fa-plus text-success"></i></button>
						&nbsp;&nbsp;
					<? endif;?>
					<? foreach ($aPost['tags'] as $iKey => $sTag) :?>
						<a href="/tag/<?=$sTag?>"><i class="fa fa-tag"></i>&nbsp;<?=$sTag?></a>
						<? if ($aUser['role'] === 'admin') :?>
							<button class="btn btn-default btn-xs admin-tag-remove" data-tag-id="<?=$iKey?>"><i class="fa fa-times text-danger"></i></button>
						<? endif;?>
						&nbsp;&nbsp;
					<? endforeach;?>
				<? endif;?>
			</p>
		</div>
		<hr>
		<div class="c-card__body c-post">
			<? if ($bList) :?>
				<p><?=$aPost['text_short']?></p>
				<p>
					<a class="btn btn-primary btn-md" href="/a/<?=$aPost['name']?>"><?=$aPost['text_goto']?$aPost['text_goto']:'Далее'?></a>
				</p>
			<? else :?>
				<?=$aPost['text']?>
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