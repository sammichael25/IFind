<!doctype html>

<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<meta name="description" content="">
<meta name="author" content="">

<title>Registration</title>


<!------------------------------------------links------------------------------------------------- -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet">


<!-------------------------------------------scripts----------------------------------------------- -->
<script src="bower_components/angular/angular.min.js"></script>
<script src="bower_components/angular-route/angular-route.min.js"></script>
<script src="js/passScript.js"></script>
<script src="js/main.js"></script>
<script src ="js/jquery-3.1.1.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="bower_components/jquery/dist/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>


</head>

<body ng-app="validationApp" ng-controller="mainController">

<form name="userForm" class="form-horizontal" method = "POST" action = "index.php/signup" onsubmit="return register();" ng-submit="submitForm(userForm.$valid)" novalidate>
<fieldset>

<!-- Form Name -->
<legend style="text-align: center">IFind Registration</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Fname">First Name <span style="color:red">*</span></label>  
  <div class="col-md-4">
  <input id="Fname" name="Fname" type="text" placeholder="Jane" class="form-control input-md" ng-model="user.Fname" type="text" placeholder="" class="form-control input-md" required="">  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Lname">Last Name <span style="color:red">*</span></label>  
  <div class="col-md-4">
  <input id="Lname" name="Lname" type="text" placeholder="Doe" class="form-control input-md" ng-model="user.Lname" type="text" placeholder="" class="form-control input-md" required="">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="email">Email <span style="color:red">*</span> </label>  
  <div class="col-md-4">
  <input id="email" name="email" placeholder="janedoe@domain.com" class="form-control input-md" ng-model-options="{ updateOn: 'blur' }" ng-model="user.email" type="email" placeholder="johnDoe@example.com" class="form-control input-md" required="">
  <p ng-show="userForm.email.$error.email" class="help-block" >Invalid Email Address</p>    
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="password">Password <span style="color:red">*</span> </label>
  <div class="col-md-4">
    <input id="password" name="password" type="password" placeholder="" class="form-control input-md" data-ng-model="user.password" ng-minlength="8" ng-maxlength="25" required="">
    <p ng-show="userForm.password.$error.minlength" class="help-block">Password is too short.</p>
  <p ng-show="userForm.password.$error.maxlength" class="help-block">Password is too long.</p>
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="password2">Confirm Password <span style="color:red">*</span> </label>
  <div class="col-md-4">
    <input id="password2" name="password2" type="password" placeholder="" class="form-control input-md" ng-model-options="{ updateOn: 'blur' }" ng-model="user.password2" required data-password-verify="user.password" required="">
  <p ng-show="userForm.password2.$error.passwordVerify" class="help-block">Passwords do not match </p>
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="department">Department <span style="color:red">*</span></label>  
  <div class="col-md-4">
  <input id="department" name="department" type="text" placeholder="" class="form-control input-md" ng-model-options="{ updateOn: 'blur' }" ng-model="user.department" ng-minlength="3" ng-maxlength="8" required="">
  <p ng-show="userForm.department.$error.minlength" class="help-block">Fix please</p>
  <p ng-show="userForm.department.$error.maxlength" class="help-block">Fix please</p>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="Submit"></label>
  <div class="col-md-4">
    <button id="saveBnt" name="saveBnt" class="btn btn-primary btn-block" type ="submit" ng-disabled="userForm.$invalid">Submit</button>
  </div>
</div>

</fieldset>
</form>
  </div>
    </div>
</div>
<!--footer -->
  <div class="footer">
    <p> &copy; IFind 2017 </p>
  </div>
<body>
</html>