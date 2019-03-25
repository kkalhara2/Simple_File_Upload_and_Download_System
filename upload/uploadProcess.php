<?php
    session_start();
    require_once('inc/connection.php');

    if(isset($_POST['uploadBTN']) && !empty($_FILES['upload']['name'])){

        /*getting file details*/

        $Subject = mysqli_real_escape_string($connection,$_POST['Subject']);
        $Year = mysqli_real_escape_string($connection,$_POST['Year']);
        $Level = mysqli_real_escape_string($connection,$_POST['Level']);
        $Semester = mysqli_real_escape_string($connection,$_POST['Semester']);

        /*getting uploaded file*/

        //$file_name = $_FILES['upload']['name'];
        $file_name = preg_replace('/\s+/', '_', $_FILES['upload']['name']);
        $file_type = $_FILES['upload']['type'];
        $file_size = $_FILES['upload']['size'];
        $temp_name = $_FILES['upload']['tmp_name'];

        /*Folder hiearchy according to the details*/
        $path = "{$Subject}/{$Year}/{$Level}/{$Semester}";
        /*folder path we want create*/
        $newfolder="{$path}";

        $dir= "files"."/$newfolder";
        if(!is_dir($dir))
        {
            //create new directory recursively
            mkdir($dir,0777,true);
        }
        $upload_to = "$dir/";
        move_uploaded_file($temp_name,$upload_to . $file_name);
        /*echo "<a href=".$dir."/".$file_name." download>Download</a>";*/

        $query = "SELECT File_ID FROM file_details ORDER BY File_ID DESC LIMIT 1";
        $result_set =  mysqli_query($connection,$query);

        $result = mysqli_fetch_row($result_set);

        $File_ID = $result[0]+1;

        $query = "INSERT INTO file_details (";
        $query.="File_ID,File_Name,Link,Subject,Year,Semester,Level,No_of_Downloads";
        $query.=") VALUES (";
        $query.="'{$File_ID}','{$file_name}','{$dir}','{$Subject}','{$Year}','{$Semester}','{$Level}',0";
        $query.=")";

        $result = mysqli_query($connection,$query);
        if($result){
            header('Location:../index.html');
        }
    }
?>