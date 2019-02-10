

<?php
   $db = mysqli_connect("localhost","gen-005","x0ER2a(4]n5V","quest"); 

   $sql = "SELECT * FROM `images` WHERE id=1";
   $mq = mysql_query($sql) or die ("not working query");
   $row = mysql_fetch_array($mq) or die("line 44 not working");
   $s=$row['images'];
   echo $row['images'];

   echo '<img src="'.$s.'" alt="HTML5 Icon" style="width:128px;height:128px">';
   ?>
