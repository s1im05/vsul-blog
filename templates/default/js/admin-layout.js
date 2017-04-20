import {adminArticle} from './admin-article.js';
import {adminDashboard} from './admin-dashboard.js';

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
		default:
			adminDashboard(w, $);
	}
})(window, jQuery);