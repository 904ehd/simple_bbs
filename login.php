<?php
session_start();
class log_in{
	private $name;
	private $password;
	
	public function __construct($name, $password)
	{
		$this->name=$name;
		$this->password=$password;
	}
	
	public function login()
	{
		include_once 'conn_BBS.php';
		$sql=mysql_query("SELECT name FROM user WHERE name='"
				.$this->name."' AND pwd='".$this->password."'",$conn_bbs);
		$info=mysql_fetch_array($sql);
		if ($info==false) {
			echo "<script>alert('��¼ʧ�ܣ������µ�¼');history.back();</script>";
			exit;			
		}
		else {
			$_SESSION["name"]=$this->name;
			//$_SESSION["pwd"]=$this->password;
			mysql_query("UPDATE user SET logintimes=logintimes+1,lastlogintime='".date("Y-m-d H:i:s")."'",$conn_bbs);
			echo "��ϲ����¼�ɹ���<br/>";
			echo "<meta http-equiv=\"Refresh\" content=\"2;url=index.php\">��ת����ҳ�����Ե�...";
		}
	}
}

$obj = new log_in($_POST["name"],$_POST["password"]);
$obj->login();
?>