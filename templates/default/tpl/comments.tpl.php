<section>
    <h3>Комментарии</h3>
    <? if ($aCommentList) :?>
        <? foreach ($aCommentList as $aComment) :?>
            <div class="media c-comment" id="comment_<?=$aComment['id']?>" data-id="<?=$aComment['id']?>">
                <div class="media-left pull-left">
                    <img class="media-object c-avatar" src="<?=$aComment['photo']?$aComment['photo']:$path.'/img/user.jpg'?>">
                </div>
                <div class="media-body <?=$aComment['id']==$iLastAdded?'bg-success':''?>">
                    <p class="media-heading"><strong><?=htmlspecialchars($aComment['nickname'])?></strong>, 
                        <span class="text-muted"><?=SSCE\H\date2ru($aComment['cdate'])?> 
                        написал<?=($aComment['gender']=='U')?'(а)':($aComment['gender']=='F'?'а':'')?>:</span>
						<? if ($aUser['role'] === 'admin') :?>
							<? if (!$aComment['is_deleted']) :?>
								<button class="btn btn-default btn-xs admin-comment" data-state="1"><i class="fa fa-times"></i></button>
							<? else :?>
								<button class="btn btn-default btn-xs admin-comment" data-state="0"><i class="fa fa-undo"></i></button>
							<? endif;?>
						<? endif;?>
                    </p>
                    <div class="b-comment__text">
						<? if (!$aComment['is_deleted']) :?>
							<?=nl2br(htmlspecialchars($aComment['text']));?>
						<? else :?>
							<em>Комментарий удален</em>
							<? if ($aUser['role'] === 'admin') :?>
								<br>
								<strike><?=nl2br(htmlspecialchars($aComment['text']));?></strike>
							<? endif;?>
						<? endif; ?>
                    </div>
                </div>
            </div>
        <? endforeach;?>
    <? else :?>
        <p>Комментариев пока нет, будьте первым!</p>
    <? endif;?>
    
    <p>&nbsp;</p>
    
    <? if ($bIsLogged) :?>
        <div class="media b-commentform">
            <div class="media-left">
                <a href="/home">
                    <img class="media-object c-avatar" src="<?=$_SESSION['user']['photo']?$_SESSION['user']['photo']:$path.'/img/user.jpg'?>">
                </a>
            </div>
            <div class="media-body">
                <form action="<?=$_SERVER['REQUEST_URI']?>#form_comment" id="form_comment" method="post">
                    <div class="form-group">
                        <textarea class="form-control" name="comment" rows="5" placeholder="Текст комментария"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Отправить</button>
                    &nbsp;
                    <? if ($bCommentAdded) :?>
                        <p class="h-inline text-success">Ваш комментарий успешно добавлен</p>
                    <? endif;?>
                </form>
            </div>
        </div>
    <? else :?>
        <p id="form_comment">Необходимо <a href="//loginza.ru/api/widget?token_url=<?=urlencode('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'])?>&lang=ru" class="loginza">авторизоваться</a>, чтобы оставить свой комментарий</p>
    <? endif;?>
</section>