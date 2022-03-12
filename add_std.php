<?php
    include("config.php");

    if(isset($_POST['submit'])){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $s_id = $_POST['s_id'];
            $fn = $_POST['fn'];
            $ln = $_POST['ln'];
            $grade = $_POST['grade'];
            $gender = $_POST['gender'];
            $dob = $_POST['dob'];
            $email = $_POST['email'];
            $tp_no = $_POST['tp_no'];
            $year = $_POST['year'];
  


            //check existing student in the database
            $sql1 = "SELECT * FROM student WHERE email = '$email'";
            $result1 = mysqli_query($con, $sql1);
            
            $nor = mysqli_num_rows($result1);

            if($nor > 0){
                $error[] = "User Already exist";
            }else{
                if(empty($fn)){
                    $error[] = "First Name shouldn't be empty";
                }elseif(empty($ln)){
                    $error[] = "Last Name shouldn't be empty";
                }elseif($dob == '0000-00-00'){
                    $error[] = "Date of Birth shouldn't be empty";
                }elseif(empty($email)){
                    $error[] = "Email shouldn't be empty";
                }elseif(empty($tp_no)){
                    $error[] = "Mobile Number shouldn't be empty";
                }else{
                    $sql_insert = "INSERT INTO `student`(`s_id`,`fname`, `lname`, `grade`, `gender`, `dob`, `email`, `infor`, `year_enroll`)VALUES('$s_id','$fn','$ln','$grade','$gender','$dob','$email','$tp_no','$year')";
                    $result2 = mysqli_query($con, $sql_insert);
                    header("location:all_std.php");                             
                } 
            } 
        }
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="container">
        <div class="content">
            <div class="form-container">

                <form action="<?php echo($_SERVER['PHP_SELF'])?>" method="POST">
                    <h1>Enter Student's Information</h1>
                    <br><br>
                    
                    <?php
                                if(isset($error)){
                                    foreach($error as $error){
                                        echo("<p class='error'>".$error."</p>");
                                    }
                                }
                        ?>
                    <input type="number" name="s_id" placeholder="Enter Student ID">
                    <input type="text" name="fn" placeholder="Enter First Name">

                    <input type="text" name="ln" placeholder="Enter Last Name">
                    Select Student Grade:
                    <select name="grade">
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                    </select>
                    

                    Enter Gender:
                        <select name="gender">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>                    
                    
                    Enter Date of Birth:
                    <input type="date" name="dob" min="2000-01-01" max="2022-12-31">
                    <input type="email" name="email" placeholder="Enter Student Email">

                    <input type="text" name="tp_no" placeholder="Enter Mobile Number">
                    
                    
                    Select Year: 
                    <select name="year">
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                        <option value="2026">2026</option>
                    </select>
                    <input type="submit" class="form-btn" value="Register" name="submit">
                    <input type="reset" class="form-reset" value="Clear">                    
                </form>                
            </div>
            <a href="all_std.php"><button class="form-btn">All Student</button></a>
            <a href="admin.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
                </svg>
            </a>
        </div>
    </div>
    
</body>
</html>