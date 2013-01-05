<!DOCTYPE html>

<html>

<head>
<title>Update</title>
</head>

<body>


<table border="1" cellpadding="10">

    <tr>

        <td style="text-align: center;"><strong>Firstname</strong></td>
        <td style="text-align: center;"><strong>Lastname</strong></td>
        <td style="text-align: center;"><strong>Department Name</strong></td>
        <td style="text-align: center;"><strong>Title</strong></td>
        <td style="text-align: center;"><strong>Salary</strong></td>
        <td style="text-align: center;"><strong>Update</strong></td>

    </tr>

    <?php

    foreach($res as $result)
    {
        echo "<tr><td>".$result[1]."</td><td>".$result[2]."</td><td>".$result[4]."</td><td>".$result[3]."</td><td>".$result[5]."</td><td><a href=\"".base_url()."index.php/ops/upemployee/".$result[0]."\">Update</a></td></tr>";
    }

    ?>

</table>

<br/>
<a href="<?php echo base_url(); ?>index.php/ops/loadupview">Search Again</a>

</body>

</html>