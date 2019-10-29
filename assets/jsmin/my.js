jQuery( document ).ready(function( $ ) {

	let certificateGallery = function(){
		$('.certificates-gallery__item').magnificPopup({
			type: 'image',
			gallery:{
				enabled:true
			}
		});
	};

	let pdfWidth = function(){
		$('.wp-block-cgb-block-algori-pdf-viewer-iframe').css({
			'margin': '0 auto',
			'max-width': '1400px',
			'width': '100%'
		});
	};

	let presentationPopup = function(){
		$('.presentation .popup').magnificPopup({
			type: 'image',
			gallery:{
				enabled:true
			}
		});
	};

	let presentationSlider3 = function(){
		$('#js-presentation-slider-3').slick({
			dots: false,
			arrows: true,
			prevArrow: $('#js-presentation-slider3-wrap .presentation-arrow-prev'),
			nextArrow: $('#js-presentation-slider3-wrap .presentation-arrow-next'),
		});
	};

	certificateGallery();
	pdfWidth();
	presentationPopup();
	presentationSlider3();
});


