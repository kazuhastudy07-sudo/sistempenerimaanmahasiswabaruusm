
<?php
session_start();
session_unset();
session_destroy();
?>
<script type="text/javascript">
	setTimeout(
		function(){
			window.location = "./"
		},
        0); // waktu tunggu atau delay
    </script>