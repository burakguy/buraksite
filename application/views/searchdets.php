<html>


<head>
<title>HR Department</title>
</head>


<body>

<form action="<?php echo base_url(); ?>index.php/find/findemp" method="get">
    First name: <input type="text" name="FIRSTNAME"><br>
    Last name:  <input type="text" name="LASTNAME"><br>
    Department: <select name="DEPT"><br>
                <option value= ""></option>
                <option value= "Customer Service">Customer Services</option>
                <option value= "Development">Development Department</option>
                <option value= "Finance">Finance Department</option>
                <option value= "Human Resources">HR Department</option>
                <option value= "Marketing">Marketing Department</option>
                <option value= "Production">Production Department</option>
                <option value= "Quality Management">Quality Management Department</option>
                <option value= "Research">Research Department</option>
                <option value= "Sales">Sales Department</option>
                </select><br>

    Job Title:  <select name="JOBTITLE"><br>
                <option value= ""></option>
                <option value= "Senior Engineer">Sen Engineer</option>
                <option value= "Staff">Staff</option>
                <option value= "Engineer">Engineer</option>
                <option value= "Senior Staff">Sen Staff</option>
                <option value= "Assistant Engineer">Assistant Engineer</option>
                <option value= "Technique Leader">Technique Leader</option>
                <option value= "Manager">Manager</option>
                </select><br><br>

    <input type="submit" value="Submit"/>
</form>


</body>


    </html>