<!DOCTYPE unspecified PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php
	session_start();
	if ($_SESSION['name']=="") {
		echo "<script>alert('�Ҵҹ��ͣ����ܷ��������¼');history.back();</script>";
		exit;
	}
?>
<?php require 'sql_thread.php';?>
<html>
<body><h2 align="center">������</h2>
<form action="addNewThread.php" method="post">
<table align="center">
<tr>
	<td>�����ˣ�</td>
	<td><strong><?php echo $_SESSION['name']?></strong></td>
</tr>
<tr>
	<td>�������⣺</td>
	<td><input type="text" name="title"></td>
</tr>	
<tr>
	<td valign="top">�������ݣ�<input type="hidden" value=<?php echo $row_thread['ID']+1;?> name="ID"></td>
	<td><textarea rows="20" cols="50" name="content"></textarea></td>	
</tr>
<tr>
	<td>&nbsp;</td>
	<td><input type="submit" name="send" value="ȷ�Ϸ���" ></td>
</table>
</form>
</body>
</html>
