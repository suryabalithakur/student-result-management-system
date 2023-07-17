<?php

$servername="localhost";
$username="root";
$password="";
$database="mfgi";
$con = mysqli_connect($servername,$username,$password,$database);

?>
<!DOCTYPE html> 
<html lang="en"> 

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search_Result</title>
    <link rel="stylesheet" href="lpn.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        .lpn h2{
             text-align: center;
             margin-top: 10px;
             margin-bottom:50px;
        }
        .lpn img{
           width:100px;
           height:100px;
           border-radius: 100px;
           margin-left:55px;
        }
        ul li{
         font-weight: bold;
         font-size:20px;
         margin: 20px;
         cursor: pointer;
         
        }
        .mdn{
            
            display:flex;
        
            
        }
        table{
            margin:30px;
            
        }
        table,tr,td,th{
            border: 1px solid black;
            border-collapse:collapse;
            text-align: center;
            background-color: #ffd480;
        }
        tr,td,th{
            padding:10px;
            width:100px;
        }
       #spn a{
           color: red;
           font-weight: 15px;
       }
       #btn{
           width: 100px;
           height:30px;
           background-color: rgb(11, 161, 69);
           cursor: pointer;
           color: white;
       }
       .lpn a{
            text-decoration: none;
            color: black;
             padding:5px;
        }
        .lpn li a:hover{
            background-color:blue ;
            text-align: center;
        } 
       
    </style>
</head>

<body>
    <div class="main">
        <!-- <div class="hdr">
            <p>xyz@gmail.com</p>
 
                <img src="man.webp" alt="" width="100px" height="80px"class="nav">
                <a href="" class="nav">Log Out</a>
           
        </div> -->
        <div class="cnt">
            <!-- <div class="lpn">
                
                <img src="man.webp" alt="">
                <h2>Harshit</h2>
                <ul>
                    <li style="list-style-image: url(studentlogo.png);"><a href="view_result1.html">View Result</a></li>
                    <li style="list-style-image: url(teacherlogo.png);"><a href="http://">Recheck/Resasses</a></li>
                    <li style="list-style-image: url(subjectlogo.png);"><a href="http://">Update Profile</a></li>
                    <li style="list-style-image: url(passwordlogo.png);"><a href="http://">Update Password</a></li>
                </ul>
            </div> -->
            <div class="mdn">
                <?php
           
           if($_SERVER['REQUEST_METHOD']=='POST')
           {
            $roll = $_POST['roll'];
            $sem=$_POST['sem'];
            #$sql = "SELECT student.RollNO,student.Name,student.sem,result.sgmarks1,result.sgmarks2,result.sgmarks3,result.sgmarks4,result.sgmarks5,result.sgmarks6 FROM `result`,`student `where student.RollNo='$roll' and student.semester = '$sem' and result.RollNO = student.RollNo ";
            $sql="select * from student ,result,subject where student.RollNo =result.RollNo and result.semester = subject.semester and result.RollNo=$roll and result.semester=$sem";
            $result=mysqli_query($con,$sql);
            $count = mysqli_num_rows($result);
            if($count>0)
            {
            while($row=mysqli_fetch_assoc($result))
                      {
                          $grade1=0;
                          $grade2=0;
                          $grade3=0;
                          $grade4=0;
                          $grade5=0;
                          $grade6=0;
                       $gmarks1=$row['sgmarks1'];
                       if($gmarks1>90)
                       {
                        $grade1="A";
                       }
                       else if($gmarks1>60 && $gmarks1<90)
                       {
                           $grade1="B";
                       }
                       else
                       {
                           $grade1="C";
                       }
                       $gmarks2=$row['sgmarks2'];
                       if($gmarks2>90)
                       {
                        $grade2="A";
                       }
                       else if($gmarks2>60 && $gmarks2<90)
                       {
                           $grade2="B";
                       }
                       else
                       {
                           $grade2="C";
                       }
                       $gmarks3=$row['sgmarks3'];
                       if($gmarks3>90)
                       {
                        $grade3="A";
                       }
                       else if($gmarks3>60 && $gmarks3<90)
                       {
                           $grade3="B";
                       }
                       else
                       {
                           $grade3="C";
                       }
                       $gmarks4=$row['sgmarks4'];
                       if($gmarks4>90)
                       {
                        $grade4="A";
                       }
                       else if($gmarks4>60 && $gmarks4<90)
                       {
                           $grade4="B";
                       }
                       else
                       {
                           $grade4="C";
                       }
                       $gmarks5=$row['sgmarks5'];
                       if($gmarks5>90)
                       {
                        $grade5="A";
                       }
                       else if($gmarks5>60 && $gmarks5<90)
                       {
                           $grade5="B";
                       }
                       else
                       {
                           $grade5="C";
                       }
                       $gmarks6=$row['sgmarks6'];
                       if($gmarks6>90)
                       {
                        $grade6="A";
                       }
                       else if($gmarks6>60 && $gmarks6<90)
                       {
                           $grade6="B";
                       }
                       else
                       {
                           $grade6="C";
                       }
                    
                    echo"<table style='margin: 30px;width:100%'>";
                      echo " <tr>
                           <td colspan='6' style='text-align: start;'>Name: ".$row['Name']."</td>                                                    
                       </tr>";
                      echo" <tr>
                        <td colspan='6' style='text-align: start;'>Roll No: ".$row['RollNo']."</td> 
                       </tr>";
                      echo " <tr>
                           <th>Subject Name</th>
                           <th>Max Marks</th>
                           <th>Min Marks</th>
                           <th>Mark Obtained</th>
                           <th>Grade</th>
                           
                       </tr>";
                        
                         echo"<tr>
                         <td>".$row['subject1']."</td>
                         <td>".$row['s1marks']."</td>
                         <td>28</td>
                         <td>".$row['sgmarks1']."</td>
                         <td>".$grade1."</td>
                         
                         </tr>";
                         echo"<tr>
                         <td>".$row['subject2']."</td>
                         <td>".$row['s2marks']."</td>
                         <td>28</td>
                         <td>".$row['sgmarks2']."</td>
                         <td>".$grade2."</td>
                         
                         </tr>";
                         echo"<tr>
                         <td>".$row['subject3']."</td>
                         <td>".$row['s3marks']."</td>
                         <td>28</td>
                         <td>".$row['sgmarks3']."</td>
                         <td>".$grade3."</td>
                         </tr>";
                         echo"<tr>
                         <td>".$row['subject4']."</td>
                         <td>".$row['s4marks']."</td>
                         <td>28</td>
                         <td>".$row['sgmarks4']."</td>
                         <td>".$grade4."</td>
                         </tr>";
                         echo"<tr>
                         <td>".$row['subject5']."</td>
                         <td>".$row['s5marks']."</td>
                         <td>28</td>
                         <td>".$row['sgmarks5']."</td>
                         <td>".$grade5."</td>
                         </tr>";
                         echo"<tr>
                         <td>".$row['subject6']."</td>
                         <td>".$row['s6marks']."</td>
                         <td>28</td>
                         <td>".$row['sgmarks6']."</td>
                         <td>".$grade6."</td>
                         </tr>";
                      
             
                      echo" <tr>
                           <td colspan='6'>
                               <span style='color: rgb(6, 184, 6); float: left;font-size:20px;'>Congratulations You have Pass the Exam</span>
                               <span style='float: right; color: rgb(255, 72, 0);' id='spn'><a href='http:'>Rechek/Resasses</a></span>
                               <br><br>

                               <input type='button' value='Print' id='btn'>
                           </td>
                       </tr>";
                  echo" </table>";
                } 
            }
                else{
                 
                   header("Location:searchReasult.php");
                // include 'searchReasult.php';
               
                    
                }
           
            
            }
             
           ?>
            </div>
            
           
        </div>
        
    </div>
  <script>
    //   $('document').ready(function(){
    //   $('#btn').click(function()
    //   {
    //       $('#btn').hide();
    //   });
    //   $("#btn").click(function(){
    //         window.print();
    //     });
    //   });

      var btn = document.getElementById('btn');
      btn.addEventListener('click', function(){
          btn.style.display="none";
          window.print();
      })
  </script>
</body>

</html>