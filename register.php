<?php
session_start();
class register{
	private $name;
	private $password1;
	private $password2;
	private $email;
	
	public function __construct($name,$password1,$password2,$email){
		$this->name=$name;
		$this->password1=$password1;
		$this->password2=$password2;
		$this->email=$email;
	}
	
	public function reg(){
		include_once 'conn_BBS.php';
		$sql = "SELECT name FROM user WHERE name='".$this->name."'";
		$flag = mysql_num_rows(mysql_query($sql, $conn_bbs));
		if ($flag != 0) {
			echo "<script>alert('���û��ǳ��ѱ�ռ��');history.back();</script>";
			exit;
		}
		if ($this->password1!= $this->password2){
			echo "<script>alert('��֤���벻һ��');history.back();</script>";
			return;
		}
		if (preg_match("/^[a-z]([a-z0-9]*[-_\.]?[a-z0-9]+)*@
		([a-z0-9]*[-_]?[a-z0-9]+)+[\.][a-z]{2,3}([\.][a-z]{2})?/i;",$this->email)){
             echo "<script>alert('�����ʽ����ȷ');history.back();</script>";
             exit;
       } 
		$flag = mysql_query("INSERT INTO `user`(name,pwd,email,logintimes,regtime,lastlogintime)
		 		values('".$this->name."','".$this->password1."','".$this->email."','1',
				'".date("Y-m-j H:i:s")."','".date("Y-m-j H:i:s")."')",$conn_bbs);
		if ($flag){
			$_SESSION["name"]=$this->name;
			$_SESSION["password"]=$this->password1;
			echo "<script>alert('�û�ע��ɹ�!');
			window.location.href='index.php';</script>";
		} else {
			echo "<script>alert('�û�ע��ʧ��!');
			history.back();</script>";
		}
	}
}

//������ڴ��ݺ���ʱֻ������password1��û�д���password2�����ҹ��캯������Ҳû����ȷ����
$obj=new register($_POST["name"], $_POST["password1"], $_POST['password2'],$_POST["email"]); 
$obj->reg();
?>