<?php
    $servername="localhost";
	$username = "root";
	$password="";
	$database = "mefgi";
	$con = mysqli_connect($servername,$username,$password,$database);

    session_start();
    if(!isset($_SESSION["user"])) {
        header("Location:studentlogin.php");
        }
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

<link rel="stylesheet" href="sidebar.css">
<style>
     #sess{
        float: right;
        font-weight: bold;
        font-size:30px;
        margin-left:60rem;
    }
    #add{
    /* position:absolute; */
    margin:20px auto;
    width: 100%;
    text-align: center;
}
#add input{
    width:50%;
    text-align: center;
}
#sub{
    text-align:center;
}
#sub input{
    width:100px;
    text-align:center;
    background-color:green;
    color:white;
}
</style>
</head>
<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <?php echo "<h5 id='sess'>HI,". strtoupper($_SESSION["user"])."</h5>";?>
        <div class="header_img"> <img src="https://i.imgur.com/hczKIze.jpg" alt=""> </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">Faculty Dashboard</span> </a>
                <div class="nav_list"> <a href="Faculty_Dashboard.php" class="nav_link active"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a> 
                 
                     <a href="Addresult.php" class="nav_link"> <i class='bx bx-folder nav_icon'></i> <span class="nav_name">Add Result</span> </a> 
                     <!-- <a href="Update_result.php" class="nav_link"> <i class='bx bx-folder nav_icon'></i> <span class="nav_name">Update Result</span> </a>  -->
                     <a href="Update_result.php" class="nav_link"> <i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span class="nav_name">Update Result</span> </a> </div>
            </div> <a href="LogOut.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
        </nav>
    </div>
    <div class="height-100 bg-light text-center">
    <h3 style="color:white; background-color:green;font-weight: bold;height: 50px;margin-top:10px;">PLEASE ENTER DETALS FOR ADDING RESULT</h3><br><br>
        <div class="container" id="add">
        <?php 
                $subject1= $subject2 =$subject3= $subject4= $subject5= $subject6 =$s1marks= $s2marks= $s3marks= $s4marks =$s5marks =$s6marks ="";
                 $sem=$rollno= $name=$result1="";
                 $roll=$sem1="";
                 $count = 0;
                if($_SERVER['REQUEST_METHOD']=='POST')
                { 
                    if( !empty($_POST['search']))
                    {
                    // $count=1;
                    $rollno = $_POST['roll'];
                    $sem  =$_POST['sem'];
                   
                    //fetch student table for name and semester
                    // $sql = "SELECT Name FROM `student` where RollNo ='$rollno' and sem = '$sem'";
                    // $result = mysqli_query($con,$sql);
                    // if($result){
                    // while($row = mysqli_fetch_assoc($result))
                    // {
                    //     $name=$row['Name'];
                    // }

                    $sql = "SELECT * FROM `student` where RollNo ='$rollno' and sem = '$sem'";
                    $result = mysqli_query($con,$sql);
                   
                    while($row = mysqli_fetch_assoc($result))
                    {
                        $name=$row['Name'];
                        $roll =$row['RollNo'];
                        $sem1 = $row['sem'];
                    }
                    if(!$roll=="" && !$sem1==""){
                        $count = 1;


                    //fetch subject table for subject
                    $sql ="SELECT * FROM `subject` where semester = '$sem'";
                    $result = mysqli_query($con,$sql);
                    while($row = mysqli_fetch_assoc($result))
                    {
                        $subject1= $row['subject1'];
                        $s1marks=$row['s1marks'];
  
                        $subject2= $row['subject2'];
                        $s2marks=$row['s2marks'];

                        $subject3= $row['subject3'];
                        $s3marks=$row['s3marks'];

                        $subject4= $row['subject4'];
                        $s4marks=$row['s4marks'];

                        $subject5= $row['subject5'];
                        $s5marks=$row['s5marks'];

                        $subject6= $row['subject6'];
                        $s6marks=$row['s6marks'];
                    }
                }
                else{
                    $count=0;
                    echo"<h2 style='color:red;'>Data Not Found</h1>";
                
                }
                }
                
                //add result in result table
               if(!empty($_POST['Submit']))
                {
                    
                    $marks1 = $_POST['marks1'];
                    $marks2 = $_POST['marks2'];
                    $marks3 = $_POST['marks3'];
                    $marks4 = $_POST['marks4'];
                    $marks5 = $_POST['marks5'];
                    $marks6 = $_POST['marks6'];
                    $rollno = $_POST['roll'];
                    $sem    = $_POST['sem'];
                    try{

                    
                    $sql = "INSERT INTO `result` (`RollNo`, `semester`, `sgmarks1`, `sgmarks2`, `sgmarks3`, `sgmarks4`, `sgmarks5`, `sgmarks6`) VALUES ('$rollno', '$sem', '$marks1', '$marks2', '$marks3', '$marks4', '$marks5', '$marks6')";
                    $result1=mysqli_query($con,$sql);
                    if($result1)
                     {
                         echo"<h3 style ='color:#66ff33;position: relative;'>Result Added Successfully!</h3>";
                     }
                }catch(Exception $e)
                {
                   echo"<h3 style='color:red'>Result of this student is already present <br>If you want to update then go to update section</h3>";
                }
                
                }
                }
                
?>
<div id="add">
          <form action="/practise/Addresult.php" method="POST">
           <div class="mb-3"><label for="semester">Enter Roll No </label><br><input type="text"
                                    name="roll"required></div>
           <div class="mb-3"><label for="semester">Enter Semester</label><br><input type="text" name="sem"
                                    required></div>
           
           <input type="submit" value="Search"class="btn btn-primary" name="search">
        </form>
        </div>
        <?php
                    
                     if($count==1)
                     {
                     echo "<h4>Student Name : ".$name."</h4>";
                     echo"<h5>Please Enter Marks</h5>";
                     echo"<form action='/practise/Addresult.php'onsubmit='return marks()' method='POST'>";
                     
                     echo "<table class='table table-striped'>";
                     echo"<tr>
                            <th>Subject Name</th>
                            <th>Total Marks</th>
                            <th colspan='2'>Gained Marks</th>
                            
                        </tr>";
                        echo "<tr>
                            
                            
                             <td><input type='hidden' value='$rollno' name='roll'></td>
                            <td colspan='3'><input type='hidden' value='$sem' name='sem'></td>
                            
                        </tr>";

                        echo"<tr>
                            <td>".$subject1."</td>
                            <td>".$s1marks."</td>
                            <td>
                                <input type='text' name='marks1' id='marks1'required></td>
                                <td><span id='cmarks1'style='color:red;'></span></td> 
                               
                        </tr>";
                       echo" <tr>
                            <td>".$subject2."</td>
                            <td>".$s2marks."</td>
                            <td>
                               
                                 <input type='text' name='marks2' id='marks2'required></td>
                                 <td><span id='cmarks2'style='color:red;'></span></td> 
                        </tr>";
                        echo"<tr>
                            <td>".$subject3."</td>
                            <td>".$s3marks."</td>
                            <td>
                               
                                 <input type='text' name='marks3' id='marks3'required></td>
                                 <td><span id='cmarks3'style='color:red;'></span></td> 
                        </tr>";
                        echo"<tr>
                            <td>".$subject4."</td>
                            <td>".$s4marks."</td>
                            <td>
                               
                                 <input type='text' name='marks4' id='marks4'required></td>
                                 <td><span id='cmarks4'style='color:red;'></span></td> 
                        </tr>";
                        echo"<tr>
                            <td>".$subject5."</td>
                            <td>".$s5marks."</td>
                            <td>
                              
                                 <input type='text' name='marks5' id='marks5'required></td>
                                 <td><span id='cmarks5'style='color:red;'></span></td> 
                        </tr>";
                        echo"<tr>
                            <td>".$subject6."</td>
                            <td>".$s6marks."</td>
                            <td>
                                
                                 <input type='text' name='marks6' id='marks6'required></td>
                                 <td><span id='cmarks6'style='color:red;'></span></td> 
                        </tr>";
                         
                        echo"<tr>
                            <td colspan='4' id='sub'>
                             <input type='submit' value='Submit' id='submit' name='Submit'></td>
                        </tr>";
                   echo" </table>";
                 echo "</form>";
                     }
                     
             ?>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {

const showNavbar = (toggleId, navId, bodyId, headerId) =>{
const toggle = document.getElementById(toggleId),
nav = document.getElementById(navId),
bodypd = document.getElementById(bodyId),
headerpd = document.getElementById(headerId)

// Validate that all variables exist
if(toggle && nav && bodypd && headerpd){
toggle.addEventListener('click', ()=>{
// show navbar
nav.classList.toggle('show')
// change icon
toggle.classList.toggle('bx-x')
// add padding to body
bodypd.classList.toggle('body-pd')
// add padding to header
headerpd.classList.toggle('body-pd')
})
}
}

showNavbar('header-toggle','nav-bar','body-pd','header')

/*===== LINK ACTIVE =====*/
const linkColor = document.querySelectorAll('.nav_link')

function colorLink(){
if(linkColor){
linkColor.forEach(l=> l.classList.remove('active'))
this.classList.add('active')
}
}
linkColor.forEach(l=> l.addEventListener('click', colorLink))

// Your code to run since DOM is loaded and ready
});
function marks(){
    //  let s1 = document.getElementById("s1").innerHTML;
    // var s1 = $s1marks;
     let marks1 = document.getElementById("marks1").value;
     let marks2 = document.getElementById("marks2").value;
     let marks3 = document.getElementById("marks3").value;
     let marks4 = document.getElementById("marks4").value;
     let marks5 = document.getElementById("marks5").value;
     let marks6 = document.getElementById("marks6").value;
     
    //  document.write(s1+" "+marks1);
     
     if(marks1>100)
     {
        document.getElementById('cmarks1').innerHTML="*Please Enter Valid Marks";
        return false;
     }
     else{
         document.getElementById("cmarks1").innerHTML="";
     }
     if(marks2>100)
     {
        document.getElementById('cmarks2').innerHTML="*Please Enter Valid Marks";
        // document.write(s1+" "+marks1);
        return false;
     }
     else{
         document.getElementById("cmarks2").innerHTML="";
     }
     if(marks3>100)
     {
        document.getElementById('cmarks3').innerHTML="*Please Enter Valid Marks";
        // document.write(s1+" "+marks1);
        return false;
     }
     else{
         document.getElementById("cmarks3").innerHTML="";
     }
     if(marks4>100)
     {
        document.getElementById('cmarks4').innerHTML="*Please Enter Valid Marks";
        // document.write(s1+" "+marks1);
        return false;
     }
     else{
         document.getElementById("cmarks4").innerHTML="";
     }
     if(marks5>100)
     {
        document.getElementById('cmarks5').innerHTML="*Please Enter Valid Marks";
        // document.write(s1+" "+marks1);
        return false;
     }
     else{
         document.getElementById("cmarks5").innerHTML="";
     }
     if(marks6>100)
     {
        document.getElementById('cmarks6').innerHTML="*Please Enter Valid Marks";
        // document.write(s1+" "+marks1);
        return false;
     }
     else{
         document.getElementById("cmarks6").innerHTML="";
     }
    //  else{
    //     document.getElementById('cmarks1').innerHTML="Hello";
    //     return true;
    //  }
 }




    </script>
</body>
</html>
