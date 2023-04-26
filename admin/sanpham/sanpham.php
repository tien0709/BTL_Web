<?php
$mysqli = new mysqli("localhost","root","","webbanlap");
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if(isset($_GET['page_layout'])) {
            switch($_GET['page_layout']) {
                case 'list':
                    require_once 'list.php';
                    break;
                case 'add':
                    require_once 'add.php';
                    break;
                case 'remove':
                    require_once 'remove.php';
                    break;
                case 'edit':
                    require_once 'edit.php';
                    break;
                default:
                    require_once 'list.php';
                    break;    
            }
        }
        else {
            require_once 'list.php';
        }
    ?>
</body>
</html>