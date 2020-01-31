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
    <h2>
        Edit
    </h2>
    <form method="GET">
    <table class="table">
        <tr>
            <td>
                rollno
            </td>
            <td>
                <input type="text" class="form-control"name="getrollno">
            </td>
        </tr>
        <tr>
            <td>

            </td>
            <td>
                <button type="submit" class="btn btn-danger"name="submit">
                    Edit
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
$roll=$_GET["getrollno"];
$Servername="localhost";
$Dbusername="root";
$Dbpassword="";
$Dbname="mydatabase";
$connection=new mysqli($Servername,$Dbusername,$Dbpassword,$Dbname);
$sql="SELECT `Name`, `Admno`, `College` FROM `student` WHERE `rollNo`=$roll";
$result=$connection->query($sql);
if($result->num_rows>0)
{
    while($row=$result->fetch_assoc())
    {
        $Name=$row["Name"];
        $Addmno=$row["Admno"];
        $College=$row["College"];
        
        echo "<form method='POST'><table class='table'> <tr> <td> name </td> <td> <input type='text'name='updatename' value='$Name'/> </td> </tr>
        <tr> <td> Admno </td> <td><input type='text'name='updateadmno' value='$Addmno' </td> </tr>
        <tr> <td> college </td> <td> <input type='text'name='updatecollege' value='$College' </td> </tr>
        <tr><td><button type='submit' value='$roll' name='updatebutton' class='btn btn-success'/>update</button> <br> </form>";
    }
}
else{
    echo "invalid";
}
}
if(isset($_POST["updatebutton"]))
{
    $upname=$_POST["updatename"];
    $upadmno=$_POST["updateadmno"];
    $updatecollege=$_POST["updatecollege"];
    $rol=$_POST['updatebutton'];
    $Servername="localhost";
    $Dbusername="root";
    $Dbpassword="";
    $Dbname="mydatabase";
    $connection=new mysqli($Servername,$Dbusername,$Dbpassword,$Dbname);
    $sql="UPDATE `student` SET `name`='$upname',`admno`=$upadmno,`college`='$updatecollege'WHERE `rollno`=$rol";
    $result=$connection->query($sql);
    if($result===TRUE)
    {
        echo "success";
    }
    else{
        echo "failed";
    }
}
    
?>