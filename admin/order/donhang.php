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
    <title>Quản lí đơn hàng</title>
</head>
<body>
    <?php
        if(isset($_GET['page_order'])) {
            switch($_GET['page_order']) {
                case 'list':
                    require_once 'danhsach.php';
                    break;
                case 'add':
                    require_once 'sua.php';
                    break;
                case 'remove':
                    require_once 'xoa.php';
                    break;
                default:
                    require_once 'danhsach.php';
                    break;    
            }
        }
        else {
            require_once 'danhsach.php';
        }
    ?>
</body>
</html>