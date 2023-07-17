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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>

    <link rel="stylesheet" href="sidebar.css">
    <style>
        /* table{
        position: absolute;
        margin:20px;
       
    }*/
    .container input{
        text-align: center;
    } 
    #sess{
        float: right;
        font-weight: bold;
        font-size:30px;
        margin-left:60rem;
    }
        .col-12 {

            margin-top: 5rem;
        }

        .parent {
            display: flex; 
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
            <div> <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span
                        class="nav_logo-name">Admin Dashboard</span> </a>
                <div class="nav_list"> <a href="AdminDashboard.php" class="nav_link active"> <i class='bx bx-grid-alt nav_icon'></i>
                        <span class="nav_name">Dashboard</span> </a>
                    <a href="Add_student.php" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span
                            class="nav_name">Students</span> </a>
                    <a href="Faculty.php" class="nav_link"> <i class='bx bx-message-square-detail nav_icon'></i> <span
                            class="nav_name">Faculty</span> </a>
                    <!-- <a href="Subject.php" class="nav_link"> <i class='bx bx-bookmark nav_icon'></i> <span
                            class="nav_name">Subject</span> </a> -->
                    <!-- <a href="#" class="nav_link"> <i class='bx bx-folder nav_icon'></i> <span class="nav_name">View
                            Result</span> </a> -->
                    <a href="Subject.php" class="nav_link"> <i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span
                            class="nav_name">Subject</span> </a>
                </div>
            </div> <a href="LogOut.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span
                    class="nav_name">SignOut</span> </a>
        </nav>
    </div>
    <div class="height-100 bg-light text-center">
    <h3 style="color:white; background-color:green;font-weight: bold;height: 50px;margin-top:10px;">PLEASE ENTER DETAILS FOR ADDING SUBJECT</h3><br><br>
        <div class="container">
        <?php
                if($_SERVER['REQUEST_METHOD']=='POST')
                {
                    $sem=$_POST['sem'];
                    $sub1 = $_POST['sub1'];
                    $marks1 = $_POST['marks1'];
                    $sub2 = $_POST['sub2'];
                    $marks2 = $_POST['marks2'];
                    $sub3 = $_POST['sub3'];
                    $marks3 = $_POST['marks3'];
                    $sub4 = $_POST['sub4'];
                    $marks4 = $_POST['marks4'];
                    $sub5 = $_POST['sub5'];
                    $marks5 = $_POST['marks5'];
                    $sub6 = $_POST['sub6'];
                    $marks6 = $_POST['marks6'];
                    
                   
                     try{
                    
                    $sql = "INSERT INTO `subject` (`semester`, `subject1`, `s1marks`, `subject2`, `s2marks`, `subject3`, `s3marks`, `subject4`, `s4marks`, `subject5`, `s5marks`, `subject6`, `s6marks`) VALUES ('$sem', '$sub1', '$marks1', '$sub2', '$marks2', '$sub3', '$marks3', '$sub4', '$marks4', '$sub5', '$marks5', '$sub6', '$marks6')";
                     $result =mysqli_query($con,$sql);
                     if($result)
                     {
                         echo"<h2 style='color:#66ff33;'>Data is added Successfully!</h2>";
                     }
                    }catch(Exception $e)
                    {
                       echo"<h3 style='color:red'>Subject Already Present in Database of this semester</h3>";
                    }
                     
                }
                ?>
            <form action="/practise/Subject.php" method="POST" class="row g-3" id="top">
                <div id="one">
                    <label for="semester" class="form-label">Enter Semester</label><input type="text" name="sem"
                        id="semester" class="form-control"required>
                </div>
                <div class="parent">
                    <div class="col-md-6" id="two">
                        <label for="sub1" class="form-label">Enter Subject1</label><input type="text" name="sub1"
                            id="sub1" class="form-control" required>
                    </div>&nbsp; &nbsp;
                    <div id="three" class="col-md-6">
                        <label for="marks1" class="form-label">Enter Subject1 Marks</label><input type="text"
                            name="marks1" id="marks1" class="form-control"required>
                    </div>
                </div>
                <div class="parent">
                    <div class="col-md-6">
                        <label for="sub2"class="form-label">Enter Subject2</label><input type="text" name="sub2" id="sub2" class="form-control" required>
                    </div>&nbsp; &nbsp;
                    <div  class="col-md-6">
                        <label for="marks2"class="form-label">Enter Subject2 Marks</label><input type="text" name="marks2" id="marks2" class="form-control"required>
                    </div>
                </div>
                <div class="parent">
                    <div class="col-md-6">
                        <label for="sub3"class="form-label">Enter Subject3</label><input type="text" name="sub3" id="sub3"class="form-control"required>
                    </div>&nbsp; &nbsp;
                    <div  class="col-md-6">
                        <label for="marks3"class="form-label">Enter Subject3 Marks</label><input type="text" name="marks3" id="marks3"class="form-control"required>
                    </div>
                </div>
                <div class="parent">
                    <div class="col-md-6">
                        <label for="sub4"class="form-label">Enter Subject4</label><input type="text" name="sub4" id="sub4"class="form-control"required>
                    </div>&nbsp; &nbsp;
                    <div  class="col-md-6">
                        <label for="marks4"class="form-label">Enter Subject4 Marks</label><input type="text" name="marks4" id="marks4"class="form-control"required>
                    </div>
                </div>
                <div class="parent">
                    <div class="col-md-6">
                        <label for="sub5"class="form-label">Enter Subject5</label><input type="text" name="sub5" id="sub5"class="form-control"required>
                    </div>&nbsp; &nbsp;
                    <div  class="col-md-6">
                        <label for="marks5"class="form-label">Enter Subject5 Marks</label><input type="text" name="marks5" id="marks5"class="form-control"required>
                    </div>
                </div>
                <div class="parent">
                    <div class="col-md-6">
                        <label for="sub6"class="form-label">Enter Subject6</label><input type="text" name="sub6" id="sub6"class="form-control"required>
                    </div>&nbsp; &nbsp;
                    <div  class="col-md-6">
                        <label for="marks6"class="form-label">Enter Subject6 Marks</label><input type="text" name="marks6" id="marks6"class="form-control"required>
                    </div>
                </div>
               
                <input type="submit" value="Submit" id="submit"class="form-control btn-success">
                

                
            </form>

        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function (event) {

            const showNavbar = (toggleId, navId, bodyId, headerId) => {
                const toggle = document.getElementById(toggleId),
                    nav = document.getElementById(navId),
                    bodypd = document.getElementById(bodyId),
                    headerpd = document.getElementById(headerId)

                // Validate that all variables exist
                if (toggle && nav && bodypd && headerpd) {
                    toggle.addEventListener('click', () => {
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

            showNavbar('header-toggle', 'nav-bar', 'body-pd', 'header')

            /*===== LINK ACTIVE =====*/
            const linkColor = document.querySelectorAll('.nav_link')

            function colorLink() {
                if (linkColor) {
                    linkColor.forEach(l => l.classList.remove('active'))
                    this.classList.add('active')
                }
            }
            linkColor.forEach(l => l.addEventListener('click', colorLink))

            // Your code to run since DOM is loaded and ready
        });
    </script>
</body>

</html>