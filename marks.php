<?php
    include("config.php");

    if(isset($_POST['find'])){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $id = $_POST['id'];


            //get all recodes from marks table
            $sql_all = "SELECT marks.id, marks.English, marks.IT, marks.Maths, marks.Science, marks.total, marks.average, student.fname, student.lname, student.grade, student.gender, student.email FROM marks LEFT JOIN student ON student.s_id = marks.id WHERE student.s_id && marks.id = '$id'";
            $result = mysqli_query($con, $sql_all);

        }
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Marks</title>
    <link rel="stylesheet" href="style.css">

    <style>
        table {
            border-collapse: collapse;
            width: 50%;
        }

        th, td {
            padding: 8px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }
        th{
            font-size: 120%;
            font-family: 'Oswald', sans-serif;
        }
        tr{
            font-size: 100%;
            font-family: 'Poppins', sans-serif;
        }
        .edit{
            background: rgba(0, 172, 255, 0.19);
            color: rgba(0, 49, 255, 1);
            width: 80%;
            height: 30px;
            border: none;
            border-radius: 10px;
            font-size: 100%;
            font-family: 'Poppins', sans-serif;
        }
        .edit:hover{
            background: rgba(0, 49, 255, 1);
            color: white;
        }
        h1{
            font-size: 350%;
            font-family: 'Poppins', sans-serif;
        }
        .acc_a{
            color: green;
        }
        .acc_d{
            color: red;
        }
        .back{
            background: rgba(0, 172, 255, 0.19);
            color: rgba(0, 49, 255, 1);
            width: 10%;
            height: 30px;
            border: none;
            border-radius: 10px;
            font-size: 100%;
            font-family: 'Poppins', sans-serif;
        }
        .back:hover{
            background: rgba(0, 49, 255, 1);
            color: white;
        }
        p{
            font-size: 100%;
            font-family: 'Poppins', sans-serif;  
        }
        .btn {
            background: #b0ebc4;
            color: rgb(25, 155, 75);
            text-transform: capitalize;
            font-size: 20px;
            cursor: pointer;
            border-radius: 2%;
            border: none;
            width: 15%;
        }

        .btn:hover {
            background: rgb(25, 155, 75);
            color: #fff;
        }
        </style>
</head>
<body>
    <a href="index.php">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
            <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
        </svg>
    </a>
    <br><br><br>
    <?php
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
        

    ?>
    <center>
    <table border="1">
        <tr>
            <td colspan="2">
                <h2>Team Test Marks</h2>
            </td>
        </tr>
        <tr>
            <td>
                Name:
            </td>
            <td>
                <?php echo($row['fname']."&nbsp".$row['lname']); ?>
            </td>
        </tr>
        <tr>
            <td>
                Gender:
            </td>
            <td>
                <?php echo($row['gender']); ?>
            </td>
        </tr>
        <tr>
            <td>
                Grade:
            </td>
            <td>
                <?php echo($row['grade']); ?> 
            </td>
        </tr>
        <tr>
            <td>
                Email:
            </td>
            <td>
                <?php echo($row['email']); ?> 
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <h2>Marks</h2>
            </td>
        </tr>
        <tr>
            <td>
                English
            </td>
            <td>
                <?php echo($row['English']); ?> 
            </td>
        </tr>
        <tr>
            <td>
                IT
            </td>
            <td>
                <?php echo($row['IT']); ?> 
            </td>
        </tr>
        <tr>
            <td>
                Maths
            </td>
            <td>
                <?php echo($row['Maths']); ?> 
            </td>
        </tr>
        <tr>
            <td>
                Science
            </td>
            <td>
                <?php echo($row['Science']); ?> 
            </td>
        </tr>
        <tr>
            <td>
                <b>Total</b>
            </td>
            <td>
                <b><?php echo($row['total']); ?> </b>
            </td>
        </tr>
        <tr>
            <td>
                <b>Average</b>
            </td>
            <td>
                <b><?php echo($row['average']); ?></b> 
            </td>
        </tr>
    </table>
    <br><br>
    <button onclick="window.print()">Download</button>
    <?php
            }
        }
    ?>
    </center>
</body>
</html>