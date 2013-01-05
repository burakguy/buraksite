<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">

<head>
<title>Homepage</title>
</head>

<body>

<a href="<?php echo base_url(); ?>index.php/home">Home</a> --
<a href="<?php echo base_url(); ?>index.php/find">Search</a> --


<?php
if($lgdin == "0")
{
    ?>
       <a href="<?php echo base_url(); ?>index.php/lginout">Login</a>
       <br/><br/>
       Access Username: 110344 <br/>
       Access Password: admin <br/><br/>
       The information above is the credentials required to gain access to the level 1 admin account for full access.<br/>
    <?php
}
if($lgdin == "1")
{
    ?>
<a href="<?php echo base_url(); ?>index.php/lginout/logout">Logout</a> --
<a href="<?php echo base_url(); ?>index.php/ops/loadaddview">Add Employee</a> --
<a href="<?php echo base_url(); ?>index.php/ops/loadupview">Update Employee</a> --
<a href="<?php echo base_url(); ?>index.php/ops/loaddelview">Delete Employee</a>

    <?php
        echo "<div style=\"float: right;\">Logged in</div>";
        echo "<br/><br/> You currently hold full access.";
}
    ?>

</body>

</html>