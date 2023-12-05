<?php
session_start();
if(!isset($_SESSION["user"])) {
    header("Location:studentlogin.php");
    }
$servername="localhost";
$username = "root";
$password="";
$database = "mfgi";
$con = mysqli_connect($servername,$username,$password,$database);
$sql1 = "SELECT * FROM `registration`";
$result = mysqli_query($con,$sql1);
$count = mysqli_num_rows($result);
$sql2 = "SELECT * FROM `subject`";
$result2 = mysqli_query($con,$sql2);
$count2 = mysqli_num_rows($result2);
$sql3 = "SELECT * FROM `registration` where role = 'Student'";
$result3 = mysqli_query($con,$sql3);
$count3 = mysqli_num_rows($result3);
$sql4 = "SELECT * FROM `result`";
$result4 = mysqli_query($con,$sql4);
$count4 = mysqli_num_rows($result4);

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

.box1{
            width:35rem;
            height: 150px;
           
            background-color: aqua;
            margin:20px 10px 20px 20px;
            box-shadow: 5px 5px 10px rgb(165, 153, 153);
           
        }

.box2{
            width:35rem;
            height: 150px;
            background-color: rgb(229, 255, 0);
            margin:20px 10px 20px 20px;
            box-shadow: 5px 5px 10px rgb(165, 153, 153);
        }
        .box3{
            width:35rem;
            height: 150px;
            background-color: rgb(60, 255, 0);
            margin:20px 10px 20px 20px;
            box-shadow: 5px 5px 10px rgb(165, 153, 153);
        }
        .box4{
            width:35rem;
            height: 150px;
            background-color: rgb(47, 29, 148);
            margin:20px 10px 20px 20px;
            box-shadow: 5px 5px 10px rgb(165, 153, 153);
        }
        /* .logo{
            float:left;
            margin: 25px;
        } */
        .logo{
            width:50px;
            height: 50px;
            
        }
        .sp{
            float:right;
            color: white;
            margin:70px 20px 5px 0px;
            font-weight: bold;
            font-size: large;
            
        }
        .container{
        margin: 0px auto;
        padding: 0px;
        display: flex;
    }
    @media screen and (min-width: 768px) {
       .logo{
            float:left;
            margin: 25px;
        }
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
            <div> <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">Admin Dashboard</span> </a>
                <div class="nav_list"> <a href="AdminDashboard.php" class="nav_link active"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a> 
                    <a href="Add_student.php" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Students</span> </a> 
                    <a href="Faculty.php" class="nav_link"> <i class='bx bx-message-square-detail nav_icon'></i> <span class="nav_name">Faculty</span> </a>
                     <!-- <a href="Subject.php" class="nav_link"> <i class='bx bx-bookmark nav_icon'></i> <span class="nav_name">Subject</span> </a>  -->
                     <!-- <a href="#" class="nav_link"> <i class='bx bx-folder nav_icon'></i> <span class="nav_name">View Result</span> </a>  -->
                     <a href="Subject.php" class="nav_link"> <i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span class="nav_name">Subject</span> </a> </div>
            </div> <a href="LogOut.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
        </nav>
    </div>
    <div class="height-100 bg-light text-center">
    <h3 style="color:white; background-color:green;font-weight: bold;height: 50px;margin-top:10px;">ADMIN DASHBOARD</h3><br><br>
     
        <div class="container" id="mdn">
        
                <div class="box1">
                    <img src="userlogo.png" alt="" class="logo">
                    <span class="sp"><?php echo $count;?></span>
                    <span class="sp">Register User:</span>
                </div>
                <div class="box2">
                    <img src="subjectlogo1.png" alt="" class="logo">
                    <span class="sp"><?php echo $count2;?></span>
                    <span class="sp">Subject listed</span>
                </div>
           
            </div>
            <div class="container">
              
                <div class="box3">
                    <img src="studentlogo1.png" alt="" class="logo">
                    <span class="sp"><?php echo $count3;?></span>
                    <span class="sp">Total Student</span>
                </div>
                <div class="box4">
                    <img src="resultlogo1.png" alt="" class="logo">
                    <span class="sp"><?php echo $count4;?></span>
                    <span class="sp">Result Declared</span>
                </div>
            </div>
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
    </script>
</body>
</html>
