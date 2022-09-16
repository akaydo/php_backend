<html lang="en">
<head>
    <title>Consoler page</title>
    <link rel="stylesheet" href="style.css" type="text/css"/>
</head>
<body>
<?php
echo "Введите команду:";
echo '<form><input name="cmd" /></form>';
if(isset($_GET['cmd']))
    if ($_GET['cmd']=='ls' || $_GET['cmd']=='ps' || $_GET['cmd']=='whoami' || $_GET['cmd']=='id' ) system($_GET['cmd']);
    else echo "Запрещенная команда!"
?>
</body>
</html>