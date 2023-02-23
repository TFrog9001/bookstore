<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tiny.cloud/1/m6lvsjao8ve1aqa2vydo7qp6mq07skyhz6zugf3nu5ssnk6n/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="./css/style_admin.css">
    <link rel="shortcut icon" type="image/png" href="../images/logobook - Sao chép.ico">
    
    <title>Trang quản lý</title>

    <script>
      tinymce.init({
        selector: '.mytextarea'
      });
    </script>

</head>
<body>
    <?php
      session_start();
      include("./config/config.php");
      include("./modules/header.php");
      include("./modules/nav.php");
      include("./modules/main.php");
    ?>
</body>
    <script src="https://code.jquery.com/jquery-3.6.3.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./js/scrip.js"></script>
</html>