<?php
	$serverName = "ANONYMOUS-PC\SQLEXPRESS"; //ANONYMOUS-PC\SQLEXPRESS server connection

	// Since UID and PWD are not specified in the $connectionInfo array,
	// The connection will be attempted using Windows Authentication.
	
	$connectionInfo = array( "Database"=>"UserInfo_SQL");
	$conn = sqlsrv_connect( $serverName, $connectionInfo);

	if( $conn ) {
	    echo "Connection established.";
	    $sql='SELECT * FROM users';
        $query = sqlsrv_query($conn,$sql);
        //$result = sqlsrv_fetch_array($query);
        
	    echo"<table>";
		echo "<tr>";
		echo "<th>User ID</th>";
		echo "<th>User Name</th>";
		echo "<th>User Type</th>";
		echo "</tr>";
		while( $row = sqlsrv_fetch_array( $query, SQLSRV_FETCH_ASSOC) ) {
			echo "<tr>";
			echo "<td>".$row['user_id']."</td>";
			echo "<td>".$row['user_name']."</td>";
			echo "<td>".$row['user_type']."</td>";
			echo "</tr>";
		}
		echo"</table>";

        // print_r($result);
        // exit;

        	      	
		
	}else{
	    echo "Connection could not be established.<br />";
	    die( print_r( sqlsrv_errors(), true));
	}

?>