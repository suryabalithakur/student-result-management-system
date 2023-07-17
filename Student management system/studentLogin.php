
<?php
   session_start();
    $servername="localhost";
	$username = "root";
	$password="";
	$database = "mfgi";
	$con = mysqli_connect($servername,$username,$password,$database);
	   $error="";
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $username = $_POST['user'];
        $pass = $_POST['Password'];
        $role = $_POST['role'];
        
        
        $sql = "select *from registration where Email = '$username' and Password = '$pass' and role = '$role'"; 
        $result = mysqli_query($con,$sql);
        $count = mysqli_num_rows($result);
        if($count==1)
        { 
          while($row=mysqli_fetch_assoc($result))
          {
            $_SESSION['user']=$row['FirstName'];
            $_SESSION['id']=$row['sid'];
          }
            if($role=="Student")
          {
            header('Location:/practise/Student_Dashboard.php');
          }
          if($role=="Faculty")
          {
            header('Location:/practise/Faculty_Dashboard.php');
          }
          if($role =="Admin")
          {
            header('Location:/practise/AdminDashboard.php');
          }
        }
        else{
          $error = "Invalid Credentials";
            // echo"<h3 style='color:red;'>Invalid Credentials</h3>";
            // include 'studentlogin.php';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="home.css">
  <link rel="stylesheet" href="contact.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

  <style>
    .box h2 {
      color: black;
      font-family: cursive;
    }
  .card{
    width: 23rem;
    margin:50px auto;
  }
  .contianer{
    position: absolute;
    opacity: 0.8;
    z-index: -1;
    height:750px;
    width: 100%;
    overflow: hidden;
    overflow-y: hidden;

  }
  #face{
    background-color:rgb(95, 95, 216) ;
    height: 30px;
    text-align: center;
    border-radius: 5px;
  }
  #face a{
    color:white;
    text-decoration: none;
    }
  #google{
    background-color:rgb(87, 224, 75) ;
    height: 30px;
    text-align: center;
    border-radius: 5px;
  }
  #google a{
    color:white;
    text-decoration: none;
    }
    .sub{
     height:30px;
     background-color: green;
     text-align: center;
     color: white;
     padding-top: 5px;
     padding-bottom:20px;
    }
    /* h5{
      text-align: end;
    } */
    h5 a{
      text-decoration: none;
      font-size:15px;
      margin-left:5px ;
    }
    h6 a{
      text-decoration: none;
      color: red;
    }
    .btn {
      box-shadow: none !important;
      color: white;
      color: #fff !important;
      font-weight: 600;
      margin: 0px;
      padding:0px;
      margin-top: 7px;
      text-align: center;
    }
    .btn:hover{
      background-color: red;
    }
  </style>
</head>

<body>
  <section id="nav-bar">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <img src="http://www.sts-school.edu.in/wp-content/uploads/2019/10/Best-School-in-Meerut-1.png" alt="" id="logo">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="student.html">HOME</a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link" href="#">SERVICES</a>
            </li> -->
            <li class="nav-item">


              <!-- for contact code -->
              <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                CONTACT US
              </button>
              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="contact-clean">
                        <form onsubmit="">
                          <h2 class="text-center">Contact us</h2>
                          <div class="form-group"><input class="form-control" type="text" name="name"
                              placeholder="Name"></div>
                          <div class="form-group"><input class="form-control" type="email" name="email"
                              placeholder="Email"></div>
                          <div class="form-group"><textarea class="form-control" name="message" placeholder="Message"
                              rows="14"></textarea></div>
                          <div class="form-group"><button class="btn btn-primary" type="submit">send </button></div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="studentlogin.php">SIGN IN</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="signup.php">SIGN UP</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </section>
  <div class="contianer">
  <img src="https://www.ppt-backgrounds.net/thumbs/free-new-powerpoint--page-33--ppt-clip-art-keynote.jpeg" alt="">
  </div>
  <div class="card">
  <div class="card-body">
    <h3 style="text-align: center;">Log in</h3>
    <h5> New User? <a href="signup.php">Register Now!</a></h5>
    <?php
    echo"<h5 style='color:red;'>$error</h5>";
    ?>
    <form action="/practise/studentlogin.php"onsubmit="return validate()"method="post">
    <div class="mb-3">
      <input type="text " name="user" placeholder="UserName" required class="form-control" id="user">
      <span id="incorrectUser"style="color: red;font-size: small; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;"></span>
    </div>
    <div class="mb-3">
      <input type="password" name="Password" placeholder="Password" class=" form-control text" required id="Password">
      <span id="incorrectPassword"style="color: red;font-size: small; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;"></span>
    </div>
    <div class="mb-3">
    <select class="form-select" aria-label="Default select example" name="role">
      <option value="Student">Student</option>
      <option value="Admin">Admin</option>
      <option value="Faculty">Faculty</option>
    </select>
  </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked required>
      <label class="form-check-label" for="flexRadioDefault2">
        REMEMBER ME
      </label>
    </div>
    <h6 style="text-align: end;"><a href="">Forgot Password</a></h6>
    <div class="d-grid gap-2">
     <input type="submit" value="SUBMIT" id="formGroupExampleInput" class="form-control sub">
    </div>
  </form>
    <h6 style="text-align: center; margin-top: 10px;">OR</h6>
     <p id="face"><a href="#">Log in with Google</a></p>
     <p id="google"><a href="#">Log in with Facebook</a></p>
</div>
</div>
<script>
        function validate()
        {
            var user=document.getElementById("user").value;
            var pass =document.getElementById("Password").value;
            var userCheck=/^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$/;
            var passwordCheck=/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{7,15}$/;
            if(userCheck.test(user))
            {
                document.getElementById("incorrectUser").innerHTML="";
               
            }
            else{
                document.getElementById("incorrectUser").innerHTML="*Invalid UserName";
                return false; 
            }
            if(passwordCheck.test(pass))
            {
                document.getElementById("incorrectPassword").innerHTML="";
               
            }
            else{
                document.getElementById("incorrectPassword").innerHTML="*Invalid Password";
                return false; 
            }
       
            
        }
    </script>


  </body>
</html>