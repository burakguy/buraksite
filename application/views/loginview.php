<!DOCTYPE html>
<html>

<head>
<title>Login</title>
</head>

<body>

<a href="<?php echo base_url(); ?>index.php/home">Home</a> --                                                           <!-- Link to homepage -->
<a href="<?php echo base_url(); ?>index.php/find">Search</a> --
<a href="<?php echo base_url(); ?>index.php/home">Back</a>
<br/>

<form action="<?php echo base_url(); ?>index.php/lginout/login" method="post">
    <br>
    Employee Number:
    <input type="text" name="username">
    <br>
    <br>
    Password:
    <input type="password" name="password">
    <br>
    <br>
    <input type="submit" value="Login">
</form>

</body>

</html>
