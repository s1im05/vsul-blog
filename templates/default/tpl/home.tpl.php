<div class="b-post__panel">
    <div class="media">
        <div class="media-left">
            <a href="/home">
                <img class="media-object b-avatar" src="<?=$aUser['photo']?$aUser['photo']:$path.'/img/user.jpg'?>">
            </a>
        </div>
        <div class="media-body">
            <h4 class="media-heading">
                <?=htmlspecialchars($aUser['first_name'].' '.$aUser['last_name'])?> 
                <strong>(<?=htmlspecialchars($aUser['nickname'])?>)</strong> 
                <a class="btn btn-default btn-xs" href="/logout"><i class="fa fa-sign-out"></i>&nbsp; выйти</a>
            </h4>
            <p>&nbsp;</p>
            <form method="post" action="/home">
                <div class="form-group">
                    <label for="home_form_name" class="control-label">Никнейм:</label>
                    <input type="text" name="nickname" maxlength="30" value="<?=htmlspecialchars($aUser['nickname'])?>" class="form-control" id="home_form_name" placeholder="Никнейм">
                </div>
                <div class="form-group">
                    <label for="home_form_gender" class="control-label">Пол:</label>
                    <div class="btn-group btn-radio" role="group" data-target="#inp_gender">
                        <button type="button" title="мужской" data-value="M" class="btn btn-<?=$aUser['gender'] == 'M'?'primary':'default'?>"><i class="fa fa-fw fa-male"></i></button>
                        <button type="button" title="женский" data-value="F" class="btn btn-<?=$aUser['gender'] == 'F'?'primary':'default'?>"><i class="fa fa-fw fa-female"></i></button>
                        <button type="button" title="не выбрано" data-value="U" class="btn btn-<?=$aUser['gender'] == 'U'?'primary':'default'?>"><i class="fa fa-fw fa-question"></i></button>
                    </div>
                    <input id="inp_gender" type="hidden" name="gender" value="<?=$aUser['gender']?>" />
                </div>
                <button type="submit" name="save" class="btn btn-primary">Обновить</button>
                &nbsp;
                <? if ($sSuccess) :?>
                    <span class="text-success"><?=$sSuccess?></span>
                <? endif;?>
                <? if ($sError) :?>
                    <span class="text-danger"><?=$sError?></span>
                <? endif;?>
            </form>
        </div>
    </div>
</div>