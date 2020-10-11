<?php 
    session_start();
    if(!(isset($_SESSION['user_id'])&&isset($_SESSION["password"])))
    {
        header("location:../signin/login.php");
    }
    ?>
<html lang="en">
<head>
	
<link rel = "stylesheet" type ="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
    <body style="background:url(hello.jpg);color:white">
    	 <div class="container">
            <div class ="row">
                <div class ="col-lg-12">
                    <form  method="post" enctype="multipart/form-data" >
                        <div class="form-group">
                            <label for = "user" >Name of webseries :</label>
                            <input type="text" name ="t1" id="user"placeholder ="enter name here" class="form-control" required>
                             <label for = "user" >Number of episodes :</label>
                            <input type="text" name ="t2" id="user"placeholder ="enter number of episodes here" class="form-control" required>
                             <label for = "user" >Duration of episodes :</label>
                            <input type="text" name ="t3" id="user"placeholder ="enter duration of episodes in minute" class="form-control" required>
                             <label for = "user" >Rating :</label>
                            <input type="text" name ="t4" id="user"placeholder ="give rating between 1 to 10" class="form-control" required>
                            <label for "user" class ="form-group mt-2" >Select image to upload :</label><br>
        					<input class="btn btn-success " type="file" name="file" accept ="image/*" required>

                
                        </div>
                        <div class ="form-group">
                                <label  >genre :</label>
                                <select class ="form-control" name ="st" >
                                <option value ="drama">drama</option>
                                <option value ="action">action</option>
                                <option value = "thriller">thriller</option>
                                <option value= "comedy">comedy</option>
                                <option value ="horror">horror</option>
                                </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" value="upload"/>
                        </div>
 
 <?php
    include("dbms.php"); 
	if(isset($_POST["submit"])){
        $d=date("Y-m-d");
        $name=$_POST['t1'];
        $episodes=$_POST['t2'];
        $duration=$_POST['t3'];
        $rating=$_POST['t4'];
        $genre=$_POST['st'];
        

        $file_name = $_FILES['file']['name'];
        $file_type =  $_FILES['file']['type'];
        $file_size = $_FILES['file']['size'];
        $file_item_loc = $_FILES['file']['tmp_name'];
        $file_store = "images/".$file_name;

        if(move_uploaded_file($file_item_loc, $file_store))
        {

        
        //Insert image content into database
        $insert = $db->query("INSERT into image (name,episodes,duration,rating,imagei,created,genre) VALUES ('$name','$episodes','$duration','$rating','".$file_name."', '$d','$genre')");

        if($insert){
            $last_id = $db->insert_id;
         
         
        }else{
            echo "File upload failed, please try again.";
           

        } 
         
    }else{
        echo "Please select an image file to upload.";
    }
}
$db -> close();
?>
<script>
    var hm = <?php echo $last_id ?>;
     window.location.assign("upload_video.php?a="+hm);
</script>



                   </form>
                </div>
            </div>
        </div>
    </body>
</html>