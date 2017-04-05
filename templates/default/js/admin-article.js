export const adminArticle = (w, $, u) => {
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
			$('textarea', '#main_form_panel').each(function(){
				$(this).trumbowyg('empty');
			});
			$('#main_form_panel').removeClass('hidden');
			w.location.hash = '#main_form_panel';
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
						'isUnique': sVal,
						'id': $(':input[name=id]').val()
					}, function(data){
						if (data){
							$('#name_icon').attr('class', 'fa fa-fw fa-check text-success');
						} else {
							$('#name_icon').attr('class', 'fa fa-fw fa-times text-danger');
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
							$(this).val([data[name]]);
							if ($(this).hasClass('trumbowyg-textarea')){
								$(this).trumbowyg('html', data[name]);
							}
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
			} else {
				iUnblock(icon);
			}
		});
		
		$('textarea', '#main_form_panel').trumbowyg({
			'lang': 'ru'
		});
		
		$('#main_form_panel').on('click', '.b-cancel', function(e) {
			$('#main_form_panel').addClass('hidden');
		});
	});
}