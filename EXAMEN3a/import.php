<?php
require_once 'autoloader.php';

$conn = new Lighting;
?>

<html>
<body>
    <?php $data = $conn->importLamps(); ?>
</body>
</html>


