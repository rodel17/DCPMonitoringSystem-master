
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>	
		<title> </title>
    <link rel="stylesheet" href="Styles/Dcpmanage.css">
	<script src="javascript/sweetalert.js"></script>
	</head>
	<body>
				<script>
						 swal({
                            title: "You cannot access this page!",
								text: "You need to login to access this page, otherwise you cannot enter.",
								icon: "warning",
								closeOnEsc: false,
								closeOnClickOutside: false,
								
								buttons: {
									confirm: {
										text: "Go to login",
										value: true,
										visible: true,
										className: "btn btn-success",
										closeModal: true    
									},
									},
									
								
							})
							.then((confirm) => {
								if (confirm) {
									window.location.href = "index.php";	
								}
							});
							
				 </script>					
		
	</body>
</html>

<?php

	


?>
