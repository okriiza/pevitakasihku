<!DOCTYPE html>
<html>
  <head>
    <title>Sign In Pevita</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
	<link href="<?php echo base_url().'assets/css/login.css'?>" rel="stylesheet">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!------ Include the above in your HEAD tag ---------->

	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  </head>
  <body>
  <div class="main">
    <div class="container">
      <center>
        <div class="middle">
          <div id="login">
            <form method="post" action="<?php echo base_url(); ?>index.php/login/proses">
              <fieldset class="clearfix">
                <p ><span class="fa fa-user"></span><input type="text" name="username" id="username" Placeholder="Username" required></p> 
                <p><span class="fa fa-lock"></span><input type="password" name="password" id="password" Placeholder="Password" required></p> 
                <div>
                    <!-- <span style="width:48%; text-align:left;  display: inline-block;"><a class="small-text" href="#">Forgot
                    password?</a></span> -->
                    <span style="width:50%; text-align:right;  display: inline-block;"><input type="submit" value="Sign In"></span>
                </div>
              </fieldset>
            <div class="clearfix"></div>
            </form>
            <div class="clearfix"></div>
          </div> <!-- end login -->
          <div class="logo">Pevita
              <div class="clearfix"></div>
          </div>
        </div>
      </center>
      </div>
  </div>
	
  </body>
</html>