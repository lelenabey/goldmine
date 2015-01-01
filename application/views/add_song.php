<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="<?= base_url() ?>css/bootstrap.min.css" rel="stylesheet">
		<link href="<?= base_url() ?>css/styles.css" rel="stylesheet">
		<script src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
		<script src="<?= base_url() ?>js/bootstrap.js"></script>
		<script>
			$(document).ready(function () {
				$('form').submit(function () {
					alert('here');
					var arguments = $(this).serialize();
                    var url = "<?= base_url() ?>main/addSong/<?php echo $id;?>";
                    $.post(url, arguments, function (data) {
                    	alert(data.status);
                    });
                    alert('then here');
                    return false;

				});

			});
			function getId(){
				alert($('#vid').val());
				var vid = addSong($('#url').val());
				$('#vid').val(vid);
				

			}
			function addSong(url){

				return YouTubeGetID(url);
				
			}

			/**
			* Get YouTube ID from various YouTube URL
			* @author: takien
			* @url: http://takien.com
			* For PHP YouTube parser, go here http://takien.com/864
			*/
			 
			function YouTubeGetID(url){
			  var ID = '';
			  url = url.replace(/(>|<)/gi,'').split(/(vi\/|v=|\/v\/|youtu\.be\/|\/embed\/)/);
			  if(url[2] !== undefined) {
			    ID = url[2].split(/[^0-9a-z_/-]/i);
			    ID = ID[0];
			  }
			  else {
			    ID = url;
			  }
			    return ID;
			}
		</script>
	</head>
	<body>
		<h1>Goldmine</h1>
		<?php
			echo form_open();
			echo form_label("newsong :");
			echo form_input("link", '',"id='url' oninput='getId();'");
			echo form_input(array('name' => 'vid', 'type'=>'hidden', 'id' =>'vid'));
			echo form_submit("add","Add");
			echo form_close();
		?>
	</body>
</html>