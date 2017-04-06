<? if ($aPost) :?>
	<article class="c-card">
		<div class="c-card__head">
			<h2><?=$aPost['title']?></h2>
			<button class="btn btn-link c-post__likebtn"><i class="fa fa-heart-o"></i></button>
			<p class="text-muted"><i class="<?=SSCE\H\getChapterIcon($aPost['chapter'])?>"></i> <?=SSCE\H\date2ru($aPost['date_c'])?></p>
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