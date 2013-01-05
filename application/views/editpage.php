<!DOCTYPE html>

<html>

<head>
<title>Edit Details</title>
</head>

<body>


<form action="<?php echo base_url(); ?>index.php/ops/update2db/<?=$emp->emp_no?>" method="post">
    <br>
    Firstname:
    <input type="text" name="firstname" value="<?php echo $emp->first_name;?>">
    <br>
    <br>
    Lastname:
    <input type="text" name="lastname" value="<?php echo $emp->last_name;?>">
    <br>
    <br>
    D.O.B:
    <input type="text" name="dob" value="<?php echo $emp->birth_date;?>">
    <br>
    <br>
    Gender:
    <select name="gender">

        <?php

        if($emp->gender = "M")
        {
            ?>
            <option value="M" selected="selected">Male</option>
            <option value="F">Female</option>
            <?php
        }
        else
        {
            ?>
            <option value="M">Male</option>
            <option value="F" selected="selected">Female</option>
            <?php
        }

        ?>

    </select>
    <br>
    <br>
    Department:

    <?php
    $depts = array('d009' => 'Customer Service', 'd005' => 'Development', 'd002' => 'Finance', 'd003' => 'Human Resources', 'd001' => 'Marketing', 'd004' => 'Production', 'd006' => 'Quality Management', 'd008' => 'Research', 'd007' => 'Sales');
    ?>

    <select name="dept">
        <?php
        foreach($depts as $dept_no => $dept_name)
        {
            echo "<option value=\"".$dept_no."\"";

            if($dept_name == $emp->dept_name)
            {
                echo " selected = \"selected\"";
            }

            echo ">".$dept_name."</option>";
        }
        ?>
    </select>
    <br>
    <br>
    Job Title:

    <?php
    $titles = array('Senior Engineer', 'Staff', 'Engineer', 'Senior Staff', 'Assistant Engineer', 'Technique Leader', 'Manager');
    ?>

    <select name="title">
        <?php
        foreach($titles as $title)
        {
            echo "<option value=\"".$title."\"";

            if($title == $emp->title)
            {
                echo " selected = \"selected\"";
            }

            echo ">".$title."</option>";
        }
        ?>
    </select>
    <br>
    <br>
    Salary:
    <input type="text" name="salary" value="<?php echo $emp->salary;?>">
    <br>
    <br>
    <input type="submit" value="Update Employee">

</form>

</body>

</html>