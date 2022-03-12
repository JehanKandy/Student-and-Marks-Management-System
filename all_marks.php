<?php
    include("config.php");

    //get all recodes from marks table
    $sql_all = "SELECT marks.id, marks.English, marks.IT, marks.Maths, marks.Science, marks.total, marks.average, student.fname, student.lname, student.grade FROM marks LEFT JOIN student ON student.s_id = marks.id";
    $result = mysqli_query($con, $sql_all);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Student</title>
    <style>
                table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 8px;
            text-align: left;
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
    </style>
</head>
<body>


<a href="index.php">
    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="black" class="bi bi-house-door-fill" viewBox="0 0 16 16">
    <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
    </svg> 
</a>Back to Home
<br>

<center>

<h1>
    All Student
</h1>


<br><br><br><br>
    <table>
        <tr>
            <th>
                ID
            </th>
            <th>
                First Name
            </th>
            <th>
                Last Name
            </th>
            <th>
                Grade
            </th>
            <th>
                English
            </th>
            <th>
                IT
            </th>
            <th>
                Maths
            </th>
            <th>
                Science
            </th>
            <th>
                Total
            </th>
            <th>
                Average
            </th>

        </tr>
            <?php

                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){

            ?>
        <tr>
            <td>
                <?php echo($row['id']); ?>
            </td>
            <td>
                <?php echo($row['fname']); ?>
            </td>
            <td>
                <?php echo($row['lname']); ?>
            </td>
            <td>
                <?php echo($row['grade']); ?>
            </td>
            <td>
                <?php echo($row['English']); ?>
            </td>
            <td>
                <?php echo($row['IT']); ?>
            </td>
            <td>
                <?php echo($row['Maths']); ?>
            </td>
            <td>
                <?php echo($row['Science']); ?>
            </td>
            <td>
                <?php echo($row['total']); ?>
            </td>
            <td>
                <?php echo($row['average']); ?>
            </td>
            <?php
                    }
                }
            ?>
           
    </table>    
    </center>


</body>
</html>