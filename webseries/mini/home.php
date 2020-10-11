
<?php 
	session_start();
    if(!(isset($_SESSION['user_id'])&&isset($_SESSION["password"])))
    {
        header("location:../signin/login.php");
    }
	?>
<html>
    <link rel="stylesheet" href = "home.css">
    <title>
        javascript popup
    </title>
    <head> </head>
        <body style="background:url(hello.jpg);">
            <header id = "none">
                <nav>
                    <a href ="#HOME">
                        <img src="user.png" alt ="logo" class="im">
                        <a href="../signin/logout.php"><img src= "logout.jpg" ></a>
                        <br>
                    </a>
                    <div class ="menu">
                        <ul>
                            <li >
                            	
								
                                <a href ="#action" style="color: white;">ACTION</a>
                                <a href ="#drama"style="color: white;">DRAMA</a>
                                <a href ="#thriller"style="color: white;">THRILLER</a>
                                <a href ="#comedy"style="color: white;">COMEDY</a>
                                <a href ="#horror"style="color: white;">HORROR</a>
                                <a href="upload_image.php" class="ht"style="color: white;">UPLOAD</a>
                                
                                
                            </li>
                        </ul>
                    </div>

                </nav>
            </header>
            <br><br><br>
            <h3 id ="action">ACTION</h3><br><br>
        </body>
        </html>





<script>
	var im = "<?php echo   $_SESSION["type"] ; ?>";
	var hidei=document.getElementsByClassName("ht");
	
	if(im == "user")
	{

		hidei[0].style.display="none";

	}
	</script>

	<?php
include("dbms.php");
// Check connection
$vid_url = "images/";


$sql = "SELECT * FROM image where genre='action'";
$result = $db->query($sql);

if ($result->num_rows > 0) 
{
    // output data of each row
    while($row = $result->fetch_assoc())
    {
        $image = $vid_url.$row["imagei"];
        $id = $row["id"];
       
    ?>
    <img src="<?php echo $image; ?>" name = "<?php echo $id; ?>" class="helo" style="width:180px;height:240px;margin-left: 3%;" onClick="image(this)" >
    <?php

    }
}
echo '<br><br><h3 id ="drama">DRAMA</h3><br><br>';
$sql1 = "SELECT * FROM image where genre='drama'";
$result1 = $db->query($sql1);

if ($result1->num_rows > 0) 
{
    // output data of each row
    while($row = $result1->fetch_assoc())
    {
        $image = $vid_url.$row["imagei"];
        $id = $row["id"];
       
    ?>
    <img src="<?php echo $image; ?>" name = "<?php echo $id; ?>" class="helo" style="width:180px;height:240px;margin-left: 3%;" onClick="image(this)" >
    <?php

    }
}

echo '<br><br><h3 id ="thriller">THRILLER</h3><br><br>';
$sql2 = "SELECT * FROM image where genre='thriller'";
$result2 = $db->query($sql2);

if ($result2->num_rows > 0) 
{
    // output data of each row
    while($row = $result2->fetch_assoc())
    {
        $image = $vid_url.$row["imagei"];
        $id = $row["id"];
       
    ?>
    <img src="<?php echo $image; ?>" name = "<?php echo $id; ?>" class="helo"  style="width:180px;height:240px;margin-left: 3%;" onClick="image(this)" >
    <?php

    }
}

echo '<br><br><h3 id ="comedy">COMEDY</h3><br><br>';
$sql3 = "SELECT * FROM image where genre='comedy'";
$result3 = $db->query($sql3);

if ($result3->num_rows > 0) 
{
    // output data of each row
    while($row = $result3->fetch_assoc())
    {
        $image = $vid_url.$row["imagei"];
        $id = $row["id"];
       
    ?>
    <img src="<?php echo $image; ?>" name = "<?php echo $id; ?>" class="helo" style="width:180px;height:240px;margin-left: 3%;" onClick="image(this)" >
    <?php

    }
}

echo '<br><br><h3 id ="horror">HORROR</h3><br><br>';
$sql4 = "SELECT * FROM image where genre='horror'";
$result4 = $db->query($sql4);

if ($result4->num_rows > 0) 
{
    // output data of each row
    while($row = $result4->fetch_assoc())
    {
        $image = $vid_url.$row["imagei"];
        $id = $row["id"];
       
    ?>
    <img src="<?php echo $image; ?>" name = "<?php echo $id; ?>" class="helo" style="width:180px;height:240px;margin-left: 3%;" onClick="image(this)" >
    <?php

    }
}


$db->close();
?>
<script>
    function image(cla)
            {
                var res = cla.name;
                window.location.assign("show_video.php?a="+res);
            }
</script>