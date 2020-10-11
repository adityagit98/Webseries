
<?php 
  session_start();
    if(!(isset($_SESSION['user_id'])&&isset($_SESSION["password"])))
    {
        header("location:../signin/login.php");
    }
  ?>

<!DOCTYPE html>
<html>
 <link rel="stylesheet" href = "style.css">
<head>
  <title>Uploading File</title>
</head>
<body>
  <form method="POST" enctype="multipart/form-data">


          <div class ="popup">
                <div class ="popup-content">
                    <font size =5><label>upload file</label><br><br></font>
                    <center><p><input type="file" name="file" class ="buttonn" accept ="video/*" required></p></center>
                    <p style="color:red;" id ="up"></p>
                    <p><input type="submit" name="upload" class ="button" value="Upload video"></p>
                    <p><a href = "home.php" class ="button">Home</a>
                    
                </div>
            </div>


   
  </form>
</body>
</html>

<?php

  $variable = $_GET['a'];
  echo ".";
  if(!(isset($variable)))
    {
        header("location:upload_image.php");
    }


    include("dbms.php");
    if(isset($_POST['upload']))
    {
    	$file_name = $_FILES['file']['name'];
    	$file_type =  $_FILES['file']['type'];
    	$file_size = $_FILES['file']['size'];
    	$file_item_loc = $_FILES['file']['tmp_name'];
    	$file_store = "videos/".$file_name;

    	if(move_uploaded_file($file_item_loc, $file_store))
    	{
    		
    		$sql = "INSERT INTO videos(id,name,type) VALUES ('".$variable."','".$file_name."', 'video/mp4')";

           if (isset($variable)  && $db->query($sql) === TRUE) 
           {
                  ?>
                <script>
                   document.getElementById("up").innerHTML = 'Uploaded succesfully ... upload more if any';
                </script>
                <?php
           }  
           else 
           {
                ?>
              <script>
                 document.getElementById("up").innerHTML = 'upload failed...';
              </script>
              <?php
           }

           $db->close();
    	}
    	else
    	{
    	    echo "Something is Error While Uploading The File !";	
    	}


    }
?>

