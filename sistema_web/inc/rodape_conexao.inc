<?php
	$query = mysqli_query($con, $SQL);
	if($query){
		echo '<a class=" transf btn btn-primary transf_3 " href="index.php" role="button">Voltar para página inicial</a></center>';
	} else {
		echo mysqli_error($con);
	}

	mysqli_close($con);
?>