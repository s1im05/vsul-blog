<div class="panel panel-default hidden" id="main_form_panel">
    <div class="panel-heading">
        Форма редактирования записей
    </div>
    <div class="panel-body">
        <form id="main_form" action="<?=$_SERVER['REQUEST_URI']?>" method="post">
			<div class="form-group">
				<label for="name">Раздел</label>
				<div>
					<label class="radio-inline">
						<input type="radio" name="chapter" value="work" checked> Работа
					</label>
					<label class="radio-inline">
						<input type="radio" name="chapter" value="games"> Игры
					</label>
					<label class="radio-inline">
						<input type="radio" name="chapter" value="travel"> Путешествия
					</label>
				</div>
			</div>
            <div class="form-group">
                <label for="name">Имя</label>
                <div class="input-group">
                    <input type="text" class="form-control" required="required" id="name" name="name" placeholder="Имя">
                    <div class="input-group-addon"><i id="name_icon" class="fa fa-fw"></i></div>
                </div>
                <p class="help-block text-muted">Только цифры, латинские буквы в нижнем регистре, символы "-" и "_"</p>
            </div>
            <div class="form-group">
                <label for="title">Заголовок</label>
                <input type="text" class="form-control" required="required" id="title" name="title" placeholder="Заголовок">
            </div>
            <div class="form-group">
                <label for="text_short">Анонс статьи</label>
                <textarea rows="5" class="form-control" id="text_short" name="text_short" placeholder="Анонс статьи"></textarea>
            </div>
            <div class="form-group">
                <label for="text_goto">Текст на кнопке "далее"</label>
                <input type="text" class="form-control" id="text_goto" name="text_goto" placeholder="Текст на кнопке">
            </div>
            <div class="form-group">
                <label for="text">Текст статьи</label>
                <textarea rows="5" class="form-control" id="text" name="text" placeholder="Текст статьи"></textarea>
            </div>
            <button class="btn btn-primary" type="submit">Сохранить</button>
            <a class="btn btn-default b-cancel">Отмена</a>
            
            <input type="hidden" name="id" value="0">
        </form>
    </div>
</div>

<p><a id="add" class="btn btn-success">Добавить</a></p>

<? if ($aData) :?>
    <table class="table table-striped" id="list">
        <thead>
            <tr>
                <th>#</th>
                <th class="hidden-xs">Имя</th>
                <th>Заголовок</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
        <? foreach ($aData as $aPost) :?>
            <tr>
                <td><?=$aPost['id']?></td>
                <td class="hidden-xs">
					<i class="<?=SSCE\H\getChapterIcon($aPost['chapter'])?>"></i>
					<?=$aPost['name']?>
				</td>
                <td><?=$aPost['title']?></td>
                <td class="h-nowrap">
                    <a data-id="<?=$aPost['id']?>" class="btn btn-warning b-edit"><i class="fa fa-edit"></i></a>
                    <a data-id="<?=$aPost['id']?>" class="btn btn-danger b-delete"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
        <? endforeach; ?>
        </tbody>
    </table>
<? endif; ?>


<div id="editor_modal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Редактор текста</h4>
            </div>
            <div class="modal-body">
                <div id="editor"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Сохранить</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>