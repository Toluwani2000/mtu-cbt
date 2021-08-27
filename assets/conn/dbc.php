<?php 
	if(strtolower($server) == "mtu_e_cbt"){
		function runSQL($sql){
			$username = "";
			$password = "";
			$database = "";
			$server = "localhost";
			$con = mysqli_connect($server, $username, $password, $database);
			$result = mysqli_query($con,$sql);
			mysqli_close($con);
			return $result;
		}
	}else{
		function runSQL($sql){
			$username = "root";
			$password = "";
			$database = "mtu_e_cbt";
			$server = "localhost";
			$con = mysqli_connect($server, $username, $password, $database);
			$result = mysqli_query($con,$sql);
			mysqli_close($con);
			return $result;
		}
	}
?>