<html>
<body>
	<form method="post" action="?">
	<select name="dropdown">
	<option value="Jehzeel1">Jehzeel1</option>
	<option value="Jehzeel2">Jehzeel2</option>
	<option value="Jehzeel3">Jehzeel3</option>
	</select>
	<input type="submit" value="submit">
	</form>
</body>
</html>



<?php
switch ($_POST['dropdown'])  { 

case "Jehzeel1":
 echo "Jehzeel likes apples";
break;

case "Jehzeel2":
 echo "Jehzeel likes bananas";
break;

case "Jehzeel3":
 echo "Jehzeel likes oranges";
break;

default:
  echo "Input did not match with any case";

  }
?>