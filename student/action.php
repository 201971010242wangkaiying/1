  <?php
	  //�����ļ���������
	  const HOST='localhost';
      const USER='root';
      const PASS='';
      const DBNAME='gd01';
	  //1.���������ļ�
	  require("../config.php");
	  //2.�������ݿⲢ�ж�
	  $link=mysql_connect(HOST,USER,PASS);
	  if(!$link){
		  die("���ݿ�����ʧ�ܣ�");
	  }
	  //3.ѡ�����ݿⲢ�����ַ���
	  mysql_select_db(DBNAME);
	  mysql_set_charset('utf8');
	  switch($_GET['a'])
	  {
			  case'insert'://��Ӳ���
			  //����add.php������������
			  $name=$_POST['name'];
			  $jidian=$_POST['jidian'];
			  $sex=$_POST['sex'];
			  $classid=$_POST['classid'];
			  //����sql���
			  $sql="insert into student values(null,'{$name}',{$jidian},'{$sex}','{$classid}')";
			  mysql_query($sql);
			  if(mysql_insert_id($link)>0)
			  {
				  echo "success";
			  }
			  else
			  {
				  echo "low";
			  }
			  break;
		  
		  
			  case 'del'://ɾ������
			  //���ղ���id������ֵ
			  $id=$_GET['id'];
			  //����sql��䲢ִ��
			  $sql="delete from student where id={$id}";
			  mysql_query($sql);
			  //�ж�
			  if(mysql_affected_rows($link)>0)
			  {
				  echo "success";
			  }
			  else{
				  echo "low";
			  }
			  break;
		  
			  case 'update'://�޸Ĳ���
			  $id= $_POST['id'];
			  $name=$_POST['name'];
			  $jidian=$_POST['jidian'];
			  $sex=$_POST['sex'];
			  $classid=$_POST['classid'];
			  //����sql�������޸�
			  $sql="update student set name='{$name}',jidian={$jidian},sex='{$sex}',classid='{$classid}' where id={$id}";
			  mysql_query($sql);
			  if(mysql_affected_rows($link)>0)
			  {
				  echo "success";
			  }
			  else
			  {
				  echo "low";
			  }
			  break;
	  }
	  //�ر����ݿ�
	  mysql_close($link);
   ?>