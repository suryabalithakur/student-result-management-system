<?php
 $serverName = "localhost";
 $userName = "root";
 $password = "";
 $database = "mfgi";
 $con = mysqli_connect($serverName,$userName,$password,$database);

	if($_SERVER['REQUEST_METHOD']=='POST')
	   {
		   $fName = $_POST['FirstName'];
		   $lName = $_POST['secondName'];
		   $address = $_POST['Address'];
		   $Email = $_POST['Email'];
		   $pass = $_POST['Pass'];
		   $role = $_POST['role'];  
		   $sql = "INSERT INTO `registration` (`sid`, `FirstName`, `LastName`, `Address`, `Email`, `Password`, `role`) VALUES (NULL, '$fName', '$lName', '$address', '$Email', '$pass', '$role')";
		    $result =mysqli_query($con,$sql);
        if($result){
          header("Location:studentlogin.php");
        }
        else{
            echo"Please all the deatail carefully";
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
    .dropdown-item{
    background-color:#5f1782;
  }
  .dropdown-item:hover{
    background-color: red;
  }
  .card{
    width:35rem;
    margin:1px auto;
  }
  .contianer{
    position: absolute;
    opacity: 0.8;
    z-index: -1;
    height:750px;
    width: 100%;
    /* box-sizing:content-box; */
    overflow: hidden;
    overflow-y: hidden;

  }
  /* .contianer img{
    position: re;
    width:100%;
  } */
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
    /* .products {
      display: flex;
      display: inline-block;
      margin-left: 1.5rem;
    } */

    /* .card {
      width: 50%;
      margin: 2rem;
      background-color: black;
      color: white;
      border-radius: 10px;
      z-index:1;
    } */
.sbt1{
background-color: green;
color: white;
width:260px;
}
.sbt1:hover{
  background-color: red;
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
    /* .btn:hover{
      background-color: red;
    } */
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
            <!-- <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                SIGN IN
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown" id="dp">
                <li class="drop"><a class="dropdown-item" href="#">ADMIN</a></li>
                <li class="drop"><a class="dropdown-item" href="#">FACULTY</a></li>
                <li class="drop"><a class="dropdown-item" href="#">STUDENT</a></li>
              </ul>
            </li> -->
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
  <!-- <img src="https://external-preview.redd.it/ZuzCLqAY5E99twDyx6Cm6fwQF3HDANYxeH1dQXWYEys.jpg?auto=webp&s=1fad4a8a09753c83fb31539ce56e68307a71168d" alt=""> -->
  <!-- <img src="https://cdn.wallpapersafari.com/0/59/or4G9O.jpg" alt=""> -->
  </div>
  <div class="card">
  <div class="card-body">
    <h3 style="text-align: center;">Sign up</h3>
    <!-- <h5> New User? <a href="signup.php">Register Now!</a></h5> -->
    <form action="/practise/signup.php"onsubmit=" return validate()" method="POST">
    <div class="mb-3">
      <label for="firstName" class="form-label">First Name:</label>
      <input type="text" name="FirstName" id="firstName" placeholder="Enter your first name" required class="form-control">
      <span id="incorrectFirst" style="color: red;font-size: small; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;"></span>
    </div>
    <div class="mb-3">
      <label for="secondName" class="form-label">Last Name:</label>
      <input type="text" name="secondName" id="secondName" placeholder="Enter your last name" required class="form-control">
      <span id="incorrectSecond" style="color: red;font-size: small; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;"></span>
    </div>
    <div class="mb-3">
      <label for="Address" class="form-label">Address:</label>
      <input type="text" name="Address" id="Address" placeholder="Enter your parmanent Address" required class="form-control">
       <span id="incorrectAddress"style="color: red;font-size: small; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;"></span>
    </div>
    <div class="mb-3">
      <label for="Email" class="form-label">Email:</label>
      <input type="email" name="Email" id="Email" placeholder="Enter your email address" required class="form-control">
      <span id="incorrectEmail"style="color: red;font-size: small; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;"></span>
    </div>
    <div class="mb-3">
      <label for="pass" class="form-label">Password:</label>
      <input type="password" name="Pass" id="Pass" placeholder="Enter your password" required class="form-control">
      <span id="incorrectPassword"style="color: red;font-size: small; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;"></span>
    </div>
    <div class="mb-3">
      <label for="Cpass" class="form-label">Conform Password:</label>
      <input type="password" name="Cpass" id="Cpass" placeholder="Enter your password again" required class="form-control">
      <span id="incorrectConform"style="color: red;font-size: small; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;"></span>
    </div>
    <div class="mb-3">
      <label for="select" class="form-label">Select Role:</label>
    <select class="form-select" aria-label="Default select example" id="select"name="role">
      <option selected>Student</option>
      <option value="1">Admin</option>
      <option value="2">Faculty</option>
    </select>
  </div>
    <!-- <div class="form-check">
      <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked required>
      <label class="form-check-label" for="flexRadioDefault2">
        <a href="">terms of
          use and privacy policy</a>
      </label>
    </div> -->
    <div class="sbt">
      <input type="checkbox" name="" id="" class="" required>I accept <a href="" style="color: rgb(243, 27, 124);">terms of
          use and privacy policy</a><br>
      <input type="submit" value="Submit" class="sbt1">
      <input type="reset" value="Cancel" class="sbt1">
  </div>
    <!-- <h6 style="text-align: end;"><a href="">Forgot Password</a></h6> -->
    <!-- <div class="d-grid gap-2">
     <input type="submit" value="Submit" id="formGroupExampleInput" class="form-control sub">
    </div> -->
  </form>
    <!-- <h6 style="text-align: center; margin-top: 10px;">OR</h6>
     <p id="face"><a href="#">Log in with Google</a></p>
     <p id="google"><a href="#">Log in with Facebook</a></p> -->
</div>
</div>
<script>
          function validate()
        {
           var firstName= document.getElementById("firstName").value;
           var secondName=document.getElementById("secondName").value;
           var address=document.getElementById("Address").value;
           var email=document.getElementById("Email").value;
           var Password=document.getElementById("Pass").value;
           var cPassword=document.getElementById("Cpass").value;
           
           var firstNameCheck = /^[a-zA-Z\s]+$/;
           var lastNameCheck  =/^[a-zA-Z\s]+$/;
           var AddressCheck =/^(\d+) ?([A-Za-z](?= ))? (.*?) ([^ ]+?) ?((?<= )APT)? ?((?<= )\d*)?$/;
           var emailCheck = /^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$/;
           var passwordCheck=/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{7,15}$/;
           if(firstNameCheck.test(firstName))
           {
            //    return "";
            document.getElementById("incorrectFirst").innerHTML="";
           }
           else{
               document.getElementById("incorrectFirst").innerHTML="*Invalid FirstName";
               return false;
           }
           if(lastNameCheck.test(secondName))
           {
              
            document.getElementById("incorrectSecond").innerHTML="";
           }
           else{
               document.getElementById("incorrectSecond").innerHTML="*Invalid LastName";
               return false;
           }
           if(AddressCheck.test(address))
           {
            document.getElementById("incorrectAddress").innerHTML="";
            
           }
           else{
               document.getElementById("incorrectAddress").innerHTML="*Invalid Address";
               return false;
           }
           if(emailCheck.test(email))
           {
               
            document.getElementById("incorrectEmail").innerHTML="";
           }
           else{
               document.getElementById("incorrectEmail").innerHTML="*Invalid Email";
               return false;
           }
           if(passwordCheck.test(Password))
           {
              
            document.getElementById("incorrectPassword").innerHTML="";
           }
           else{
               document.getElementById("incorrectPassword").innerHTML="*Invalid Password";
               return false;
           }
           if(Password.match(cPassword))
           {
            document.getElementById("incorrectConform").innerHTML="";  
            
           }
           else{
               document.getElementById("incorrectConform").innerHTML="*Password is not Match";
               return false;
           }


        }
</script>
  </body>
</html>