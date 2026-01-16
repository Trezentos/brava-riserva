jQuery(document).ready(function($)
{

	// MENU

	$('.menu ul').fadeOut(0);
	$('.menu .logo').fadeOut(0);
	$('.menu .phone').fadeOut(0);

	$('.navbar-burger').click(function(e)
	{
		e.preventDefault();

		if( $(this).hasClass("is-active") )
		{
			// CLOSE
			$('.menu ul').fadeOut(800);
			$('.menu .logo').fadeOut(300);
			$('.menu .phone').fadeOut(100);

			setTimeout( () => { $('.menu').removeClass("is-active"); }, 1000);
		}
		else
		{
			// SHOW
			$('.menu').addClass('is-active');

			setTimeout( () => { 
				$('.menu ul').fadeIn(0);
				$('.menu .logo').fadeIn(0);
				$('.menu .phone').fadeIn(0);
			}, 800);
		}

		$(this).toggleClass('is-active');
	});



	$('.bt-close-menu').click(function(e)
	{
		$('.menu ul').fadeOut(400);
		$('.menu .logo').fadeOut(300);
		$('.menu .phone').fadeOut(300);

		$('.navbar-burger').toggleClass('is-active');

		setTimeout( () => { $('.menu').removeClass("is-active"); }, 400);
	});



	$('.menu .menu-item').click(function(e)
	{
		$('.bt-close-menu').click();
	});

	





	

	$('.slide-galeria').owlCarousel({
		// autoplayTimeout: 0,
		dots: false,
		nav: true,
		smartSpeed: 800,
		items: 1,
		margin: 1,
		navText: [
			'<img src="'+HTTP+'/assets/img/icons/arrow-left.svg"  alt="">',
			'<img src="'+HTTP+'/assets/img/icons/arrow-right.svg" alt="">'
		],
		// responsive: {
		// 	0: {
		// 		margin: 5,
		// 	},
		// 	768: {
		// 		margin: 5,
		// 	}
		// }
	});



	$('.slide-plaza-beach').owlCarousel({
		// autoplay: true,
		// autoplayTimeout: 6000,
		margin: 0,
		dots: false,
		nav: true,
		items: 1,
		smartSpeed: 800,
		navText: [
			'<img src="'+HTTP+'/assets/img/icons/arrow-left.svg"  alt="">',
			'<img src="'+HTTP+'/assets/img/icons/arrow-right.svg" alt="">'
		],
	});




	$('.bt-show-itens-lazer').click(function(e)
	{
		$('.box-itens-lazer').toggleClass('is-active');
	});





	$(".serv-list .bt-expand").on("click", function(e)
	{
		e.preventDefault();

		const __this 	= $(this);
		const __parent 	= $(this).parent();
		const __content = __parent.find(".content");

		if( __this.hasClass('is-active') )
		{
			__this.find(".icone").removeClass('is-active');
			__content.css("max-height", "");
			__content.removeClass("mt15 mb30");
		}else{
			__this.find(".icone").addClass('is-active');
			__content.addClass("mt15 mb30");
			__content.css("max-height", (__content.prop("scrollHeight") + 0) + "px");
		}

		__this.toggleClass('is-active');
		__parent.toggleClass('is-active');
	});



	
	



	// if( IS_MOBILE )
	// {
	// 	const video = document.getElementById('video');

	// 	setTimeout(() => {
	// 		video.play().catch(() => {
	// 			document.addEventListener('click', () => {
	// 				video.play();
	// 			}, { once: true });
	// 		});
	// 	}, 100);
	// }







	// COOKIES

	$('#bt-cookies').click(function(e)
	{
		e.preventDefault();

		$.ajax({
			type: 'POST',
			url: HTTP + 'php/ajax/aceitar-cookies.php',
			success: function(output)
			{
				if(output == 1) $('.cookies').fadeOut(200);
			}
		});
	});



	



	// MASK
	$('.telefone').mask('(99) 99999-9999');



	// SEND FORM
	$('#form-contato').submit(function()
	{
		const __this = $(this);
		var DATA 	 = $(this).serialize();

		$(this).find('button').addClass('is-loading');


		$.ajax({
			type: 'POST',
			url: HTTP+'/php/envios/Envio-contato.php',
			data: DATA,
			dataType: 'json',
			success: function(json)
			{
				__this.find('button').removeClass('is-loading');

				if(json.status=="1")
				{
					__this.find('input').val('');
					// __this.find('textarea').val('');

					Swal.fire({
						title: 'SUCESSO!',
						html: json.message,
						icon: 'success',
						confirmButtonText: 'Ok'
					});
				}
				else
				{
					msgAlert(json.message);
				}
			}
		});
			
		return false;
	});

});




function msgAlert(message){
	Swal.fire({ title: 'Ops!', html: message, icon: 'warning', confirmButtonText: 'Ok'});
}