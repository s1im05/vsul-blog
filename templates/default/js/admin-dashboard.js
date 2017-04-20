export const adminDashboard = (w, $, u) => {
	
	const getPreloader = () => {
			return $('<div class="loading"><i class="fa fa-spinner fa-spin"></i></div>');
		},
		blockPanel = (panel) => {
			return panel.find('.panel-body:first').html(getPreloader());
		},
		loadMostPopular = (id) => {
			const panel = $(id), field = blockPanel(panel);
			
			$.post('/adm_panel/dashboard', {
				mostPopular: true
			}, (res) => {
				let html = $('<ul class="list-group" />');
				res.forEach(f => {
					html.append(`<li class="list-group-item"><span class="badge">${f.views}</span><a href="/a/${f.name}" target="_blank">${f.title}</a></li>`);
				});
				field.html(html);
			});	
			
			return panel;
		},
		loadObs = (id) => {
			const panel = $(id), field = blockPanel(panel);
			
			$.post('/adm_panel/dashboard', {
				obs: true
			}, (res) => {
				let html = $('<ul class="list-group" />');
				res.forEach(f => {
					const li = $('<li class="list-group-item" />').text(`"${f.title}" - ${f.text}`);
					html.append(li);
				});
				field.html(html);
			});	
			
			return panel;
		},
		loadLastComments = (id) => {
			const panel = $(id), field = blockPanel(panel);
			
			$.post('/adm_panel/dashboard', {
				lastComments: true
			}, (res) => {
				let html = $('<ul class="list-group" />');
				res.forEach(f => {
					const li = $('<li class="list-group-item" />').text(f.text);
					html.append(li);
				});
				field.html(html);
			});	
			
			return panel;
		};
	
	$(function(){
		loadMostPopular('#most_popular').on('click', '.fa-refresh', (e) => {
			loadMostPopular('#most_popular');
		});
		loadObs('#obs').on('click', '.fa-refresh', (e) => {
			loadObs('#obs');
		});
		loadLastComments('#last_comments').on('click', '.fa-refresh', (e) => {
			loadLastComments('#last_comments');
		});
	});	
}
