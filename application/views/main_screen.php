<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="<?= base_url() ?>css/bootstrap.min.css" rel="stylesheet">
		<link href="<?= base_url() ?>css/styles.css" rel="stylesheet">
		<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
		<script src="<?= base_url() ?>js/bootstrap.js"></script>
		<script src="<?= base_url() ?>js/functions.js"></script>
		<script>

		$(function(){
			var links = "<?= base_url() ?>main/loadList/1";
			$.getJSON(links, function(data){
				//console.log(data);
				$.each(data, function(link, name){
					//alert(link);
					$('#list').append('<a href="javascript:void(0)" id="'+link+'" class="list-group-item">'+name+'</a>');
				});
			});
			$("#list").on('click', 'a.list-group-item', function() {
				var id = $(this).attr('id');
				$(this).addClass("active");
    			$('#frame').html('<iframe class="embed-responsive-item" src="//www.youtube.com/embed/'+id+'?autoplay=1"></iframe>');
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
	  					
					</div>
				  </div>
				  <div class="panel-footer">Panel footer</div>
			</div>
			<div class="list-group" id="list">
			</div>
		</div>		
	</body>
</html>