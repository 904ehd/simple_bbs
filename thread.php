<?php 
require 'conn_BBS.php';
if (isset($_GET['ID'])) {
	$thread=mysql_query("SELECT * FROM `thread` WHERE ID='".$_GET['ID']."'");  //ע����[]����()
	$re_Thread=mysql_query("SELECT * FROM `re_thread` WHERE reID='".$_GET['ID']."'");
} 
	$row_thread=mysql_fetch_assoc($thread);
	$totalRows_Thread=mysql_num_rows($thread);
	//$row_reThread=mysql_fetch_assoc($re_Thread);
	$totalRows_reThread=mysql_num_rows($re_Thread);
	mysql_query("UPDATE thread SET numHit=numHit+1 WHERE ID='".$_GET['ID']."'",$conn_bbs); //���µ������
?>
<!DOCTYPE unspecified PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<table align="center" width="500">
<tr height="50" bgcolor="#dcdcdcd">
<td colspan="2" align="center"><strong>������</strong></td>
</tr>
  <tr>
    <td bgcolor="#c0c0c0" width="90">���ӱ��⣺</td>
    <td ><?php echo $row_thread['title']?></td>
  </tr>
  <tr>
    <td bgcolor="#c0c0c0" width="90">�������ݣ�</td>
    <td><?php echo $row_thread['content']?></td>
  </tr>
  <tr>
  	<td bgcolor="#c0c0c0" width="90">����ʱ�䣺</td>
  	<td><?php echo $row_thread['time']?></td>
  </tr>	
  <tr>
    <td><a href="reThread.php?ID=<?php echo $row_thread['ID']?>">�ظ�</a></td>
   </tr>
</table>
<?php 
if (mysql_num_rows($re_Thread)!=0) {
	echo "<table align=\"center\" width=\"500\">
			<tr height=\"50\" bgcolor=\"#dcdcdcd\">
				<td colspan=\"2\" align=\"center\"><strong>�ظ�</strong>
				</td>
			</tr>";
}?>
<?php  while ($row_reThread=mysql_fetch_assoc($re_Thread))  { ?>
 <tr>
    <td bgcolor="#c0c0c0" width="90">�������ݣ�</td>
    <td><?php echo $row_reThread['reContent']?></td>
 </tr>
 <tr>
    <td bgcolor="#c0c0c0" width="90">�������ߣ�</td>
    <td ><?php echo $row_reThread['reAuthor']?></td>
 </tr>
 <tr>
  	<td bgcolor="#c0c0c0" width="90">����ʱ�䣺</td>
  	<td><?php echo $row_reThread['reTime']?></td>
 </tr>
<tr>
	<td colspan="2">&nbsp;</td>
</tr>
 <?php } ;	
	if ($row_reThread['reContent']!="")
		echo "</table>";
?>
