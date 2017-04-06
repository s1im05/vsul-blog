import {adminArticle} from './admin-article.js';

(function(w, $, u){

	$(() => {
		$('#admPanelXsMenu').on('click', e => {
			e.preventDefault();
			$('.navbar-collapse').toggleClass('collapse');
		});
	});

	switch (w.location.pathname) {
		case '/adm_panel/articles':
			adminArticle(w, $);
			break;
	}
})(window, jQuery);