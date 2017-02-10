<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h1>Form</h1>
    <form action="index.php" method="post">
        Email:<br>
        <input type="email" name="email">
        <br>
        Password:<br>
        <input type="password" name="password">
        <br><br>
    <button type="submit" name="submit">Submit</button>
    
    <?php
    if ( isset( $_POST['submit'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $conn = new mysqli("localhost","root","","introdb");
        $sql = "INSERT INTO users (email,password)
                VALUES ('$email','$password')";
        $res=$conn ->query($sql);
   }
    ?>
    </form> 
</body>
</html>