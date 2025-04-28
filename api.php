<?php
header("Content-type: application/json; charset=utf-8");

// Check if there get parameter
if (isset($_GET['token'])) {
	if ($_GET['token'] == "*******************") {
	
		$servername = "*******************";
		$username = "*******************";
		$password = "*******************";
		$dbname = "*******************";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if (!($conn->connect_error)) {
			
			$sql = "SELECT t.CheckAScore as 'Governance_and_Leadership', t.CheckBScore as 'People_and_Culture', t.CheckCScore as 'Potential_and_Ability', t.CheckDScore as 'Innovation', t.CheckEScore as 'Technology', t.CheckFScore as 'Green_Transition', t.CheckGScore as 'Social_Impact', t.CheckHScore as 'Blue_Economy', t.CheckIScore as 'Just_Transition', t.TotalScore as 'Total_Digital_Maturity_Score', t.Sector as 'Sector', t.Sector_Level1 as 'Subsector', t.Region as 'Region', t.RegionalUnit as 'Regional_Unit' FROM ( SELECT AFM, MAX(DateInsert) as LastTime FROM DMAAnswer GROUP BY AFM ) r INNER JOIN DMAAnswer t ON t.AFM = r.AFM AND t.DateInsert = r.LastTime";

			$result = $conn->query($sql);
			
			if($result->num_rows > 0){
				echo '{"DMA_Data":[';

				$first = true;
				while($row = $result->fetch_assoc()) {
					if($first) {
						$first = false;
					} else {
						echo ',';
					}
					echo json_encode($row, JSON_UNESCAPED_UNICODE);
				}
				echo ']}';
			} else {
				echo '[]';
			}
			
			$conn->close();
		}
	}
}
?>