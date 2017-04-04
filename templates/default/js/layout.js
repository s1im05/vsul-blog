(($, w, u) => {
	
	const textureSize = 210,
		icons = {
			games: ['\uf1e3', '\uf11b', '\uf091', '\uf1e2', '\uf1b9'],
			work: ['\uf0ac', '\uf19d', '\uf0c3', '\uf0b1', '\uf1ec'],
			travel: ['\uf206', '\uf083', '\uf207', '\uf072', '\uf1ba', '\uf0f2'],
		},
		genereateTexture = (size, icons) => {
			const el = document.createElement('canvas'),
				ctx = el.getContext("2d"),
				offsetY = 75;
				
			icons.sort((a, b) => {
				return Math.random() > 0.5 ? 1 : -1;
			});
		
			el.width = size * 2;
			el.height = size;
			
			ctx.fillStyle = "rgba(256, 256, 256, .3)";
			ctx.font = "8em FontAwesome";
			ctx.fillText(icons[0], 0, offsetY);
			ctx.fillText(icons[1], size, offsetY);
			ctx.fillText(icons[2], 0.5 * size, 0.5 * size + offsetY);
			ctx.fillText(icons[3], 1.5 * size, 0.5 * size + offsetY);
			
			return el.toDataURL('image/png');
		};
	
	$(() => { // on document ready
		$('#navBtn').on('click', (e) => {
			$('#navMenu').toggle();
		});
		
		const jumbo = $('#jumbo').css('background-image', 'url(' + genereateTexture(textureSize, icons.travel) + ')');
	});	
})(jQuery, window);