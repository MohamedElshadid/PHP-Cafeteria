<!-- header -->
<div class="agileits_header">
		<div class="w3l_offers">
		</div>
		<div class="w3l_search">
			
		</div>
		<div class="product_list_header mb-3">  
			<form action="#" method="post" class="last">
                <fieldset>
                    <input type="hidden" name="cmd" value="_cart" />
                    <input type="hidden" name="display" value="1" />
                    <input type="submit" name="submit" value="View your cart" class="button" />
                </fieldset>
            </form>
		</div>
		
		<div class="w3l_header_right">
			
		</div>
		<div class="w3l_header_right1">
		</div>
		<div class="clearfix"> </div>
	</div>
	<div class="text-success" style="border:1px solid red;float:right">
		<span style="font-weight:bold">Welcome <?php echo $_SESSION['user']; ?>&nbsp;&nbsp;</span>
		<span><a href="../admin/logout.php?islogout=true"><em class="fa fa-power-off">&nbsp;</em> Logout</a></span>
		
	</div>
<!-- script-for sticky-nav -->
	<script>
	$(document).ready(function() {
		 var navoffeset=$(".agileits_header").offset().top;
		 $(window).scroll(function(){
			var scrollpos=$(window).scrollTop(); 
			if(scrollpos >=navoffeset){
				$(".agileits_header").addClass("fixed");
			}else{
				$(".agileits_header").removeClass("fixed");
			}
		 });
		 
	});
	</script>
<!-- //script-for sticky-nav -->
	<div class="logo_products">
		<div class="container">
			<div class="w3ls_logo_products_left">
				<h1><a href="/"><span>Cafteria</span> Products</a></h1>
			</div>
			<div class="w3ls_logo_products_left1">
				<!-- <ul class="special_items">
					<li><a href="">Products</a><i>/</i></li>
					<li><a href="">CheckOut</a></li>
				</ul> -->
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //header -->