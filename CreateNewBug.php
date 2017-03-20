<div>
<h2>Create a New Bug</h2>
<form name = "createbug" id = "createbug" method = "POST" action = "submitBug.php" enctype="multipart/form-data">
<label for = "title">Bug Title</label><br><br>
<input type = "text" id ="title" name = "title" placeholder = "Title" style="width: 250px;" maxlenghth = "500"><br><br>
<?php
@SESSION_START();
include_once("connect.php");
$q1 = "SELECT * FROM project";
$res1 = mysqli_query($conn, $q1);
echo "Select Software<br><br>";
echo "<select name = 'projname' value = 'Product Name' >";
foreach($res1 as $row)
{
	
	echo "<option value = $row[pid]>$row[pname]</option>";
	
}
echo "</select><br><br>";




?>
<!-- <input id = 'PID' type = 'hidden' name = 'PID' value = ""/>
<script type = "text/javascript">
function setPID(dd)
{
	document.getElementById('PID').value = dd.options[dd.selectedIndex].text;
}
-->
<label for = "description">Description</label><br><br>
<textarea rows="10" cols="50" name="descr" id = "descr" placeholder = "Enter a detailed description of your bug here. Follow standard Bug Reporting Formats."  
required>
</textarea>
<br><br>
<label for ="file">Attach log files/screenshots</label><br><br>
<input type="file" id="file" name="file"><br><br>
<input type='submit' value='Submit Bug Report'>
</form>
</div>
<br><br>
<a href = "userhome.php">Back to home</a>

