<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="favicon.ico" />
	<title>Duo Tao - What we do for ourselves dies with us. What we do for others and the world remains and is immortal.</title>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="container">
<center>
	<img height="125" width="125" alt="Duo Tao Profile" src="profile.jpg"/>
	<h1>Duo Tao</h1>
	<p><i>What we do for ourselves dies with us. What we do for others and the world remains and is immortal. (Albert Pike)</i><p>
	<p>I am born in <a href="https://www.google.com/maps/place/Harbin,+Heilongjiang,+China/@45.7568875,90.7926164,3z/data=!4m5!3m4!1s0x5e4364f8a6641461:0x5e7c92735aa02cd5!8m2!3d45.803775!4d126.534967"  target="_blank">Harbin, China</a>. I have been studying physics and computer science as an undergraduate at <a href="https://www.carleton.edu/"  target="_blank">Carleton College</a> since 2014. I am passionate about science and technology. I wish I could know all of them; however, heretofore I have mostly been studying cosmology, astronomy and gravitational waves (<a href="https://www.ligo.caltech.edu/" target="_blank">LIGO</a>). When I have time, I like to train my body (running, swimming, basketball, fencing etc.) and my mind (by learning new things). <br><a target="_blank" href="cv.pdf">Curriculum Vitae</a></p>
</center>

<footer>
	<center><small>&copy; Copyright 2018, Duo Tao</small></center>
</footer>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create new post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form enctype="multipart/form-data" id="post-form">
	      <div class="modal-body">
		        <div class="form-group">
			      <label for="title">Title</label>
			      <input class="form-control" id="title" name='title' placeholder="Enter title">
			    </div>	    
			    <div class="form-group">
				    <label for="file">File</label>
				    <input type="file" class="form-control-file" id="file" name='file' accept=".pdf">
		  		</div>
	      </div>
	      <div class="modal-footer">
	        <input type="submit" id='form-submit' class="btn btn-primary" name="submit">Post</input>
	      </div>
      </form>
      <script type="text/javascript">
      	$('#post-form').submit(function(e) {
      		e.preventDefault();
      		$('#form-submit').prop('disabled', true);
    		var formData = new FormData(this);
    		formData.append('file', $('#file')[0].files[0]);
		    $.ajax({
		        url: '/php/post.php',
		        type: 'POST',
		        data: formData,
		        processData: false, 
       			contentType: false,
		        success: function(msg) {
		            console.log(msg);
		            $("#myModal").modal('hide');
		        },
		        error: function(msg) {
		       		$("#myModal").modal('hide');
		       		alert("ERROR");
		        }    
		    });
		});
      </script>
    </div>
  </div>
</div>
<script type="text/javascript">
	var code = ""
	$("body").keypress(function(e) {
		char = String.fromCharCode(e.which)
		if (e.which == 13) {
			var c = code;
			code = ""
			request = $.ajax({
		        url: "/php/login.php",
		        type: "post",
		        data: {code: c},
		        success: function(data) {
				    if (data == 'yes') {
						$('#myModal').modal('show');
				    }
				}
		    });
		} else {
			code += char;
		}
	});
</script>
</body>
</html>