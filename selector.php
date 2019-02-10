<html>
<body>
<form action="">
<input class="awesomplete" name="items" onchange="this.form.submit()"   list = "mylist" placeholder = "Search Items..."/>
<select id = "mylist" name="items">
<option value="Item1">Item1</option>
<option value="Item2">Item2</option>
<option value="Item3">Item3</option>
</select>

<input type="submit" name="items">

</form>
</body>
</html>
<?php  
$items == $_POST['items'];
if ($items == 'Item1') 
{
header("Location: item1.php"); 
}
elseif ($items == 'Item2') {
header("Location: item2.php"); 
}
elseif ($items == 'Item3') {
header("Location: item3.php"); 
}
?>