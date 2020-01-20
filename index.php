<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Student Entry</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="search.php">Search</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="edit.php">Edit</a>
            </li>
          </ul>
    </nav>
<form method="GET">
<table class="table">
<tr>
    <td>
        name
    </td>
    <td>
        <input type="text" name="getName"class="form-control">
    </td>
</tr>
<tr>
    <td>
        roll number
    </td>
    <td>
        <input type="text" name="getRoll" class="form-control">
    </td>
</tr>
<tr>
    <td>
        college
    </td>
    <td>
        <input type="text" name="getCollege" class="form-control">
    </td>
</tr>
<tr>
    <td>
        Admission number
    </td>
    <td>
        <input type="text" name="getAddmno" class="form-control">
    </td>
</tr>
<tr>
    <td>
    
    </td>
    <td>
        <button type="submit" name="submit" class="btn btn-danger">
            submit
        </button>
    </td>
</tr>
</table>
</form>
</body>
</html>
<?php
if(isset($_GET["submit"]))
{
    $Name=$_GET["getName"];
    $Roll=$_GET["getRoll"];
    $College=$_GET["getCollege"];
    $Addmn=$_GET["getAddmno"];
    $Servername="localhost";
    $Dbusername="root";
    $Dbpassword="";
    $Dbname="mydatabase";
    $connection=new mysqli($Servername,$Dbusername,$Dbpassword,$Dbname);
    $Sql="INSERT INTO `student`( `Name`, `RollNo`, `Admno`, `College`) VALUES
     ('$Name',$Roll,$Addmn,'$College')";
    $result=$connection->query($Sql);
    if($result===TRUE)
    {
        echo " successfull";
    }
    else {
        echo $connection->error;
    }
}
?>