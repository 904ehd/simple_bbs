<!DOCTYPE unspecified PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php
	session_start();
	require 'conn_BBS.php';
	if (isset($_GET['ID'])) {
		$thread=mysql_query("SELECT * FROM `thread` WHERE ID='".$_GET['ID']."'");  //ע����[]����()
		$re_Thread=mysql_query("SELECT * FROM `re_thread` WHERE reID='".$_GET['ID']."'");
	}
	$row_thread=mysql_fetch_assoc($thread); 
?>
<form method="post" name="reThread" action="addNewRe.php" >
<table align="center">
<tr>
	<td>������</td>
	<td><?php echo $_SESSION['name']?></td>
</tr>
<tr>
	<td>��������</td>
	<td><?php echo $row_thread['title']?></td>
</tr>
<tr>
	<td valign="top">�ظ�����<input type="hidden" value=<?php echo $row_thread['ID'];?> name="ID"></td>
	<td><textarea rows="20" cols="50" name="content"></textarea></td>
</tr>
<tr>
	<td>&nbsp;</td>
	<td><input type="submit" name="reContent" value="ȷ������"></td>
</tr>
</table>
</form>