(($, w, u) => {
	
	const textureSize = 256,
		genereateTexture = (size) => {
			const el = document.createElement('canvas'),
				ctx = el.getContext("2d");
		
			el.width = size * 2;
			el.height = size;
			
			ctx.beginPath();
			ctx.rect(0, 0, size, size);
			ctx.fillStyle = "#3ebfd7";
			ctx.fill();
			
			ctx.fillStyle = "rgba(256, 256, 256, .3)";
			ctx.font = "10em FontAwesome";
			ctx.fillText('\uf1e3', 0, 90);
			ctx.fillText('\uf11b', size, 90);
			ctx.fillText('\uf091', 0.5 * size, 0.5 * size + 90);
			ctx.fillText('\uf1e2', 1.5 * size, 0.5 * size + 90);
			
			return el.toDataURL('image/png');
		};
	
	$(() => { // on document ready
		$('#navBtn').on('click', (e) => {
			$('#navMenu').toggle();
		});
		
		const jumbo = $('#jumbo').css('background-image', 'url(' + genereateTexture(textureSize) + ')');
	});	
})(jQuery, window);