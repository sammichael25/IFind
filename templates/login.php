
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>iFind</title>


<!-- Custom CSS -->
<link href="css/logo-nav.css" rel="stylesheet">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet">	
	

</head>

<body id="timetable">
    <div class="container-fluid" id="header-container">
        <div class="row">
            <div class="col-md-3 col-md-offset-5 center">
                <a class="header" href="#">
                    <img src="images/logo.png" id="logo2" alt="logo">
                </a>
            </div>
        </div>
    </div>
   <!-- /.signup form -->
   <div class="container-fluid" id="body-row">
    <div class="row" id="box"> 
       <div class="col-md-offset-3" id="signup-hd2">
           <div class="signup-header1">
           <h3 class="form-title text-center">Sign Up Now!</h3>
           <p >Don't have an account.</p><p>Click the button below to sign up now</p><br>
           <form class="form-header" action="templates/signup.phtml" role="form" method="GET" id="#">
               <div class="form-group last">
						<input type="submit" id="signupBtn" class="btn btn-primary btn-block btn-lg" value="Sign Up">
					</div>
            </form>
           </div>
       </div>
		<div class="col-md-offset-7" id="signup-hd2">
			<div class="signup-header1">
				<h3 class="form-title text-center">Login</h3>

				<form name="logForm" enctype="multipart/form-data" class="form-header" method="POST" action="templates/timetable.phtml" onsubmit="return login();">
					<input type="hidden" name="u" value="503bdae81fde8612ff4944435">
					<input type="hidden" name="id" value="bfdba52708">
					<div class="form-group">
						<input class="form-control input-lg" name="email" id="email" type="email" placeholder="Email address" required="">
					</div>
					<div class="form-group">
						<input class="form-control input-lg" name="password" id="password" type="password" placeholder="Password" required="">
					</div>
					<div class="form-group last">
						<button type="submit" id="loginBtn" class="btn btn-primary btn-block btn-lg" value="Login">Sign in</button>
					</div>
					<p class="privacy text-center"> <a href="#">Forgot your password?</a>.</p>
				</form>
			</div>				
		</div>
        </div>
    </div>
	<!-- /.footer -->
	
        <div class="container-fluid" id="footer-container">
		<div class="row" id="footer-row">
            <footer id="timetablefooter">
            <div class="container">
                <div class="col-sm-4 col-sm-offset-4">	
                    <div class="text-center wow fadeInUp" style="font-size: 14px;">Copyright &copy; Your Website 2017</div>
                    <a href="#" class="scrollToTop"><i class="pe-7s-up-arrow pe-va"></i></a>
                </div>	
            </div>	
             </footer>
			</div>
		</div>	
<script src="js/main.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>		
<script src="bower_components/jquery/dist/jquery.js"></script>	
<script src="bower_components/angular/angular.min.js"></script>
<script src="bower_components/angular-route/angular-route.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

<script src="js/ie10-viewport-bug-workaround.js"></script>	
</body>

</html>
