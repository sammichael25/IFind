<?php
if(!isset($_SESSION)){
  session_start();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Timetable</title>

<!-- Custom CSS -->
<link href="../css/logo-nav.css" rel="stylesheet">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet">	
</head>

<body>

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
										<input type="text" class="form-control input-sm" placeholder="Search.." />
											<div class="input-group-btn">
												<button onclick ="hideSearchBar();" class="btn btn-info btn-sm" type="button">
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
                    <li><a href="../"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
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
                <h2>Welcome <?php echo $_SESSION["user"];?></h2>
                <br>
				
				<!-- Adding user courses -->
	<div class ="row" style="display:none" id="addCourseForm">
		<div class ="col-md-6">
		<form name="courseForm" enctype="multipart/form-data" class="form-horizontal" method="POST" action="timetable.php" onsubmit="return addCourse();">
			<fieldset>
			<legend style="text-align:center">Add Course</legend>
			
			<div class="form-group">
			<label class="col-md-4 control-label" for="courseCode">Course</label> 
				<div class="col-md-6">
				<select class="form-control" name="courseCode" id="courseCode">
					<option value="0">Choose Course</option>
				</select>
				</div>
			</div>
			
			<div class="form-group">
			<label class="col-md-4 control-label" for="Add"></label>
			<div class="col-md-4">
				<button type="submit" id="addBtn" class="btn btn-primary">Add</button>
				<button type="button" onclick ="hideCourseForm();" class="btn btn-primary">Cancel</button>
			</div>
			</div>
			</fieldset>
		</form>
	</div>
	</div>
				
				<div class ="row">
					<div class ="form-group">
						<button type="button" onclick ="AddCourseForm(); retrieveAllCourses();" class="btn btn-info">Add Courses</button>
					</div>
				</div>
				
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Personal Timetable</h3>
						<div id="table_sect"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
			<script type="text/template" id="table_headingt">
					<table class="table table-hover table-condensed" >
						<thead>
							<tr>
								<th>Time</th><th>Monday</th><th>Tuesday</th><th>Wednesday</th><th>Thursday</th> <th>Friday</th><th>Saturday</th>
							</tr>
						</thead>
						<tbody>
			</script>
	
    <!-- /.container -->
	<div class="container">
		<hr>
        <!-- Footer -->
        <footer id="indexfooter">
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2017</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>
		
	</div>	
	
<script src="../js/main.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>		
<script src="bower_components/jquery/dist/jquery.js"></script>	
<script src="../bower_components/angular/angular.min.js"></script>
<script src="../bower_components/angular-route/angular-route.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

<script src="../js/ie10-viewport-bug-workaround.js"></script>	

</body>

</html>