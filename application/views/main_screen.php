<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="<?= base_url() ?>css/bootstrap.min.css" rel="stylesheet">
		<link href="<?= base_url() ?>css/styles.css" rel="stylesheet">
		<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
		<script src="<?= base_url() ?>js/bootstrap.js"></script>
		<script src="<?= base_url() ?>js/functions.js" type="text/javascript"></script>
		<script>
		$(function() {
		      var links = "<?= base_url() ?>main/loadList/<?php echo $id;?>";
		      $.getJSON(links, function(data){
		        //console.log(first);
		        $.each(data, function(link, name){
		          vidIds.push(link);
		          $('#list').append('<a href="javascript:void(0)" id="'+link+'" class="list-group-item">'+name+'</a>');
		        });
		        player.loadVideoById(vidIds[current]);
		        player.playVideo();
		      });
		      $("#list").on('click', 'a.list-group-item', function() {
		        var id = $(this).attr('id');
		        //alert(id);
		       	player.loadVideoById(id);
		        player.playVideo();
		      });
		      $('#repeat').on('click', function(){
		      	if(repeat == 0){
		      		repeat=1;
		      		$('#icon').addClass('glyphicon-random').removeClass('glyphicon-repeat');
		      	}
		      	else if(repeat == 1){
		      		repeat=2;
		      		$('#icon').addClass('glyphicon-play-circle').removeClass('glyphicon-random');
		      	}
		      	else{
		      		repeat=0;

					$('#icon').addClass('glyphicon-repeat').removeClass('glyphicon-play-circle');
		      	}		      	
		      	
		      });
		      $('.glyphicon-pause').on('click', function(){
		      		player.pauseVideo();
		      		$('.glyphicon-pause').addClass('glyphicon-play').removeClass('glyphicon-pause');
		      });
		      $('.glyphicon-play').on('click', function(){
		      		player.playVideo();
		      		$('.glyphicon-play').addClass('glyphicon-pause').removeClass('glyphicon-play');
		      });
		});
	</script>
	</head>
	<body>
		<h1>Goldmine</h1>
		<div class="main">
			<div class="panel panel-default">
				<div class="panel-body">
				    <div class="embed-responsive embed-responsive-16by9" id="frame">
	  					<div id = "player"></div>
					</div>
				</div>
				<div class="panel-footer" id='controls'>
				  	<button type="button" class="btn btn-default btn-lg" id='repeat'>
					  <span class="glyphicon glyphicon-repeat" aria-hidden="true" id='icon'></span>
					</button>
					<button type="button" class="btn btn-default btn-lg" id='prev'>
					  <span class="glyphicon glyphicon-step-backward" aria-hidden="true" id='icon'></span>
					</button>
					<button type="button" class="btn btn-default btn-lg" id='play'>
					  <span class="glyphicon glyphicon-pause" aria-hidden="true" id='icon'></span>
					</button>
					<button type="button" class="btn btn-default btn-lg" id='next'>
					  <span class="glyphicon glyphicon-step-forward" aria-hidden="true" id='icon'></span>
					</button>
				</div>
			</div>
			<div class="list-group" id="list">
			</div>
		</div>		
	</body>
</html>