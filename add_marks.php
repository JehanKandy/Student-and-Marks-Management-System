<?php
    include("config.php");
    if(isset($_POST['find'])){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $_POST['id'];
        
        
            $sql1 = "SELECT * FROM student WHERE s_id= '$id'";
            $result1 = mysqli_query($con, $sql1);   
            
            if(mysqli_num_rows($result1) > 0){
                while($row = mysqli_fetch_assoc($result1)){ 
                    $s_id = $row['s_id'];
                    $fn = $row['fname'];
                    $ln = $row['lname'];
                    $gender = $row['gender'];
                    $grade = $row['grade'];
                    $email = $row['email'];
                }          
            }
        }
    }elseif(isset($_POST['marks'])){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $ss_id = $_POST['s_id'];
            $eng = $_POST['eng'];
            $it = $_POST['it'];
            $math = $_POST['maths'];
            $sci = $_POST['sci'];

            //check existing marks for one student in the database
            $sql2 = "SELECT * FROM marks WHERE id = '$ss_id'";
            $result2 = mysqli_query($con, $sql2);
            
            $nor = mysqli_num_rows($result2);


            
            if($nor > 0){
                $error[] = "Student Marks already added";
            }elseif(empty($eng)){
                $error[] = "English Marks Shouldn't be empty";
            }
            elseif(empty($it)){
                $error[] = "English Marks Shouldn't be empty";
            }
            elseif(empty($math)){
                $error[] = "English Marks Shouldn't be empty";
            }
            elseif(empty($sci)){
                $error[] = "English Marks Shouldn't be empty";

            }else{
                //calculate marks total and average
                //total

                $total = $eng + $it + $math + $sci;

                //average = total/(count of subjects)
                //4 subjects are here.

                $avg = $total/4;
                        
                $sql4 = "INSERT INTO marks(id,English,IT,Maths,Science,total,average)VALUES('$ss_id','$eng','$it','$math','$sci','$total','$avg')";
                $result4 = mysqli_query($con, $sql4);
                header("location:all_marks.php");
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
    <title>Add Marks</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="content">
                <h1>
                    Add Student Marks
                </h1>
                <div class="form-container">
                    <form action="<?php echo($_SERVER['PHP_SELF'])?>" method="post">
                        <?php
                                if(isset($error1)){
                                    foreach($erro1r as $error){
                                        echo("<p class='error'>".$error1."</p>");
                                    }
                                }
                        ?>
                        <input type="number" name="id" placeholder="Enter Student ID">
                        <input type="submit" value="Find" name="find" class="form-btn">            
                    </form>
                



                
                <form action="<?php echo($_SERVER['PHP_SELF'])?>" method="post">
                        <?php
                                if(isset($error)){
                                    foreach($error as $error){
                                        echo("<p class='error'>".$error."</p>");
                                    }
                                }
                        ?>
                    Index Number :
                        <input type="number"  value="<?php echo $s_id; ?>" disabled>
                        <input type="hidden" name="s_id" value="<?php echo $s_id; ?>">
                    First Name : 
                        <input type="text"  value="<?php echo $fn; ?>" disabled>
                    Last Name : 
                        <input type="text"  value="<?php echo $ln; ?>" disabled>
                    Gender : 
                        <input type="text"  value="<?php echo $gender; ?>" disabled>
                    Grade : 
                        <input type="text"  value="<?php echo $grade; ?>" disabled>
                    Email : 
                        <input type="text"  value="<?php echo $email; ?>" disabled>

                        Add Marks: 
                        <input type="number" name="eng" placeholder="Enter English Marks">
                        <input type="number" name="it" placeholder="Enter IT Marks">
                        <input type="number" name="maths" placeholder="Enter Maths Marks">
                        <input type="number" name="sci" placeholder="Enter Science Marks">
                                                
                    <input type="submit" value="ADD" name="marks" class="form-btn">
                </form>                   
            </div>
            <a href="all_marks.php"><button>All Marks</button></a>
            <a href="admin.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                    <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
                </svg>
            </a>
        </div>
    </div>
</body>
</html>