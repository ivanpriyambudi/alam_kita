<script>
	$(document).ready(function(){
		$('.sidenav').sidenav();
		$('#sidenav-1').sidenav({ edge: 'left' });
	});
	
	$(document).ready(function(){
		$('.materialboxed').materialbox();
	});

	$(document).ready(function(){
		$('select').formSelect();
	});

	$(document).ready(function(){
		$('.datepicker').datepicker();
	});

	$(document).ready(function(){
		$('.modal').modal();
	});

	$(document).ready(function(){
		$('.tabs').tabs();
	});

	$(".dropdown-trigger").dropdown();

	$(document).ready(function(){
		$('.slider').slider({
			height: '100%'
		});
	});

	$(document).ready(function(){
		$('.collapsible').collapsible();
	});

	$(document).ready(function(){
		$('.parallax').parallax();
	});

	window.onscroll = () => {
		const nav = document.querySelector('#navbar');
		if(this.scrollY <= 10) nav.className = ''; else nav.className = 'scroll';
	};

	$(document).ready(function() {

		function isScrolledIntoView(elem) {
			var docViewTop = $(window).scrollTop();
			var docViewBottom = docViewTop + $(window).height();

			var elemTop = $(elem).offset().top;
			var elemBottom = elemTop + $(elem).height();

			return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
		}

		$(window).scroll(function() {
			$('.scroll-animations .animated').each(function() {
				if (isScrolledIntoView(this) === true) {
					$(this).removeClass('is-visible');
					$(this).addClass('bounceIn');
				}
			});
		});
	});


</script>