<?php
	session_start();
	if(!isset($_SESSION["adid"]))
	{
		exit;
	}
	$errors=array();
	
	if(empty($_FILES["com"]["name"]))
		$errors[] = "file was empty";
	if($_FILES["com"]["error"] != 0)
		$errors[] = "Error uploading file. Try again";
	$ext = strtolower(substr($_FILES["com"]["name"],-4));
	if($ext != ".xls")
		$errors[] = "provide XLS file.";
		
	if(!empty($errors))
		{
			echo"Error(s)<br/>";
			foreach($errors as $e)
			{
				echo $e."<br/>";
			}
			exit;
		}
		require_once("classes/dbo.class.php");
		require_once 'classes/excel_reader.class.php';
		
		$data=new Spreadsheet_Excel_Reader();
		$data->setOutputEncoding('CP1251');
		$data->read($_FILES["com"]["tmp_name"]);
		
		if($data->sheets[0]['numRows'])
		{
			$q="insert into companies(cmp_nm)values";
			for($i=1;$i <= $data->sheets[0]['numRows'];$i++)
			{
				$nm=$data->sheets[0]['cells'][$i][1];
				$q .= "('".$nm."'),";
			}
			$db->dml(rtrim($q,","));
		}
		header("location:companies.php");
		exit;
?>