<?php
$mysqli = new mysqli("localhost","root","","webbanlap");

// Check connection
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
        if(isset($_GET['page_cmt'])) {
            switch($_GET['page_cmt']) {
                case 'danhsach':
                    require_once 'danhsach.php';
                    break;
                case 'xoa':
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