<?php
	global $con;
	class queryMaster
	{
		function queryMaster() {
		}
		
		function customQuery($query,$prntQry = "No"){
			global $con;
			if($prntQry == "Yes")
				echo($query);
			return mysqli_query($con,$query);
		}
		function getOneRecord($table,$param = "*",$where = "",$extra = "",$prntQry = "No"){
			global $con;
			if($prntQry == "Yes")
				echo("select ".$param." from ".$table." where ".$where." ".$extra);
			return mysqli_query($con,"select ".$param." from ".$table." where ".$where." ".$extra);
		}
		
		function getRecord($table,$param = "*",$where = "",$extra = "",$prntQry = "No"){
			global $con;
			if($where != "") {
				if($prntQry == "Yes")
					echo("select ".$param." from ".$table." where ".$where." ".$extra);
				return mysqli_query($con,"select ".$param." from ".$table." where ".$where." ".$extra);
			} else {
				if($prntQry == "Yes")
					echo("select ".$param." from ".$table." ".$extra);
				return mysqli_query($con,"select ".$param." from ".$table." ".$extra);
			}
		}
		
		function getCountedRecord($table,$param = "*",$where = "",$extra = ""){
			global $con;
			if($where != "")
				return mysqli_num_rows($this->getRecord($table,$param,$where,$extra));
			else
				return mysqli_num_rows($this->getRecord($table,$param,$where,$extra));
		}
		
		function isFoundRecord($table,$param = "*",$where){
			global $con;
			if(mysqli_num_rows(mysqli_query($con,"select ".$param." from ".$table." where ".$where)) > 0)
				return true;
			else
				return false;
		}
		
		function insertRecord($table,$param,$param_val,$prntQry = "No"){
			global $con;
			if($prntQry == "Yes")
				echo("insert into ".$table."(".$param.") values(".$param_val.")");
			mysqli_query($con,"insert into ".$table."(".$param.") values(".$param_val.")");
		}

		function insertRecordReturn($table,$param,$param_val,$prntQry = "No"){
			global $con;
			if($prntQry == "Yes")
				echo("insert into ".$table."(".$param.") values(".$param_val.")");
			mysqli_query($con,"insert into ".$table."(".$param.") values(".$param_val.")");
			return mysqli_insert_id($con);
		}
		
		function updateRecord($table,$set,$where,$prntQry = "No"){
			global $con;
			if($where == "") {
				if($prntQry == "Yes")
					echo("update ".$table." set ".$set);
				mysqli_query($con,"update ".$table." set ".$set);
			}
			else {
				if($prntQry == "Yes")
					echo("update ".$table." set ".$set." where ".$where);
				mysqli_query($con,"update ".$table." set ".$set." where ".$where);
			}
		}
		
		function updateRecordReturn($table,$set,$where,$prntQry = "No"){
			global $con;
			if($where == "") {
				if($prntQry == "Yes")
					echo("update ".$table." set ".$set);
				return mysqli_query($con,"update ".$table." set ".$set);
			}
			else {
				if($prntQry == "Yes")
					echo("update ".$table." set ".$set." where ".$where);
				return mysqli_query($con,"update ".$table." set ".$set." where ".$where);
			}
		}
		
		
		
		function deleteRecord($table,$where = "",$prntQry = "No"){
			global $con;
			if($where == "") {
				if($prntQry == "Yes")
					echo("delete from ".$table);
				mysqli_query($con,"delete from ".$table);
			}
			else {
				if($prntQry == "Yes")
					echo ("delete from ".$table." where ".$where);
				mysqli_query($con,"delete from ".$table." where ".$where);
			}
		}
	}
?>