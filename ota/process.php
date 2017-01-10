<?php
try {
    $apiNm = "001";
    if($_GET["p"] == "send") {     
		$result = EOTA_NetClientCall($apiNm, $_POST["JSONData"]);
		if( strlen($result) == 0)
			throw new Exception("error");
		else
			echo $result;
    }

} catch (Exception $e) {
    echo "error111";
}
?>