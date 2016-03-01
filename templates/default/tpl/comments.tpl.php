<section>
    <h3>Комментарии</h3>
    <? if ($aCommentList) :?>
        <? foreach ($aCommentList as $aComment) :?>
            <div class="media b-comment" id="comment_<?=$aComment['id']?>">
                <div class="media-left">
                    <img class="media-object b-avatar" src="<?=$aComment['photo']?$aComment['photo']:$path.'/img/user.jpg'?>">
                </div>
                <div class="media-body <?=$aComment['id']==$iLastAdded?'bg-success':''?>">
                    <p class="media-heading"><strong><?=htmlspecialchars($aComment['nickname'])?></strong>, 
                        <span class="text-muted"><?=SSCE\H\date2ru($aComment['cdate'])?> 
                        написал<?=($aComment['gender']=='U')?'(а)':($aComment['gender']=='F'?'а':'')?>:</span>
                    </p>
                    <div class="b-comment__text">
                        <?=nl2br(htmlspecialchars($aComment['text']));?>
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
                    <img class="media-object b-avatar" src="<?=$_SESSION['user']['photo']?$_SESSION['user']['photo']:$path.'/img/user.jpg'?>">
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
                        <script type="text/javascript">
                            $(function(){
                                window.location.hash    = '#comment_'+<?=(int)$iLastAdded?>;
                            });
                        </script>
                    <? endif;?>
                </form>
            </div>
        </div>
    <? else :?>
        <p id="form_comment">Необходимо <a href="http://loginza.ru/api/widget?token_url=<?=urlencode('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'])?>&lang=ru" class="loginza">авторизоваться</a>, чтобы оставить свой комментарий</p>
    <? endif;?>
</section>