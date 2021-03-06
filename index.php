<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="favicon.ico" />
	<title>Duo Tao - What we do for ourselves dies with us. What we do for others and the world remains and is immortal.</title>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta name="description" content="My name is Duo Tao. This is my website. ">
  	<meta name="keywords" content="Duo,Tao,Carleton College,blog,physics,computer science">
  	<meta name="author" content="Duo Tao">
</head>
<body class="container">
<center>
	<img height="125" width="125" alt="Duo Tao Profile" src="profile.jpg"/>
	<p style="margin-bottom: 0"><i>What we do for ourselves dies with us. What we do for others and the world remains and is immortal. (Albert Pike)</i></p>
	<h1 style="margin-bottom: 0;">Duo Tao</h1>
	<a data-toggle="collapse" href="#collapseExample">About me...</a>
	<div class="collapse" id="collapseExample">
	    <p> Born in <a href="https://www.google.com/maps/place/Harbin,+Heilongjiang,+China/@45.7568875,90.7926164,3z/data=!4m5!3m4!1s0x5e4364f8a6641461:0x5e7c92735aa02cd5!8m2!3d45.803775!4d126.534967"  target="_blank">Harbin, China</a>. I am a graduate student at California Institute of Technology, aka Caltech. I graduated from <a href="https://www.carleton.edu/"  target="_blank">Carleton College</a> in 2018, double majoring in physics and computer science. I am passionate about science and technology. I wish I could know all of them; however, heretofore I have mostly been studying cosmology, astronomy and gravitational waves (<a href="https://www.ligo.caltech.edu/" target="_blank">LIGO</a>). When I have time, I like to train my body (running, swimming, basketball, fencing etc.) and my mind (by learning new things). </p>
	    <p>
	    	 I have a long term plan of making learning science part of my life by making sure that there is some new science stored in my mind everyday. I want to keep the science part of my brain strong and fresh so that I can use it for creative work throughout my life.
	    </p>
	    <p>
	    	 You can contact me via my gmail; my username is duo.tao.2017.
	    </p>
	</div>
	<br>
	<a data-toggle="collapse" href="#collapseExample1">About this website...</a>
	<div class="collapse" id="collapseExample1">
	    <p>This website is intended for both personal usage and public sharing, the former being more important. When I learn something, writing it down helps me processing the information or referencing it in the future. This can also give my readers some idea of my skills and knowledge, which I hope will help other learners like me. </p>

	    <p> However, it must be emphasized that <b>I share my study here, not my work or research. </b> In other words, all the information on this site summerizes what I learn from other publicly accessible sources, Internet, textbooks or published papers mostly. The sources are cited along with my posts. All research-related content are not shared here. If you want to know about my research, please contact me directly. That said, it might be good to put my CV here, but I am currently rewriting my CV. I might consider putting it here later. </p>
	</div>
	<div class="input-group">
        <input type="text" class="form-control" placeholder="Search" id="searchBox"/>
        <div class="input-group-btn">
          <button class="btn btn-primary" type="submit" id='search-btn'>
            Search
          </button>
          <a href="#" data-toggle="tooltip" title="A result shows only if its title or abstract contains ALL the keywords you enter.">?</a>
        </div>
    </div>
    <script type="text/javascript">
    	$(document).ready(function(){
		    $('[data-toggle="tooltip"]').tooltip();   
		});
    	$('#search-btn').click(function() {
    		var keywords = $('#searchBox').val().trim().split(' ');
    		$('.post').each(function() {
    			var title = $(this).find('.card-body').find('.post-title').find('a').text();
    			var abstract = $(this).find('.card-body').find('.post-abstract').text();
    			title = title.toLowerCase();
    			abstract = abstract.toLowerCase();
    			$(this).show();
    			for (var i in keywords) {
    				var word = keywords[i].toLowerCase();
    				if (!(title.includes(word) || abstract.includes(word))) {
    					$(this).hide();
    					break;
    				}
    			}
    		});
    	});
    </script>
	<?php
		$mysqli = new mysqli("localhost", "duotaosp_WPU6Q", "Bonanza2018", "duotaosp_WPU6Q");
		if ($conn->connect_error) {
		    echo "Connection failed: " . $conn->connect_error;
		} else {
	    	$result = $mysqli->query("select * from posts order by create_date desc;");
	    	if ( false===$result ) {
			  echo ('execute() failed: ' . $stmt->error);
			} else {
	    		while($row = $result->fetch_assoc()) {
	    			echo '<div class="card post" style="margin-top:10px">';
					echo '<div class="card-body">';
	    			echo '<small>' . $row['create_date'] . '</small>';
					echo '<h3 style="margin-top:0" class="post-title"><a href="' . $row['file_path'] . '"  target="_blank"> ' . $row['post_title'] . " </a></h3>";
					echo '<p class="post-abstract">' . $row['content_abstract'] . '</p>';
					echo '</div>';
					echo '</div>';
				}
	    	}
		}
	?>
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
					<label for="abstract">Abstract</label>
					<textarea class="form-control" rows="5" id='abstract' name='abstract'></textarea>
				</div>
			    <div class="form-group">
				    <label for="file">File</label>
				    <input type="file" class="form-control-file" id="file" name='file' accept=".pdf">
		  		</div>
	      </div>
	      <div class="modal-footer">
	        <input type="submit" id='form-submit' class="btn btn-primary" name="submit">
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
		       		console.log(msg);
		       		alert(msg.responseText);
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