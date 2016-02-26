<p><a id="add" class="btn btn-success">Добавить</a></p>
<div class="panel panel-default hidden" id="main_form_panel">
    <div class="panel-heading">
        Форма редактирования записей
    </div>
    <div class="panel-body">
        <form id="main_form" action="<?=$_SERVER['REQUEST_URI']?>" method="post">
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



<? if ($aData) :?>
    <table class="table table-striped" id="list">
        <thead>
            <tr>
                <th>#</th>
                <th>Имя</th>
                <th>Заголовок</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
        <? foreach ($aData as $aPost) :?>
            <tr>
                <td><?=$aPost['id']?></td>
                <td><?=$aPost['name']?></td>
                <td><?=$aPost['title']?></td>
                <td>
                    <a data-id="<?=$aPost['id']?>" class="btn btn-warning b-edit"><i class="fa fa-edit"></i></a>
                    <a data-id="<?=$aPost['id']?>" class="btn btn-danger b-delete"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
        <? endforeach; ?>
        </tbody>
    </table>
<? endif; ?>


<script type="text/javascript">
(function(w, $, u){
    
    var iBlock  = function(el){
            $(el).data('class', $(el).attr('class')).attr('class', 'fa fa-spin fa-spinner').parent('.btn').prop('disabled', true);
        },
        iUnblock    = function(el){
            $(el).attr('class', $(el).data('class')).parent('.btn').prop('disabled', false);
        };
    
    $(function(){
        $('#add').on('click', function(e){
            e.preventDefault();
            $('#main_form').find(':input[name=id]').val(0).end()[0].reset();
            $('#main_form_panel').removeClass('hidden');
        });
        
        var iSmphr   = 0;
        $('#name').on('input change', function(e){
            var sVal    = $(this).val();
            
            if (sVal){
                iSmphr++;
                setTimeout(function(){
                    iSmphr--;
                    if (iSmphr > 0) return;

                    $('#name_icon').attr('class', 'fa fa-fw fa-spinner fa-spin');
                    $.get('articles/ajax', {
                        'isUnique': sVal
                    }, function(data){
                        if (data){
                            $('#name_icon').attr('class', 'fa fa-fw fa-check');
                        } else {
                            $('#name_icon').attr('class', 'fa fa-fw fa-times');
                        }
                        iSmphr  = 0;
                    });
                }, 500);
            } else {
                $('#name_icon').attr('class', 'fa fa-fw fa-times');
            }
        }).on('keypress', function(e){
            var re  = new RegExp("[a-z0-9_-]");
            if (!re.test(e.key)){
                e.preventDefault();
            }
        });
        
        $('#list').on('click', '.b-edit', function(e){
            e.preventDefault();
            var icon    = $(this).children('i:first')[0];
            iBlock(icon);
            
            $.get('articles/ajax', {
                    'id':   $(this).data('id')
                }, function(data){
                    $('#main_form').find(':input').each(function(){
                        var name = $(this).attr('name');
                        if (data[name] !== u){
                            $(this).val(data[name]);
                        }
                    });
                    $('#main_form_panel').removeClass('hidden');
                    w.location.hash = '#main_form_panel';
                    iUnblock(icon);
                });
        }).on('click', '.b-delete', function(e){
            e.preventDefault();
            var icon    = $(this).children('i:first')[0],
                self    = this;
            iBlock(icon);
            
            if (w.confirm('Подтвердите удаление записи')){
                $.post('articles/ajax', {
                        'id':       $(this).data('id'),
                        'delete':   1
                    },function(data){
                        $(self).closest('tr').remove();
                        iUnblock(icon);
                    });
            }
        });
        
        $('#main_form_panel').on('click', '.b-cancel', function(e){
            e.preventDefault();
            $('#main_form')[0].reset();
            $('#main_form_panel').addClass('hidden');
        });
    });
})(window, jQuery);
</script>