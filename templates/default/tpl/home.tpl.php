<div class="c-usercard">
	<p><img class="c-usercard__photo" src="<?=$aUser['photo'] ? $aUser['photo'] : $path.'/img/user.jpg'?>"></p>
	<h4 class="c-usercard__title"><?=htmlspecialchars($aUser['nickname'])?></h4>
	<p>		
		(<?=htmlspecialchars($aUser['first_name'].' '.$aUser['last_name'])?>)
	</p>
</div>

<div class="c-card">
	<div class="c-card__head clearfix">
		<ul class="nav nav-pills c-usercard__nav">
			<li role="presentation" class="active"><a href="#">Профиль</a></li>
			<li role="presentation"><a href="#">Комментарии</a></li>
			<li role="presentation"><a href="/logout"><i class="fa fa-sign-out"></i>&nbsp;Выйти</a></li>
		</ul>
	</div>
	<hr />
	<div class="c-card__body">
		<form method="post" action="/home">
			<div class="form-group">
				<label for="home_form_name" class="control-label">Никнейм:</label>
				<input type="text" name="nickname" maxlength="30" value="<?=htmlspecialchars($aUser['nickname'])?>" class="form-control" id="home_form_name" placeholder="Никнейм">
			</div>
			<div class="form-group">
				<label for="home_form_name" class="control-label">Пол:</label>
				<div class="radio">
					<label><input type="radio" name="gender" value="M" <?=$aUser['gender'] === 'M' ? 'checked' : ''?>>&nbsp;мужской</label><br>
					<label><input type="radio" name="gender" value="F" <?=$aUser['gender'] === 'F' ? 'checked' : ''?>>&nbsp;женский</label><br>
					<label><input type="radio" name="gender" value="U" <?=$aUser['gender'] === 'U' ? 'checked' : ''?>>&nbsp;не указывать</label>
				</div>
			</div>
			<div class="form-group">
				<button type="submit" name="save" class="btn btn-primary">Обновить</button>
			</div>
		</form>
	</div>
</div>