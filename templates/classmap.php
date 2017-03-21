<?php
if(!isset($_SESSION)){session_start();}
include "../lib.php";
$roomID = $_GET['roomID']; //retrieving roomid from timetable and storing it in variable roomID
$url=retrieveURL($roomID); //retrieving location of classroom
$entrance=getImg($roomID);
//echo $url;
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $roomID ?></title> <!-- printing room id in windows tab -->

<!-- Custom CSS -->
<link href="../css/logo-nav.css" rel="stylesheet">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet">	
</head>
	
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../templates/timetable.php">
                    <img src="../images/logo.png" id="logo" alt="">
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
						<!-- <button type="button" onclick="showSearchBar();" class="btn btn-info">Search Classroom</button> -->
						<a id="showSearchBar" href="#" onclick="showSearchBar(); return false;">Search Classroom</a>
					</li>
					</ul>
					<ul>
					<li>
						<div id ="classroomSearch" style ="display:none;">
								<div id="custom-search-input">
									<div class="input-group col-sm-4">
										<input id="roomID" name="roomID" list="rooms" type="text" class="form-control input-sm" placeholder="Search.." />
											<datalist id="rooms">
											<option value="">rooms..</option>
											</datalist>
											<div class="input-group-btn">
												<button onclick ="search(); hideSearchBar();" class="btn btn-info btn-sm" type="button">
												<i class="glyphicon glyphicon-search"></i>
												</button>
												<button onclick ="hideSearchBar();" class="btn btn-info btn-sm" type="button">
												<i class="glyphicon glyphicon-remove"></i>
												</button>
											</div>
									</div>
								</div>
						</div>
					</li>
					</ul>
					<ul class="navbar-right">
                    <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
					</ul>
				</ul>
                
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- business-header -->
    <header class="business-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                </div>
            </div>
        </div>
    </header>
	
	
				
	<!-- Log in -->
	<div class="container" >
		<div class="row">   
            <div class="col-md-12">
                <h2>Map of <a tabindex="0" class="btn" rel="popover" data-trigger="focus" data-img="<?php echo $entrance?>"><h4><?php echo $roomID;?></h4></a></h2>
                <br>
				
				<div class="panel panel-primary">
					<iframe width="100%" height="500" frameborder="0" marginheight="0" marginwidth="0" src="<?php echo $url?>"></iframe>
						
				</div>
			</div>
		</div>
	</div>
	
    <!-- /.container -->
	<div class="container">
		<hr>
        <!-- Footer -->
        <footer id="indexfooter">
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; IFind 2017</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>
		
	</div>	
	

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>		

<script src="../js/main.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<!-- <script src="bower_components/jquery/dist/jquery.js"></script>	-->

<script src="../bower_components/angular/angular.min.js"></script>
<script src="../bower_components/angular-route/angular-route.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

<script src="../js/ie10-viewport-bug-workaround.js"></script>	

</body>

</html>
