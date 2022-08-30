console.log('%c Proudly Crafted with ZiOn.', 'background: #222; color: #bada55');

/* ---------------------------------------------- /*
 * Preloader
 /* ---------------------------------------------- */
(function(){
    $(window).on('load', function() {
        $('.loader').fadeOut();
        $('.page-loader').delay(350).fadeOut('slow');
    });

    $(document).ready(function() {


	 // verificar socios, esto valida si el rut con guion es valido para luego entrar el cico ajax

        var Fn = {
            // Valida el rut con su cadena completa "XXXXXXXX-X"
            validaRut : function (rutCompleto) {
                    return false;
                var tmp     = rutCompleto.split('-');
                var digv    = tmp[1]; 
                var rut     = tmp[0];
                if ( digv == 'K' ) digv = 'k' ;
                return (Fn.dv(rut) == digv );
            },
            dv : function(T){
                var M=0,S=1;
                for(;T;T=Math.floor(T/10))
                    S=(S+T%10*(9-M++%6))%11;
                return S?S-1:'k';
            }
        }

        $("#btnsociomodal").click(function(){
           
            if (Fn.validaRut( $("#search").val() )){
               //Si el rut es valido entrara al ajax y enviara los datos rut.php
                $.ajax({
                    type: "POST",
                    url: "php/rut.php",
                    data: $("#buscarRut").serialize(),
                    success: function(data){
                        $("#messg").removeClass("alert alert-danger alert-success");/* REMUEVE AMBAS CLASES, DEPENDIENDO DE LA QUE SE ENCUENTRE ACTIVA*/
                        $("#messg").html("");
                        $("#messg").addClass("alert-success");
                        $("#messg").html(data);
                        return false;
                    }   
                });                
            }

            else if (Fn.validaRut( $("#search").val("") )){
                $("#messg").removeClass("alert alert-danger alert-success");/* REMUEVE AMBAS CLASES, DEPENDIENDO DE LA QUE SE ENCUENTRE ACTIVA*/
                $("#messg").html("");
                $("#messg").addClass("alert alert-danger");
                $("#messg").html("DEBE ESCRIBIR UN RUT");
                return false;
            }

            else {
                $("#messg").removeClass("alert alert-danger alert-success");/* REMUEVE AMBAS CLASES, DEPENDIENDO DE LA QUE SE ENCUENTRE ACTIVA*/
                $("#messg").html("");
                $("#messg").addClass("alert alert-danger");
                $("#messg").html( "DEBE INGRESAR UN RUT CORRECTO");
                return false;
            }
            document.getElementById("buscarRut").reset();
            return false;

        });
        
        //Cierra la modal de validacion de socio y limpia el id messg desde el boton cerrar
         $('#closeRut').click(function() {
            
            $("#messg").removeClass("alert alert-danger alert-success");
            $("#messg").html("");
            
        });
       //Cierra la modal de validacion de socio y limpia el id messg desde la equis de cerrar superior
        $('#closeRutHead').click(function() {
            
            $("#messg").removeClass("alert alert-danger alert-success");
            $("#messg").html("");
            
        });

	 /*var rut =$("#search").val();
	 switch ( rut.length) {
		case 0:
		     $("#messg").addClass("alert alert-danger");
			$("#messg").html( "DEBE ESCRIBIR UN RUT");
		break;
		case 1:
		case 2:
		case 3:
		case 4:
		case 5:
		case 6:
		case 7:
		    $("#messg").addClass("alert alert-danger");
			$("#messg").html( "DEBE INGRESAR EL RUT SEGÚN EL EJEMPLO");
		break;
		case 8:
		case 9:
		var zero = "0"
		rut=zero.concat(rut);
		if (!/^[0-9]+[-|‐]{1}[0-9kK]{1}$/.test(rut)) {
                $("#messg").addClass("alert alert-danger");
				$("#messg").html("DEBE INGRESAR EL RUT SEGÚN EL EJEMPLO");
			}else{
				var url ="http://web.credumontt.cl/rut.php";
				$.ajax({
					url: url,
					data: {"search" :rut},
				type:"GET" }).done(function(data){
				$("#messg").addClass("alert alert-success");
				$("#messg").html(data);
				});


			}
		break;
		case 10:
		if (!/^[0-9]+[-|‐]{1}[0-9kK]{1}$/.test(rut)) {
                $("#messg").addClass("alert alert-danger");
				$("#messg").html("DEBE INGRESAR EL RUT SEGÚN EL EJEMPLO");
			}else{
				var url ="http://web.credumontt.cl/rut.php";
				$.ajax({
					url: url,
					data: {"search" :rut},
				type:"GET" }).done(function(data){
				$("#messg").addClass("alert alert-success");
				$("#messg").html(data);
				});


			}
		break;
		default:
		$("#messg").addClass("alert alert-danger");
		pmsg.innerHTML = " RUT DEMASIADO LARGO";
		break;
	}*/

        $("#fullbenefits").hide();
	//Modal promo
	  	$('#modpa').on ('click', function() {
		 $("#portalmodal").modal();
		});

	//Modal Socios
	  	$('#socios_lnk').on ('click', function() {
		 $("#SociosModal").modal();
		});

	// modal google maps
		$('#suc_stgo_lnk').on ('click', function() {
		 $("#StgoModal").modal();
		});

			$('#suc_cqns_lnk').on ('click', function() {
		 $("#CqnsModal").modal();
		});

		$('#suc_chln_lnk').on ('click', function() {
		 $("#ChlnModal").modal();
		});

		$('#suc_conc_lnk').on ('click', function() {
		 $("#ConcModal").modal();
		});

		$('#suc_lser_lnk').on ('click', function() {
		 $("#LserModal").modal();
		});

		$('#suc_tmco_lnk').on ('click', function() {
		 $("#TmcoModal").modal();
		});

		$('#suc_vidm_lnk').on ('click', function() {
		 $("#VidmModal").modal();
		});

       
        
        //Script para hacer apareccer un modal con un aviso al momento de iniciar la pagina
 		
 		/*$(document).ready(function(){
         $("#aviso").modal("show");
        });*/

//         $('#about_coop').on ('click', function() {
// 		    $(window).animate({ scrollTop: $('#about').offset().top},3000);
            

// 		});

        /* ---------------------------------------------- /*
         * WOW Animation When You Scroll
         /* ---------------------------------------------- */

        wow = new WOW({
            mobile: false
        });
        wow.init();


        /* ---------------------------------------------- /*
         * Scroll top
         /* ---------------------------------------------- */

        $(window).scroll(function() {
            if ($(this).scrollTop() > 100) {
                $('.scroll-up').fadeIn();
            } else {
                $('.scroll-up').fadeOut();
            }
        });

        $('a[href="#totop"]').click(function() {
            $('html, body').animate({ scrollTop: 0 }, 'slow');
            return false;
        });


        //Opciones para Menu Nosotros

        $('.scrollitdown').click(function(){
            var linkid = $(this).attr("href");
                $('html, body').animate({scrollTop:$(linkid).offset().top},'slow');
        });

        $(document).ready(function() {
            //Para abrir expander y retraer los paneles de la seccion nosotros desde el menu
            $("#about_coop").click(function() {

                if ($('#about1').hasClass("in")) {
                    $("#about1").removeClass("in");
                }

                else {
                    $('#about1').addClass("in");
                    $("#about2").removeClass("in");
                    $("#about3").removeClass("in");         
                }
            });

            $("#about_orga").click(function() {

                if ($("#about2").hasClass("in")) {
                    $("#about2").removeClass("in"); 
                }

                else {
                    $("#about2").addClass("in");
                    $("#about1").removeClass("in");
                    $("#about3").removeClass("in");
                }
            });

            $("#about_cismo").click(function() {

                if ($("#about3").hasClass("in")) {
                    $("#about3").removeClass("in"); 
                }

                else {
                    $("#about3").addClass("in");
                    $("#about1").removeClass("in");
                    $("#about2").removeClass("in");
                }
            });
            
            
                            
        });

//Ver y ocultar beneficios
    var btn = 0; //Definimos la Variable
    $("#view_ben").click(function() { //Function del Click
        if (btn === 0) { //Condicion de la Variable = 0
            btn = 1; //Cambiamos a 1
            $("#view_ben").text("Ocultar beneficios"); //Modificamos el Texto del Boton
            $("#fullbenefits").stop().fadeIn("slow"); //Mostramos el Panel
            $("#view_ben").attr("href","#ver_beneficios");
            $("html, body").animate({scrollTop: $("#collapsed_ver").offset().top},1000);
    
        }else{ //Al darle Click de Nuevo
            btn = 0; //Cambiamos a 0
            $("#view_ben").text("Ver los beneficios"); //Modificamos el Texto del Boton
            $("#view_ben").attr("href","#beneficios");
            $("#fullbenefits ").stop().fadeOut("slow"); //Ocultamos el Panel
            $("html, body").animate({scrollTop: $("#beneficios").offset().top},1000);
        }
});

$("#seeall").on("click", function(){
    var posicion = $("#ver_bnf").offset().top;
    $("html, body").animate({
        scrollTop: posicion
    }, 200); 
}); 
/*--------------------------------------------------------- 
Slider corresponde a la imagen animada de los beneficios y tambien es para ver y ocultar beneficios
---------------------------------------------------------*/

    var btn = 0; //Definimos la Variable
    $("#slider").click(function() { //Function del Click
        if (btn === 0) { //Condicion de la Variable = 0
            btn = 1; //Cambiamos a 1
            $("#view_ben").text("Ocultar beneficios"); //Modificamos el Texto del Boton
            $("#fullbenefits").stop().fadeIn("slow"); //Mostramos el Panel
            $("#view_ben").attr("href","#ver_beneficios");
            $("html, body").animate({scrollTop: $("#collapsed_ver").offset().top},1000);
    


        }else{ //Al darle Click de Nuevo
            btn = 0; //Cambiamos a 0
            $("#view_ben").text("Ver los beneficios"); //Modificamos el Texto del Boton
            $("#fullbenefits ").stop().fadeOut("slow"); //Ocultamos el Panel
            $("#view_ben").attr("href","#beneficios");
            $("html, body").animate({scrollTop: $("#beneficios").offset().top},1000);
        }
});

        /* ---------------------------------------------- /*
         * Initialization General Scripts for all pages
         /* ---------------------------------------------- */

        var homeSection = $('.home-section'),
            navbar      = $('.navbar-custom'),
            navHeight   = navbar.height(),
            worksgrid   = $('#works-grid'),
            width       = Math.max($(window).width(), window.innerWidth),
            mobileTest  = false;

        if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            mobileTest = true;
        }

        buildHomeSection(homeSection);
        navbarAnimation(navbar, homeSection, navHeight);
        navbarSubmenu(width);
        hoverDropdown(width, mobileTest);

        $(window).resize(function() {
            var width = Math.max($(window).width(), window.innerWidth);
            buildHomeSection(homeSection);
            hoverDropdown(width, mobileTest);
        });

        $(window).scroll(function() {
            effectsHomeSection(homeSection, this);
            navbarAnimation(navbar, homeSection, navHeight);
        });

        /* ---------------------------------------------- /*
         * Set sections backgrounds
         /* ---------------------------------------------- */

        var module = $('.home-section, .module, .module-small, .side-image');
        module.each(function(i) {
            if ($(this).attr('data-background')) {
                $(this).css('background-image', 'url(' + $(this).attr('data-background') + ')');
            }
        });

        /* ---------------------------------------------- /*
         * Home section height
         /* ---------------------------------------------- */

        function buildHomeSection(homeSection) {
            if (homeSection.length > 0) {
                if (homeSection.hasClass('home-full-height')) {
                    homeSection.height($(window).height());
                } else {
                    homeSection.height($(window).height() * 0.85);
                }
            }
        }


        /* ---------------------------------------------- /*
         * Home section effects
         /* ---------------------------------------------- */

        function effectsHomeSection(homeSection, scrollTopp) {
            if (homeSection.length > 0) {
                var homeSHeight = homeSection.height();
                var topScroll = $(document).scrollTop();
                if ((homeSection.hasClass('home-parallax')) && ($(scrollTopp).scrollTop() <= homeSHeight)) {
                    homeSection.css('top', (topScroll * 0.55));
                }
                if (homeSection.hasClass('home-fade') && ($(scrollTopp).scrollTop() <= homeSHeight)) {
                    var caption = $('.caption-content');
                    caption.css('opacity', (1 - topScroll/homeSection.height() * 1));
                }
            }
        }

        /* ---------------------------------------------- /*
         * Intro slider setup
         /* ---------------------------------------------- */

        if( $('.hero-slider').length > 0 ) {
            $('.hero-slider').flexslider( {
                animation: "fade",
                animationSpeed: 1000,
                animationLoop: true,
                prevText: '',
                nextText: '',
                before: function(slider) {
                    $('.titan-caption').fadeOut().animate({top:'-80px'},{queue:false, easing: 'swing', duration: 700});
                    slider.slides.eq(slider.currentSlide).delay(500);
                    slider.slides.eq(slider.animatingTo).delay(500);
                },
                after: function(slider) {
                    $('.titan-caption').fadeIn().animate({top:'0'},{queue:false, easing: 'swing', duration: 700});
                },
                useCSS: true
            });
        }


        /* ---------------------------------------------- /*
         * Rotate
         /* ---------------------------------------------- */

        $(".rotate").textrotator({
            animation: "dissolve",
            separator: "|",
            speed: 3000
        });


        /* ---------------------------------------------- /*
         * Transparent navbar animation
         /* ---------------------------------------------- */

        function navbarAnimation(navbar, homeSection, navHeight) {
            var topScroll = $(window).scrollTop();
            if (navbar.length > 0 && homeSection.length > 0) {
                if(topScroll >= navHeight) {
                    navbar.removeClass('navbar-transparent');
                } else {
                    navbar.addClass('navbar-transparent');
                }
            }
        }

        /* ---------------------------------------------- /*
         * Navbar submenu
         /* ---------------------------------------------- */

        function navbarSubmenu(width) {
            if (width > 767) {
                $('.navbar-custom .navbar-nav > li.dropdown').hover(function() {
                    var MenuLeftOffset  = $('.dropdown-menu', $(this)).offset();
                    var Menu1LevelWidth = $('.dropdown-menu', $(this)).width();
                    if (width - MenuLeftOffset < Menu1LevelWidth * 2) {
                        $(this).children('.dropdown-menu').addClass('leftauto');
                    } else {
                        $(this).children('.dropdown-menu').removeClass('leftauto');
                    }
                    if ($('.dropdown', $(this)).length > 0) {
                        var Menu2LevelWidth = $('.dropdown-menu', $(this)).width();
                        if (width - MenuLeftOffset - Menu1LevelWidth < Menu2LevelWidth) {
                            $(this).children('.dropdown-menu').addClass('left-side');
                        } else {
                            $(this).children('.dropdown-menu').removeClass('left-side');
                        }
                    }
                });
            }
        }

        /* ---------------------------------------------- /*
         * Navbar hover dropdown on desctop
         /* ---------------------------------------------- */

        function hoverDropdown(width, mobileTest) {
            if ((width > 767) && (mobileTest !== true)) {
                $('.navbar-custom .navbar-nav > li.dropdown, .navbar-custom li.dropdown > ul > li.dropdown').removeClass('open');
                var delay = 0;
                var setTimeoutConst;
                $('.navbar-custom .navbar-nav > li.dropdown, .navbar-custom li.dropdown > ul > li.dropdown').hover(function() {
                        var $this = $(this);
                        setTimeoutConst = setTimeout(function() {
                            $this.addClass('open');
                            $this.find('.dropdown-toggle').addClass('disabled');
                        }, delay);
                    },
                    function() {
                        clearTimeout(setTimeoutConst);
                        $(this).removeClass('open');
                        $(this).find('.dropdown-toggle').removeClass('disabled');
                    });
            } else {
                $('.navbar-custom .navbar-nav > li.dropdown, .navbar-custom li.dropdown > ul > li.dropdown').unbind('mouseenter mouseleave');
                $('.navbar-custom [data-toggle=dropdown]').not('.binded').addClass('binded').on('click', function(event) {
                    event.preventDefault();
                    event.stopPropagation();
                    $(this).parent().siblings().removeClass('open');
                    $(this).parent().siblings().find('[data-toggle=dropdown]').parent().removeClass('open');
                    $(this).parent().toggleClass('open');
                });
            }
        }

        /* ---------------------------------------------- /*
         * Navbar collapse on click
         /* ---------------------------------------------- */
        
        $(document).on('click','.navbar-collapse.in',function(e) {
            if( $(e.target).is('a') && $(e.target).attr('class') != 'dropdown-toggle' ) {
                $(this).collapse('hide');
            }
        });

        $(document).on('click','.navbar-collapse.in',function(e) {
            if( $(e.target).is('a') && $(e.target).attr('class') != 'dropdown-toggle' ) {
                $(this).collapse('hide');
            }
        });


        /* ---------------------------------------------- /*
         * Video popup, Gallery
         /* ---------------------------------------------- */

        $('.video-pop-up').magnificPopup({
            type: 'iframe'
        });

        $(".gallery-item").magnificPopup({
            delegate: 'a',
            type: 'image',
            gallery: {
                enabled: true,
                navigateByImgClick: true,
                preload: [0,1]
            },
            image: {
                titleSrc: 'title',
                tError: 'The image could not be loaded.'
            }
        });


        /* ---------------------------------------------- /*
         * Portfolio
         /* ---------------------------------------------- */

        var worksgrid   = $('#works-grid'),
            worksgrid_mode;

        if (worksgrid.hasClass('works-grid-masonry')) {
            worksgrid_mode = 'masonry';
        } else {
            worksgrid_mode = 'fitRows';
        }

        worksgrid.imagesLoaded(function() {
            worksgrid.isotope({
                layoutMode: worksgrid_mode,
                itemSelector: '.work-item'
            });
        });

        $('#filters a').click(function() {
            $('#filters .current').removeClass('current');
            $(this).addClass('current');
            var selector = $(this).attr('data-filter');

            worksgrid.isotope({
                filter: selector,
                animationOptions: {
                    duration: 750,
                    easing: 'linear',
                    queue: false
                }
            });

            return false;
        });


        /* ---------------------------------------------- /*
         * Testimonials
         /* ---------------------------------------------- */

        if ($('.testimonials-slider').length > 0 ) {
            $('.testimonials-slider').flexslider( {
                animation: "slide",
                smoothHeight: true
            });
        }


        /* ---------------------------------------------- /*
         * Post Slider
         /* ---------------------------------------------- */

        if ($('.post-images-slider').length > 0 ) {
            $('.post-images-slider').flexslider( {
                animation: "slide",
                smoothHeight: true,
            });
        }


        /* ---------------------------------------------- /*
         * Progress bar animations
         /* ---------------------------------------------- */

        $('.progress-bar').each(function(i) {
            $(this).appear(function() {
                var percent = $(this).attr('aria-valuenow');
                $(this).animate({'width' : percent + '%'});
                $(this).find('span').animate({'opacity' : 1}, 900);
                $(this).find('span').countTo({from: 0, to: percent, speed: 900, refreshInterval: 30});
            });
        });


        /* ---------------------------------------------- /*
         * Funfact Count-up
         /* ---------------------------------------------- */

        $('.count-item').each(function(i) {
            $(this).appear(function() {
                var number = $(this).find('.count-to').data('countto');
                $(this).find('.count-to').countTo({from: 0, to: number, speed: 1200, refreshInterval: 30});
            });
        });


        /* ---------------------------------------------- /*
         * Youtube video background
         /* ---------------------------------------------- */

        $(function(){
            $(".video-player").mb_YTPlayer();
        });

        $('#video-play').click(function(event) {
            event.preventDefault();
            if ($(this).hasClass('fa-play')) {
                $('.video-player').playYTP();
            } else {
                $('.video-player').pauseYTP();
            }
            $(this).toggleClass('fa-play fa-pause');
            return false;
        });

        $('#video-volume').click(function(event) {
            event.preventDefault();
            if ($(this).hasClass('fa-volume-off')) {
                $('.video-player').YTPUnmute();
            } else {
                $('.video-player').YTPMute();
            }
            $(this).toggleClass('fa-volume-off fa-volume-up');
            return false;
        });


        /* ---------------------------------------------- /*
         * Owl Carousel
         /* ---------------------------------------------- */

        $('.owl-carousel').each(function(i) {

            // Check items number
            if ($(this).data('items') > 0) {
                items = $(this).data('items');
            } else {
                items = 4;
            }

            // Check pagination true/false
            if (($(this).data('pagination') > 0) && ($(this).data('pagination') === true)) {
                pagination = true;
            } else {
                pagination = false;
            }

            // Check navigation true/false
            if (($(this).data('navigation') > 0) && ($(this).data('navigation') === true)) {
                navigation = true;
            } else {
                navigation = false;
            }

            // Build carousel
            $(this).owlCarousel( {
                navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                nav: navigation,
                dots: pagination,
                loop: true,
                dotsSpeed: 400,
                items: items,
                navSpeed: 300,
                autoplay: 2000
            });

        });
         /*===============================================================
         ver los beneficios
         ================================================================*/

		$("#seeall").on('click', function(e) {
			$("#fullbenefits").show();
			scrollTop: $("#fullbenefits").offset().top;
			 e.preventDefault();
		});

        /* ---------------------------------------------- /*
         * Blog masonry
         /* ---------------------------------------------- */

        $('.post-masonry').imagesLoaded(function() {
            $('.post-masonry').masonry();
        });


        /* ---------------------------------------------- /*
         * Scroll Animation
         /* ---------------------------------------------- */

        $('.section-scroll').bind('click', function(e) {
            var anchor = $(this);
            $('html, body').stop().animate({
                scrollTop: $(anchor.attr('href')).offset().top - 50
            }, 1000);
            e.preventDefault();
        });

        /*===============================================================
         Working Contact Form
         ================================================================*/

    //     $("#contactForm").submit(function (e) {
            
    //         e.preventDefault();
    //         var $ = jQuery;

    //         var postData = $(this).serializeArray(),
    //             formURL = $(this).attr("action");

    //         $("#cfsubmit").html("Enviando");

    //         $.ajax(
    //             {
    //                 url: formURL,
    //                 type: "POST",
    //                 data: postData,
    //                 success: function (data) {
    //                     $cfResponse.html(data);
    //                     $scfsubmit.text(cfsubmitText);
    //                     $('#contactForm input[name=nombre]').val("");
    //                     $('#contactForm input[name=correo]').val("");
    //                     $('#contactForm input[name=message]').val("");
    //                     $('#contactForm select[name=regiones]').val('');
    //                     $('#contactForm select[name=comunas]').val('');
    //                     $('#contactForm select[name=asunto]').val('');       

    //                 },
    //                 error: function (data) {
    //                     $("#cfsubmit").html("Error");
    //                 }
    //             });
				//  $("#cfsubmit").html("Gracias");
				//  $("#contacterr").addClass("alert alert-success");
				//   $("#contacterr").html("En breve nos comunicaremos con Usted.");
    //         return false;


    //     });




        /*===============================================================
         Working Request A Call Form
         ================================================================*/



// 		$("#socioForm").submit(function (e) {

//             e.preventDefault();
//             var $ = jQuery;

//             var postData = $(this).serializeArray(),
//                 formURL = $(this).attr("action");

//             $("#scfsubmit").html("Enviando");


//             $.ajax(
//                 {
//                     url: formURL,
//                     type: "POST",
//                     data: postData,
//                     success: function (data) {
//                         $cfResponse.html(data);
//                         $scfsubmit.text(cfsubmitText);
//                         $('#socioForm input[name=name]').val('');
//                         $('#socioForm input[name=email]').val('');
//                         $('#socioForm input[name=comuna]').val('');
//                         $('#socioForm input[name=Phono]').val('');
//                     },
//                     error: function (data) {
//                         $("#scfsubmit").html("Error");
//                     }
//                 });
// 				 $("#scfsubmit").html("Gracias");
// 				 $("#errrform").addClass("alert alert-success");
// 				  $("#errrform").html("En breve nos comunicaremos con Usted.");
//             return false


//         });


        /*===============================================================
         Simulador de creditos
         ================================================================*/
         $("#simul").click(function(){
            $.ajax(
            {
                type: "POST",
                url: "php/simulador.php",
                data: $("#simulador").serialize(),
                success: function(data){
                        
                    $("#respuestaForm").html(data);
                }

            });
            return false;
         });
         

        /*===============================================================
         Working Reservation Form
         ================================================================*/

        $("#reservationForm").submit(function (e) {

            e.preventDefault();
            var $ = jQuery;

            var postData = $(this).serializeArray(),
                formURL = $(this).attr("action"),
                $cfResponse = $('#reservationFormResponse'),
                $cfsubmit = $("#rfsubmit"),
                cfsubmitText = $cfsubmit.text();

            $cfsubmit.text("Sending...");


            $.ajax(
                {
                    url: formURL,
                    type: "POST",
                    data: postData,
                    success: function (data) {
                        $cfResponse.html(data);
                        $cfsubmit.text(cfsubmitText);
                        $('#reservationForm input[name=date]').val('');
                        $('#reservationForm input[name=time]').val('');
                        $('#reservationForm textarea[name=people]').val('');
                        $('#reservationForm textarea[name=email]').val('');
                    },
                    error: function (data) {
                        alert("Error occurd! Please try again");
                    }
                });

            return false;

        });


        /* ---------------------------------------------- /*
         * Subscribe form ajax
         /* ---------------------------------------------- */

        $('#subscription-form').submit(function(e) {

            e.preventDefault();
            var $form           = $('#subscription-form');
            var submit          = $('#subscription-form-submit');
            var ajaxResponse    = $('#subscription-response');
            var email           = $('input#semail').val();

            $.ajax({
                type: 'POST',
                url: 'assets/php/subscribe.php',
                dataType: 'json',
                data: {
                    email: email
                },
                cache: false,
                beforeSend: function(result) {
                    submit.empty();
                    submit.append('<i class="fa fa-cog fa-spin"></i> Wait...');
                },
                success: function(result) {
                    if(result.sendstatus == 1) {
                        ajaxResponse.html(result.message);
                        $form.fadeOut(500);
                    } else {
                        ajaxResponse.html(result.message);
                    }
                }
            });

        });

/* ---------------------------------------------- /*
         * INDICADORES ECONOMICOS
/* ---------------------------------------------- */
		$.getJSON('http://mindicador.cl:80/api', function(data) {
    var dailyIndicators = data;
    $("<p/>", {
        html: '  UF:  ' + dailyIndicators.uf.valor

    }).appendTo("UF");
}).fail(function() {
    console.log('Error al consumir la API!');
});

$.getJSON('http://mindicador.cl:80/api', function(data) {
    var dailyIndicators = data;
    $("<p/>", {
        html: '  USD:  ' + dailyIndicators.dolar.valor

    }).appendTo("USD");
}).fail(function() {
    console.log('Error al consumir la API!');
});

$.getJSON('http://mindicador.cl:80/api', function(data) {
    var dailyIndicators = data;
    $("<p/>", {
        html: '  EURO:  ' + dailyIndicators.euro.valor

    }).appendTo("EUR");
}).fail(function() {
    console.log('Error al consumir la API!');
});

$.getJSON('http://mindicador.cl:80/api', function(data) {
    var dailyIndicators = data;
    $("<p/>", {
        html: '  IPC:  ' + dailyIndicators.ipc.valor

    }).appendTo("IPC");
}).fail(function() {
    console.log('Error al consumir la API!');
});

$.getJSON('http://mindicador.cl:80/api', function(data) {
    var dailyIndicators = data;
    $("<p/>", {
        html: '  UTM:  ' + dailyIndicators.utm.valor

    }).appendTo("UTM");
}).fail(function() {
    console.log('Error al consumir la API!');
});

$.getJSON('http://mindicador.cl:80/api', function(data) {
    var dailyIndicators = data;
    $("<p/>", {
        html: '  IVP: ' + dailyIndicators.ivp.valor

    }).appendTo("IVP");
}).fail(function() {
    console.log('Error al consumir la API!');
});


        /* ---------------------------------------------- /*
         * Google Map
         /* ---------------------------------------------- */

        if($("#map").length == 0 || typeof google == 'undefined') return;

        // When the window has finished loading create our google map below
        google.maps.event.addDomListener(window, 'load', init);

        var mkr = new google.maps.LatLng(40.6700, -74.2000);
        var cntr = (mobileTest) ? mkr : new google.maps.LatLng(40.6700, -73.9400);

        function init() {
            // Basic options for a simple Google Map
            // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
            var mapOptions = {
                // How zoomed in you want the map to start at (always required)
                zoom: 11,
                scrollwheel: false,
                // The latitude and longitude to center the map (always required)
                center: cntr, // New York

                // How you would like to style the map.
                // This is where you would paste any style found on Snazzy Maps.
                styles: [
                    {
                        "featureType": "all",
                        "elementType": "geometry.fill",
                        "stylers": [
                            {
                                "visibility": "on"
                            },
                            {
                                "saturation": "-11"
                            }
                        ]
                    },
                    {
                        "featureType": "administrative",
                        "elementType": "geometry.fill",
                        "stylers": [
                            {
                                "saturation": "22"
                            }
                        ]
                    },
                    {
                        "featureType": "administrative",
                        "elementType": "geometry.stroke",
                        "stylers": [
                            {
                                "saturation": "-58"
                            },
                            {
                                "color": "#cfcece"
                            }
                        ]
                    },
                    {
                        "featureType": "administrative",
                        "elementType": "labels.text",
                        "stylers": [
                            {
                                "color": "#f8f8f8"
                            }
                        ]
                    },
                    {
                        "featureType": "administrative",
                        "elementType": "labels.text.fill",
                        "stylers": [
                            {
                                "color": "#999999"
                            },
                            {
                                "visibility": "on"
                            }
                        ]
                    },
                    {
                        "featureType": "administrative",
                        "elementType": "labels.text.stroke",
                        "stylers": [
                            {
                                "visibility": "on"
                            }
                        ]
                    },
                    {
                        "featureType": "administrative.country",
                        "elementType": "geometry.fill",
                        "stylers": [
                            {
                                "color": "#f9f9f9"
                            },
                            {
                                "visibility": "simplified"
                            }
                        ]
                    },
                    {
                        "featureType": "landscape",
                        "elementType": "all",
                        "stylers": [
                            {
                                "color": "#f2f2f2"
                            }
                        ]
                    },
                    {
                        "featureType": "landscape",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "saturation": "-19"
                            },
                            {
                                "lightness": "-2"
                            },
                            {
                                "visibility": "on"
                            }
                        ]
                    },
                    {
                        "featureType": "poi",
                        "elementType": "all",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "road",
                        "elementType": "all",
                        "stylers": [
                            {
                                "saturation": -100
                            },
                            {
                                "lightness": 45
                            }
                        ]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "all",
                        "stylers": [
                            {
                                "visibility": "simplified"
                            }
                        ]
                    },
                    {
                        "featureType": "road.arterial",
                        "elementType": "labels.icon",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "transit",
                        "elementType": "all",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "water",
                        "elementType": "all",
                        "stylers": [
                            {
                                "color": "#d8e1e5"
                            },
                            {
                                "visibility": "on"
                            }
                        ]
                    },
                    {
                        "featureType": "water",
                        "elementType": "geometry.fill",
                        "stylers": [
                            {
                                "color": "#dedede"
                            }
                        ]
                    },
                    {
                        "featureType": "water",
                        "elementType": "labels.text",
                        "stylers": [
                            {
                                "color": "#cbcbcb"
                            }
                        ]
                    },
                    {
                        "featureType": "water",
                        "elementType": "labels.text.fill",
                        "stylers": [
                            {
                                "color": "#9c9c9c"
                            }
                        ]
                    },
                    {
                        "featureType": "water",
                        "elementType": "labels.text.stroke",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    }
                ]
            };

            // Get the HTML DOM element that will contain your map
            // We are using a div with id="map" seen below in the <body>
            var mapElement = document.getElementById('map');

            // Create the Google Map using our element and options defined above
            var map = new google.maps.Map(mapElement, mapOptions);

            // Let's also add a marker while we're at it
            var image = new google.maps.MarkerImage('assets/images/map-icon.png',
                new google.maps.Size(59, 65),
                new google.maps.Point(0, 0),
                new google.maps.Point(24, 42)
            );

            var marker = new google.maps.Marker({
                position: mkr,
                icon: image,
                title: 'Titan',
                infoWindow: {
                    content: '<p><strong>Rival</strong><br/>121 Somewhere Ave, Suite 123<br/>P: (123) 456-7890<br/>Australia</p>'
                },
                map: map,
            });
        }
    });


  	$("#about-coop").on('click', function() {
      alert("presionaste button");
    });
})(jQuery);