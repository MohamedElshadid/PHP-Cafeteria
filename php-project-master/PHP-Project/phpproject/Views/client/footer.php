
<!-- footer -->
<div class="footer">
		<div class="container">
			<div class="col-md-8 w3_footer_grid text-center ml-3">
				<p style="color:white">© 2020 OS ITI. All rights reserved </p>
			</div>
		</div>
	</div>
<!-- //footer -->
<!-- Bootstrap Core JavaScript -->
<script src="../../public/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');       
        }
    );
});
</script>
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->
<script src="../../public/js/minicart.js"></script>
<script>
		paypal.minicart.render();

		paypal.minicart.cart.on('checkout', function (evt) {
			var items = this.items(),
				len = items.length,
				total = 0,
				i;

			// Count the number of each item in the cart
			for (i = 0; i < len; i++) {
				total += items[i].get('quantity');
			}

			if (len > 1 ) {;
				alert('The maximum order Type is 1.');
				evt.preventDefault();
			}
			else{
				console.log(items[0]._data);
				// $.ajax({
				// 	url: "../../Controller/ClientController.php",
				// 	method: "post",
				// 	contentType: "Application/json",
				// 	data: JSON.stringify({
				// 		data : items[0]._data
				// 		}
				// 	),
				// 	dataType: "text",
				// 	success(data) {
				// 		alert(data);
				// 	},
				// 	error(error) {
				// 		console.log(error);
				// 	}
				// });
			}
		});

	</script>
</body>
</html>
