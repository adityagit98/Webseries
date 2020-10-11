<?php 
  $variable = $_GET['a'];//getting id value by previous html page's webseries image
  //echo $variable;

   include("dbms.php");
?>
<?php 
  session_start();
    if(!(isset($_SESSION['user_id'])&&isset($_SESSION["password"])))
    {
        header("location:../signin/login.php");
    }
  ?>




<!DOCTYPE html>
<html>
<head>
  <style >
    * {
  box-sizing: border-box;
  color:white; 
   }

    nav {
  float: left;
  width: 50%;

  height: 350px; /* only for demonstration, should be removed */
  box-shadow:0 12px 15px 0 rgba(0,0,0,.24),0 17px 50px 0 rgba(0,0,0,.19);
  padding: 20px;
    }
    article {
  float: left;
  padding: 20px;
  width: 50%;

  background-image: linear-gradient(120deg,#f700e2,#18e05b); 

  box-shadow:0 12px 15px 0 rgba(0,0,0,.24),0 17px 50px 0 rgba(0,0,0,.19);
  height: 350px; /* only for demonstration, should be removed */
   }

    .episodes {
  float: left;
  padding: 20px;
  width: 60%;
  background-color:#e6f2ff;
  height: 200px; /* only for demonstration, should be removed */
   }


  </style>
</head>
<body style="background:url(hello.jpg);">





<!-- Poster-->


<section>
  <nav>
    <ul>
      <?php
      $img_url = "images/";
      $sql = "SELECT * FROM image where id = '$variable'";
      $result = $db->query($sql);

      if ($result->num_rows > 0) 
      {
      // output data of each row
        if($row = $result->fetch_assoc())
        {
          $image = $img_url.$row["imagei"];
          $ab=$row["name"];
          $nm = $row["episodes"];
          $rat = $row["rating"];
          $quality = $row["duration"];
          $des = $row["created"];
          $ty = $row["genre"];

          ?>
          <img width="420" height="300" style="box-shadow:0 12px 15px 0 rgba(0,0,0,.24),0 17px 50px 0 rgba(0,0,0,.19);height: 300px; width: 450px;" src="<?php echo $image; ?>" name="<?php echo $nm; ?>"><br>
          <?php
        }
      }
      ?>
    </ul>
  </nav>
  <article>
    <h1 style="font-size: 40px;"><?php echo $ab ?></h1>
    <p>IMDB Rating : <?php echo $rat?> / 10</p>
    <p>Quality : <?php echo "HD"?></p>
    <p>Episodes :<?php echo $nm." "?>episodes</p>
    <p>Genre : <?php echo $ty?></p>
    <p>Duration :<?php echo $quality; ?>min</p>
    <p>release date : <?php echo $des;?></p>
  </article>
</section>

<br><br>



<center><h1 style="color:white; margin-top: 30%;">Episodes</h1></center>



<?php

    $vid_url = "videos/";

    $sql = "SELECT * FROM videos where id = $variable";
$result = $db->query($sql);

if ($result->num_rows > 0) 
{
    // output data of each row
    while($row = $result->fetch_assoc())
    {
        $video = $vid_url.$row["name"];
        $type = $row["type"];
    ?>
    <center><video style="height:371px;width:650px;box-shadow:0 12px 15px 0 rgba(0,0,0,.24),0 17px 50px 0 rgba(0,0,0,.19); margin-bottom: 3%;" controls controlsList="nodownload">
        <source src="<?php echo $video; ?>" type="<?php echo $type; ?>">
        Your browser does not support the video tag.
    </video><br><?php
  }
}

?>

</body>
</html>