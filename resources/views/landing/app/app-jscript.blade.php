<script type="text/javascript">

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


	$(document).ready(function(){
		$('input.autocomplete').autocomplete({
			data: {
				@foreach($gunungs as $guns)
				"{{$guns->nama}}": null,
				@endforeach
			},

			onAutocomplete: function(val) {

           // Callback function when value is autcompleted.

           // Grabbing input after autocomplete is done
           var value = $('input.autocomplete').val();

           switch(value) {
           	@foreach($gunungs as $guns)
           	case "{{$guns->nama}}":
           	var link = window.open('{{url('/info-gunung/'.$guns->nama)}}', '_self');
           	link.location;
           	break;
           	@endforeach
           	default:
           	
           }

       },

   });
	});


</script>