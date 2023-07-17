<?php
    $servername="localhost";
	$username = "root";
	$password="";
	$database = "mfgi";
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
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="sidebar.css">
<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>
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
    text-align:center;
}
#add input{
    width:50%;
    text-align: center;
}
#show{
    text-align:center;
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
    <h3 style="color:white; background-color:green;font-weight: bold;height: 50px;margin-top:10px;">PLEASE ENTER DETAILS FOR ADDING STUDENT</h3><br><br>
  
    <div class="container" id="add">
        <?php
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            $sroll = $_POST['sroll'];
            $sname = $_POST['sname'];
            $sem = $_POST['sem'];
             try{
            $sql = "INSERT INTO `student` (`RollNo`, `Name`, `sem`) VALUES ('$sroll', '$sname', '$sem')";
             $result =mysqli_query($con,$sql);
             if($result)
             {
               echo"<h1 style='color:#66ff33'>Student Detail Enter Successfully!..</h1>";
             }
             }catch(Exception $e)
             {
                echo"<h3 style='color:red'>Student Already Present in Database</h3>";
             }
            }
          
        ?>
        </div>
      <div class="container" id="add">
        <h5>Add New Student</h5>
        <form action="/practise/Add_student.php" method="POST">
           <div class="mb-3"><input type="text" name="sname" id="" placeholder="Enter Name" required></div>
           <div class="mb-3"><input type="text" name="sroll" id="" placeholder="Enter Roll No."required></div>
           <div class="mb-3"><input type="text" name="sem" id="" placeholder="Enter Semester"required></div>
           <input type="submit" value="Add"class="btn btn-primary">
        </form>
      </div>
     <div class="container" id="show">
     <h5 style="margin-top:6rem; margin-bottom:50px;">All Students Detail</h5>
        <table id="example" class="table table-striped">
            <thead>
                <tr>
                    <th>Sr.No</th>
                    <th>RollNo</th>
                    <th>Name</th>
                    <th>Semester</th>
                    </tr>
            </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM `student`";
            $result =mysqli_query($con,$sql);
             $count=0;
             while($row = mysqli_fetch_assoc($result))
            {
            $count++;
            echo" <tr>
                    <td>". $count."</td>
                    <td>".$row['RollNo']."</td>
                    <td>".$row['Name']."</td>
                    <td>".$row['sem']."</td>
                    </tr>";
            }
            ?>
             </tfoot>
            </table>
      
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