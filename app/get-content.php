<?php
	$con = mysqli_connect('localhost', 'root', 'congvuong', 'wp-smart') or die('Không thể kết nối tới cơ sở dữ liệu');
	if(isset($_POST['table'])&&(!isset($_POST['id'])))
	{
		if($_POST['table']!='')
		{
			$sqli = "SELECT * FROM ".$_POST['table'];
			$query = mysqli_query($con, $sqli);
			echo '<select id="table">';
			echo '<option value="">- Chọn -</option>';
			while($row = mysqli_fetch_array($query,MYSQLI_ASSOC))
			{
			?>
				<option value="<?php echo $row['id'] ?>"><?php echo $row['label']; ?></option>
			<?php
			}
			echo '</select>';
			
		}
	}
	if(isset($_POST['table'])&&(isset($_POST['id'])))
	{
		if($_POST['id']!='')
		{
			$sqli = "SELECT content FROM ".$_POST['table']." WHERE id = ".$_POST['id'];
			$query = mysqli_query($con, $sqli);
			while($row = mysqli_fetch_array($query, MYSQLI_ASSOC))
			{
	?>
			
			<textarea  cols="150" rows="25" placeholder="Here" id="content"><?php echo $row['content'] ?></textarea>
	<?php 
				
			}
		}
		
	}
?>