<!DOCTYPE html>

<html>

<head>
<title>Add Employee</title>
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
if($lgdin == "1")                                                                                                       /* User session available hence aditional options */
{
    ?>
<a href="<?php echo base_url(); ?>index.php/lginout/logout">Logout</a> --                                               <!-- Additional options for sessioned users -->
<a href="<?php echo base_url(); ?>index.php/ops/loadaddview">Add Employee</a> --                                        <!-- Additional options for sessioned users -->
<a href="<?php echo base_url(); ?>index.php/ops/loadupview">Update Employee</a> --                                      <!-- Additional options for sessioned users -->
<a href="<?php echo base_url(); ?>index.php/ops/loaddelview">Delete Employee</a>                                        <!-- Additional options for sessioned users -->

    <?php
    echo "<div style=\"float: right;\">Logged in</div>";                                                                          /* Visual label for users logged in */

}

?>

<form action="<?php echo base_url(); ?>index.php/ops/addemployee" method="post">                                        <!-- POST method for adding employee -->
    <br>
    Firstname:
    <input type="text" name="firstname">
    <br>
    <br>
    Lastname:
    <input type="text" name="lastname">
    <br>
    <br>
    D.O.B (YYYY-MM-DD):
    <input type="text" name="dob">
    <br>
    <br>
    Gender:
    <select name="gender">
        <option value=""></option>
        <option value="M">Male</option>
        <option value="F">Female</option>
    </select>
    <br>
    <br>
    Department:
    <select name="dept">
        <option value=""></option>
        <option value="d009">Customer Service</option>
        <option value="d005">Development</option>
        <option value="d002">Finance</option>
        <option value="d003">Human Resources</option>
        <option value="d001">Marketing</option>
        <option value="d004">Production</option>
        <option value="d006">Quality Management</option>
        <option value="d008">Research</option>
        <option value="d007">Sales</option>
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
    Salary:
    <input type="text" name="salary">
    <br>
    <br>
    <input type="submit" value="Add Employee">                                                                          <!-- Submission -->

</form>                                                                                                                 <!--End of form -->

</body>

</html>