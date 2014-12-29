<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/styles.css" rel="stylesheet">
		<script type="https://code.jquery.com/jquery-2.1.3.min.js"></script>
		<script type="js/bootstrap.js"></script>
		<script type="js/functions.js"></script>
	</head>
	<body>
		<h1>Goldmine</h1>
		<?php
			echo form_open();
			echo form_label("newsong :");
			echo form_input("link");
			echo form_label("to :");
			echo form_input("pl_name");
			echo form_submit("add","Add");
		?>
		<div class="main">
			<div class="panel panel-default">
				  <div class="panel-body">
				    <div class="embed-responsive embed-responsive-16by9">
	  					<iframe class="embed-responsive-item" src="//www.youtube.com/embed/Nj8r3qmOoZ8"></iframe>
					</div>
				  </div>
				  <div class="panel-footer">Panel footer</div>
			</div>
			<div class="list-group">
			  <a href="#" class="list-group-item active">
			    Cras justo odio
			  </a>
			  <a href="#" class="list-group-item">Dapibus ac facilisis in</a>
			  <a href="#" class="list-group-item">Morbi leo risus</a>
			  <a href="#" class="list-group-item">Porta ac consectetur ac</a>
			  <a href="#" class="list-group-item">Vestibulum at eros</a>
			</div>
		</div>		
	</body>
</html>