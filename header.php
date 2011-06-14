<?php include_once('inc/functions.php'); ?> 
 	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<link rel="stylesheet" type="text/css" href="css/form.css" />
	<link rel="stylesheet" type="text/css" href="css/jquery.fancybox-1.3.4.css" media="screen" />
	
	<script type="text/javascript" src="js/highlight.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.fancybox-1.3.4.pack.js"></script>
	<script type="text/javascript" src="js/jquery.mousewheel-3.0.4.pack.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$("#addFood").fancybox({
				'titlePosition'		: 'inside',
				'transitionIn'		: 'elastic',
				'transitionOut'		: 'elastic'
			});
			
				$(".quickAdd").fancybox({
					'titlePosition'		: 'inside',
					'transitionIn'		: 'elastic',
					'transitionOut'		: 'elastic'
				});
				
				$("#edit").fancybox({
					 'padding'          : 0,
       				 'autoScale'     	: false,
        			 'transitionIn'		: 'elastic',
				     'transitionOut'	: 'elastic'
				});
				//When page loads...
					$(".tab_content").hide(); //Hide all content
					$("ul.tabs li:first").addClass("active").show(); //Activate first tab
					$(".tab_content:first").show(); //Show first tab content

					//On Click Event
					$("ul.tabs li").click(function() {

						$("ul.tabs li").removeClass("active"); //Remove any "active" class
						$(this).addClass("active"); //Add "active" class to selected tab
						$(".tab_content").hide(); //Hide all tab content

						var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
						$(activeTab).fadeIn(); //Fade in the active ID content
						return false;
					});
					
			
				
		});
	
</script>