<?php
session_start();
session_destroy();
echo "<script>document.write('Anda telah logout.'); window.location = 'index.php'</script>";
?>