	<script>
							var toggle = true;
										
							$(".sidebar-icon").click(function() {                
							  if (toggle)
							  {
								$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
								$("#menu span").css({"position":"absolute"});
							  }
							  else
							  {
								$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
								setTimeout(function() {
								  $("#menu span").css({"position":"relative"});
								}, 400);
							  }
											
											toggle = !toggle;
										});
							</script>
<!--js -->
<link rel="stylesheet" href="assets/css/vroom.css">
<script type="text/javascript" src="assets/js/vroom.js"></script>
<script type="text/javascript" src="assets/js/TweenLite.min.js"></script>
<script type="text/javascript" src="assets/js/CSSPlugin.min.js"></script>
<script src="assets/js/jquery.nicescroll.js"></script>
<script src="assets/js/scripts.js"></script>

<!-- Bootstrap Core JavaScript -->
   <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>