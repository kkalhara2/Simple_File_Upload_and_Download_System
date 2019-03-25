<?php
    require_once('inc/connection.php');

    $Subject = mysqli_real_escape_string($connection,$_POST['Subject']);
    $Year = mysqli_real_escape_string($connection,$_POST['Year']);
    $Level = mysqli_real_escape_string($connection,$_POST['Level']);
    $Semester = mysqli_real_escape_string($connection,$_POST['Semester']);

    $query ="SELECT * FROM file_details WHERE  Subject ='{$Subject}' AND Year = '{$Year}' AND Level = '{$Level}' AND Semester = '{$Semester}'";

    $result = mysqli_query($connection,$query);
    $count = mysqli_num_rows($result);
    echo "<tr><th colspan='7'> <p style='color: red;text-align: center'>Search Result For $Subject --> $Year --> $Level --> $Semester</p></th></tr>";

    if($result && $count > 0){
        while($file=mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>{$file['File_Name']}</td>";
            $url = "upload/".$file['Link']."/".$file['File_Name'];
            echo "<td><a href=\"$url\" download>Download</a></td>";
           /* echo "<td>{$file['No_of_Downloads']}</td>";*/
            echo "</tr>";
        }
    }else{
        echo "<tr><td colspan='7'> <p style='color: red;text-align: center'>Sorry No Files Found On Server For Your Selection.</p></td></tr>";
    }

    /*$query = "SELECT No_of_Downloads FROM file_details WHERE "
    $DownloadsQuery = "UPDATE file_details SET No_of_Downloads = {$}"*/
?>