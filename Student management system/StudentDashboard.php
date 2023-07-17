<?php
session_start();
if(!isset($_SESSION["user"])) {
    header("Location:studentlogin.php");
    }
    $id=$_SESSION["id"];
$servername="localhost"; 
$username = "root"; 
$password="";
$database = "mfgi";
$con = mysqli_connect($servername,$username,$password,$database);
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
    /* #mdn{
        position:absolute;
    } */
</style>
</script>
</head>
<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <?php echo "<h5 id='sess'>HI,". strtoupper($_SESSION["user"])."</h5>";?>
        <div class="header_img"> <img src="https://i.imgur.com/hczKIze.jpg" alt=""> </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">Student Dashboard</span> </a>
                <div class="nav_list"> <a href="Student_Dashboard.php" class="nav_link active"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a> 
                     <!-- <a href="searchReasult.php" class="nav_link"> <i class='bx bx-folder nav_icon'></i> <span class="nav_name">View Result</span> </a>  -->
                     <a href="searchReasult.php" class="nav_link"> <i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span class="nav_name">View Result</span> </a> </div>
            </div> <a href="LogOut.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
        </nav>
    </div>
    <div class="height-100 bg-light text-center">
    <h3 style="color:white; background-color:green;font-weight: bold;height: 50px;margin-top:10px;">STUDENT DASHBOARD</h3><br><br>
   
    <div class="container ">
    <h5 style="margin:10px;position:relative;">PERSONAL INFO</h5>
        <?php
          $sql = "SELECT * FROM `registration` where sid =$id";
          $result = mysqli_query($con,$sql);
          if($result)
          {
            while($row =mysqli_fetch_assoc($result))
            {
                
        
            echo"<table class='table table-striped'>";
                echo"<tr>
                    <td>FirstName</td>
                    <td>".$row['FirstName']."</td>
                </tr>";
               echo"<tr>
                    <td>LastName</td>
                    <td>".$row['LastName']."</td>
                </tr>";
                echo"<tr>
                    <td>Address</td>
                    <td>".$row['Address']."</td>
                </tr>";
                echo"<tr>
                    <td>Email</td>
                    <td>".$row['Email']."</td>
                </tr>";
    
                echo"<tr>
                    <td>Password</td>
                    <td>".$row['Password']."</td>
                </tr>";
            echo"</table>";
        }
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
    </script>
</body>
</html>