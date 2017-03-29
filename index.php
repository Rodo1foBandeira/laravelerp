<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>teste</title>



</head>
<body>

<?php
echo $_SERVER['HTTP_USER_AGENT'].'<br>';

$browser = get_browser();
print_r($browser);
?>

</body>
</html>