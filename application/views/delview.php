<!DOCTYPE html>
<html>

<head>
<title>Delete Details</title>
</head>

<body>

<a href="<?php echo base_url(); ?>index.php/home">Home</a> --                                                           <!-- Title declarations -->
<a href="<?php echo base_url(); ?>index.php/find">Search</a> --                                                         <!-- Title declarations -->
<?php
if($lgdin == "0")                                                                                                       /* IF statement to check session */
{
    ?>
<a href="<?php echo base_url(); ?>index.php/lginout">Login</a>                                                          <!-- Visible if session is not on -->
    <?php
}
if($lgdin == "1")
{
    ?>                                                                                                                  <!-- IF statement to check session -->
<a href="<?php echo base_url(); ?>index.php/lginout/logout">Logout</a> --                                               <!-- Additional options for sessioned users -->
<a href="<?php echo base_url(); ?>index.php/ops/loadaddview">Add Employee</a> --                                        <!-- Additional options for sessioned users -->
<a href="<?php echo base_url(); ?>index.php/ops/loadupview">Update Employee</a> --                                      <!-- Additional options for sessioned users -->
<a href="<?php echo base_url(); ?>index.php/ops/loaddelview">Delete Employee</a>                                        <!-- Additional options for sessioned users -->
                                                                                                                        <!-- User session available hence aditional options -->
    <?php
    echo "<div style=\"float: right;\">Logged in</div>";


}

?>                                                                                                                      <!-- Visual label for users logged in -->

<form action="<?php echo base_url(); ?>index.php/find/srchdel" method="get">                                            <!-- POST method for adding employee -->
    <br>
    Firstname:
    <input type="text" name="firstname">
    <br>
    <br>
    Lastname:
    <input type="text" name="lastname">
    <br>
    <br>
    Department:
    <select name="dept">
        <option value=""></option>
        <option value="Customer Service">Customer Service</option>
        <option value="Development">Development</option>
        <option value="Finance">Finance</option>
        <option value="Human Resources">Human Resources</option>
        <option value="Marketing">Marketing</option>
        <option value="Production">Production</option>
        <option value="Quality Management">Quality Management</option>
        <option value="Research">Research</option>
        <option value="Sales">Sales</option>
    </select>
    <br>
    <br>
    Job Title:
    <select name="title">
        <option value=""></option>
        <option value="Senior Engineer">Senior Engineer</option>
        <option value="Staff">Staff</option>
        <option value="Engineer">Engineer</option>
        <option value="Senior Staff">Senior Staff</option>
        <option value="Assistant Engineer">Assistant Engineer</option>
        <option value="Technique Leader">Technique Leader</option>
        <option value="Manager">Manager</option>
    </select>
    <br>
    <br>
    <input type="submit" value="Search">                                                                                <!-- Submission -->

</form>                                                                                                                 <!-- End of form -->

</body>

</html>