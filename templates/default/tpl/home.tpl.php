<div class="b-post__panel">
    <div class="media">
        <div class="media-left">
            <a href="/home">
                <img class="media-object b-avatar" src="<?=$aUser['photo']?$aUser['photo']:$path.'/img/user.jpg'?>">
            </a>
        </div>
        <div class="media-body">
            <h4 class="media-heading"><?=htmlspecialchars($aUser['first_name'].' '.$aUser['last_name'])?> <strong>(<?=htmlspecialchars($aUser['nickname'])?>)</strong></h4>
            <a class="btn btn-primary btn-xs" href="/logout"><i class="fa fa-sign-out"></i>&nbsp; выйти</a>
        </div>
    </div>
</div>

<div id="settings">
    <div class="b-post__panel">
        <p class="b-post__title">Редактирование основных настроек</p>
    </div>
    <div class="b-post__data">
        <form method="post" action="/home" class="form-horizontal">
            <div class="form-group">
                <label for="home_form_name" class="col-sm-3 control-label">Никнейм:</label>
                <div class="col-sm-5 col-md-4">
                    <input type="text" name="nickname" maxlength="30" value="<?=htmlspecialchars($aUser['nickname'])?>" class="form-control" id="home_form_name" placeholder="Никнейм">
                </div>
            </div>
            <div class="form-group">
                <label for="home_form_gender" class="col-sm-3 control-label">Пол:</label>
                <div class="col-sm-5 col-md-4">
                    <div class="btn-group btn-radio" role="group" data-target="#inp_gender">
                        <button type="button" title="мужской" data-value="M" class="btn btn-<?=$aUser['gender'] == 'M'?'primary':'default'?>"><i class="fa fa-fw fa-male"></i></button>
                        <button type="button" title="женский" data-value="F" class="btn btn-<?=$aUser['gender'] == 'F'?'primary':'default'?>"><i class="fa fa-fw fa-female"></i></button>
                        <button type="button" title="не выбрано" data-value="U" class="btn btn-<?=$aUser['gender'] == 'U'?'primary':'default'?>"><i class="fa fa-fw fa-question"></i></button>
                    </div>
                    <input id="inp_gender" type="hidden" name="gender" value="<?=$aUser['gender']?>" />
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-5 col-md-4">
                    <button type="submit" name="save" class="btn btn-primary">Сохранить</button>
                    &nbsp;
                    <? if ($sSuccess) :?>
                        <span class="text-success"><?=$sSuccess?></span>
                    <? endif;?>
                    <? if ($sError) :?>
                        <span class="text-danger"><?=$sError?></span>
                    <? endif;?>
                </div>
            </div>
        </form>
    </div>
</div>
