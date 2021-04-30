
/* -----------------------------------------
GOOGLE MAPS
-------------------------------------------- */

var gMaps = function()
{

	if($('#map').length > 0){

		var styleArray = [{
			featureType: "all",
			stylers: [
			{ saturation: -10 }
		]},{
			featureType: "road.arterial",
			elementType: "geometry",
			stylers: [
				{ hue: "#C9A343" },
				{ saturation: 100 }
			]
		},{
		  	featureType: "poi.business",
		  	elementType: "labels"
		 	
		}];

		var map;
		var dataLat = parseFloat($('#map').attr('data-lat'));
		var dataLong = parseFloat($('#map').attr('data-long'));
		var myLatLng = {lat: dataLat, lng: dataLong};
		var directionsDisplay;
		var directionsService = new google.maps.DirectionsService();

		function initMap() {

			directionsDisplay = new google.maps.DirectionsRenderer(); // Instanciando...
			
			map = new google.maps.Map(document.getElementById('map'), {
				center: myLatLng,
				zoom: 17,
				styles: styleArray,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			});

			var marker = new google.maps.Marker({
				map: map,
				position: myLatLng,
				title: 'Hideaway',
				//icon: hc.path+'images/marcador.png'
			});

			directionsDisplay.setMap(map);
			directionsDisplay.setPanel(document.getElementById("trajeto-texto"));

			if($(window).width() < 1024){
				map.setOptions({
					draggable: false,
					disableDoubleClickZoom: false,
					rotateControl: false,
					scaleControl: false,
					scrollwheel: false
				});
			}

		}

		initMap();

		$("form#trajeto").submit(function(event) {
		   
		   event.preventDefault();
		 
		   var enderecoPartida = $("#txtEnderecoPartida").val();
		   var enderecoChegada = $("#txtEnderecoChegada").val();
		 
		   var request = { // Novo objeto google.maps.DirectionsRequest, contendo:
		      origin: enderecoPartida, // origem
		      destination: enderecoChegada, // destino
		      travelMode: google.maps.TravelMode.DRIVING // meio de transporte, nesse caso, de carro
		   };
		 
		   directionsService.route(request, function(result, status) {
		      if (status == google.maps.DirectionsStatus.OK) { // Se deu tudo certo
		         directionsDisplay.setDirections(result); // Renderizamos no mapa o resultado
		      }
		   });
		});

		$(document).keypress(function(e) {
	    if(e.which == 13) {
	      $("form#trajeto").submit();
	    }
		});

	}
}


/* -----------------------------------------
SLIDES DE IMAGENS
-------------------------------------------- */

var allSwipers = function()
{

	var swiperBanner = new Swiper('#webdoor .swiper-container', {
    pagination: '#webdoor .bullets',
    paginationClickable: true,
    grabCursor : true,
    loop : true,
    spaceBetween: 0,
    autoplay: 5500,
    speed: 1000,
    effect: 'fade'
  });

  var swiperBanner = new Swiper('.slideFotos .swiper-container', {
    pagination: '.slideFotos .bullets',
    paginationClickable: true,
    grabCursor : true,
    loop : true,
    spaceBetween: 0,
    autoplay: 5500,
    speed: 1000,
    effect: 'fade'
  });

}


/* -----------------------------------------
FUNÇÕES BÁSICAS
-------------------------------------------- */

var initBeforeLoad = function()
{
	var defineCurrentMenu = function()
	{
		var url = location.pathname.split('/').slice(-3)[0];

		$('body > header nav .menu-principal-container ul#top-menu li a').each(function(){
			if($(this).attr('rel') == url)
			{
				$(this).parent('li').addClass('current-menu-ancestor');
				$(this).parent('li').parent('ul').parent('li').addClass('current-menu-ancestor');
			}
		});
	}

	defineCurrentMenu();

	var sidebarSize = function()
	{
		var conteudo = $('#wrapContent'),
			sidebar = $('#sidebar');

		if(conteudo.height() > sidebar.height() && $(window).width() > 680)
		{
			sidebar.height(conteudo.height());
		}

	}

	sidebarSize();

	$(window).resize(function(){
		sidebarSize();
	});

}

var initAfterLoad = function()
{

	var accordeon = function()
	{

		function zeraAccordeon()
		{
			$('#mainContent .conteudoTextos dl dt').removeClass('opened');
			$('#mainContent .conteudoTextos dl dd').animate({height : 0},300);
		}

		$('#mainContent .conteudoTextos dl dt').on('click',function(){
			if(!$(this).hasClass('opened'))
			{
				zeraAccordeon();
				$(this).addClass('opened').next('dd').stop(true,true).animate({height : $(this).next('dd').find('div.answer').innerHeight()},300);
			}
			else
			{
				zeraAccordeon();
			}
		})

	}

	accordeon();

	var propBox = function()
	{
		var resizeBox = function(obj)
		{
			var nH = (315 * obj.width()) / 560;
			obj.css({'clear':'both'}).height(nH);
		}		
		$('iframe,.proBox').each(function(){
			resizeBox($(this));
		});
	}

	propBox();

	var zeraMenu = function()
	{
		$('body > header nav ul.sub-menu').removeClass('opened');
		$('body > header nav ul#top-menu > li.menu-item-has-children > a').removeClass('opened');
	}

	var menuMobile = function()
	{
		var $mainMenu = $('body > header nav .mobileWrap'),
			$botOpen = $('body > header nav .actions a.open'),
			$botClose = $('body > header nav .actions a.close');

		if($(window).width() <= 992)
		{
			$botOpen.on('click',function(e){
				e.preventDefault();
				$mainMenu.addClass('opened');
				$(this).removeClass('activated');
				$botClose.addClass('activated');
			});
			$botClose.on('click',function(e){
				e.preventDefault();
				$mainMenu.removeClass('opened');
				$(this).removeClass('activated');
				$botOpen.addClass('activated');
				zeraMenu();
			});
		}

	}

	menuMobile();

	var subMenuMobile = function()
	{

		if($(window).width() <= 992)
		{
			$('body > header nav ul#top-menu > li.menu-item-has-children > a').on('click',function(e){
				e.preventDefault();
				if($(this).hasClass('opened'))
				{
					zeraMenu();
				}
				else
				{
					zeraMenu();
					$(this).addClass('opened');
					$(this).next('ul.sub-menu').addClass('opened');
				}
			});
		}
	}

	//subMenuMobile();

	$(window).resize(function(){
		propBox();
		menuMobile();
		//subMenuMobile();
	});

}


/* -----------------------------------------
INICIALIZAÇÃO
-------------------------------------------- */

$(function()
{

	$('a[href="#"]').each(function(){
		$(this).on('click',function(){
			return false;
		});
	});

	$('a.back').on('click',function(e){
		e.preventDefault();
		window.history.back();
	});

	if($(window).width() > 1024)
	{
		$('input.mask-cnpj').mask("999.999.999/9999-99");
		$('input.mask-tel').mask("(99) 9999-9999?9");
	}

	$.fancybox.defaults.hash = false;

	$('form.formulariosDefault').each(function()
	{
		$(this).attr('action',$(this).attr('data-action')).find('div.submit').html('<button form="'+$(this).attr('id')+'">Enviar</button>');
	});

	allSwipers();
	initBeforeLoad();

	if($('form.vfbp-form').length > 0)
	{
		$('form.vfbp-form')[0].reset();
	}

	$(window).resize(function(){
		if($(window).width() > 1024)
		{
			$('input.mask-cnpj').mask("999.999.999/9999-99");
			$('input.mask-tel').mask("(99) 9999-9999?9");
		}
		gMaps();
		allSwipers();
	});
	
	$(window).on('load',function(){
		gMaps();
		initAfterLoad();
	});

});