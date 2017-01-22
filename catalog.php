<html>
<head>
<?php 
//grab dB connection from petCon
include_once 'petCon.php';
	
?> 
</head> 
<body>

<div id="main">

<div id="header">

<h1>Welcome To PetConnect!</h2>

</div>

<div id="contentPrimary">

<p>Please make your selections below to search our inventory<br />
*Note that clicking the submit button will bring up all items currently in our database.
</p>

<form action"catalog.php" method="post">
<input name='itemNum' value="Item Number">
<select name='itemType'>
<option value='Item Type'>Item Type</option>
<?php
//Grab item type values from db and populate dropdown
	$itemTypeSql = "SELECT DISTINCT itemType FROM inventory ORDER BY itemType ASC";
	$result= mysqli_query($petConnect,$itemTypeSql);
	while($row = mysqli_fetch_array($result))
	{
	$itemType = $row['itemType'];
	echo "<option value='" . $itemType . "'/>" . $itemType . "</option>";	
	}
	
?>
</select>
<select name='petType'>
<option value='Pet Type'>Pet Type</option>
<?php
//grab pet type values and populate drop down
	$petTypeSql = "SELECT DISTINCT petType FROM inventory ORDER BY petType ASC";
	$result= mysqli_query($petConnect,$petTypeSql);
	while($row = mysqli_fetch_array($result))
	{
	$petType = $row['petType'];
	echo "<option value='" . $petType . "'/>" . $petType . "</option>";	
	}
	
?>
</select>
<select name='accType'>
<option value='Accessory Type'>Accessory Type</option>
<?php
//grab accessory type values and populate drop down
	$accTypeSql = "SELECT DISTINCT accType FROM inventory ORDER BY accType ASC";
	$result= mysqli_query($petConnect,$accTypeSql);
	while($row = mysqli_fetch_array($result))
	{
	$accType = $row['accType'];
	echo "<option value='" . $accType . "'/>" . $accType . "</option>";	
	}
	
?>
</select>
<select name='petSubType'>
<option value='Breed'>Breed</option>
<?php
//grab breed values populate drop down
	$petSubTypeSql = "SELECT DISTINCT petSubType FROM inventory ORDER BY petSubType ASC";
	$result= mysqli_query($petConnect,$petSubTypeSql);
	while($row = mysqli_fetch_array($result))
	{
	$petSubType = $row['petSubType'];
	echo "<option value='" . $petSubType . "'/>" . $petSubType . "</option>";	
	}
	
?>
</select>
<select name='color'>
<option value='Color'>Color</option>
<?php
//grab color values populate drop down
	$colorSql = "SELECT DISTINCT color FROM inventory ORDER BY color ASC";
	$result= mysqli_query($petConnect,$colorSql);
	while($row = mysqli_fetch_array($result))
	{
	$color = $row['color'];
	echo "<option value='" . $color . "'/>" . $color . "</option>";	
	}
	
?>
</select>
<input name='age' value="Age">
<input type="submit" name="submit">
</form>

<table id="searchResults">
<thead>
	<tr>
		<th>Item Number</th>
		<th>Item Type</th>
		<th>Pet Type</th>
		<th>Accessory Type</th>
		<th>Breed</th>
		<th>Color</th>
		<th>Age</th>
		<th>Anticipated Life-Span</th>
		<th>Quantity</th>
		<th>Price</th>
	</tr>
</thead>
<?php
if(isset($_POST['submit'])){
//Define Postback values for SQL Statment 
$itemNum = $_POST['itemNum'];
$itemType = $_POST['itemType'];
$petType = $_POST['petType'];
$accType = $_POST['accType'];
$petSubType = $_POST['petSubType']; 
$color = $_POST['color'];
$age = $_POST['age'];
//$price = $_POST['price']; - not using as a search variable still avail for parsing later
//$quantity = $_POST['quantity']; - not using as a search variable still avail for parsing later

//Verify What Values were searched for - For End User
echo "You Searched By:<br />";
if ($itemNum !== 'Item Number'){ echo $itemNum . "<br />";}
if ($itemType !== 'Item Type'){echo $itemType . "<br />";}
if ($petType !== 'Pet Type'){echo $petType . "<br />";}
if ($accType !== 'Accessory Type'){echo $accType . "<br />";}
if ($petSubType !== 'Breed'){echo $petSubType . "<br />";}
if ($color !== 'Color'){echo $color . "<br />";}
if ($age !== 'Age'){echo $age . "<br />";}

//SQL Statement Definition - Run SQL and Store Result
$sql = 'SELECT * FROM inventory WHERE 1=1'; 
//Define Array to add AND statements - filter out defaults
$where = array();
if ($itemNum !== 'Item Number') $where[] = ' AND itemNum LIKE "%'.$itemNum.'%"';
if ($itemType !== 'Item Type') $where[] = ' AND itemType LIKE "%'.$itemType.'%"';  
if ($petType !== 'Pet Type') $where[] = ' AND petType LIKE "%'.$petType.'%"';
if ($petSubType !== 'Breed') $where[] = ' AND petSubType LIKE "%'.$petSubType.'%"';
if ($accType !== 'Accessory Type') $where[] = ' AND accType LIKE "%'.$accType.'%"';
if ($color !== 'Color') $where[] = ' AND color LIKE "%'.$color.'%"';
if ($age !== 'Age') $where[] = ' AND age LIKE "%'.$age.'%"';
if (count($where) > 0) { 
 $sql .= implode($where);
}

//store result of sql query from where array and populate results
$result = mysqli_query($petConnect,$sql);
while($row = mysqli_fetch_array($result))
  {
	$itemType = $row['itemType'];
	$petType = $row['petType'];	
	$accType = $row['accType'];
	$petSubType = $row['petSubType'];
	$color = $row['color'];
	$lifeSpan = $row['lifeSpan'];
	$age = $row['age'];
	$price = $row['price'];
	$quantity = $row['quantity'];
	$itemNum = $row['itemNum'];

//Display Non Price Adjusted Inventory Items 
if ($age / $lifeSpan < .5 || $age / $lifeSpan >= 1){    
echo "<tr>" . "<td>" . $itemNum . "</td><td>" . $itemType . "</td><td>" . $petType . "</td><td>" . $accType . "</td><td>" . $petSubType . "</td><td>" . $color .  "</td><td>" . $age . "</td><td>" . $lifeSpan . "</td><td>" . $quantity . "</td><td>" . $price . "</td>" . "</tr>";    
}
//Check if Inventory Item Age is > 50% - apply discount if this is true - item marked in red. 
if ($age / $lifeSpan > .5 && $age / $lifeSpan < 1){
$priceNew = $price * .5;
settype($priceNew, "float"); //set new price to int     
echo "<tr>" . "<td>" . $itemNum . "</td><td>" . $itemType . "</td><td>" . $petType . "</td><td>" . $accType . "</td><td>" . $petSubType . "</td><td>" . $color .  "</td><td>" . $age . "</td><td>" . $lifeSpan . "</td><td>" . $quantity . "</td><td ><span style=\"color:red\">" . number_format($priceNew, 2) . "</span></td>" . "</tr>";    
}
  }
}
?>
</table>

<p>Prices in 'Red' indicate a reduction in price due to age of animal</p>

</body>
 

</html>

