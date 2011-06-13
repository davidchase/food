<?php include_once('inc/functions.php'); ?> 
 <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
 <title>Main Page</title>
 	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<link rel="stylesheet" type="text/css" href="css/form.css" />
	<link rel="stylesheet" type="text/css" href="css/jquery.fancybox-1.3.4.css" media="screen" />
	
	<script type="text/javascript" src="js/highlight.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
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
		});

	</script>