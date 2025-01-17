<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="./css/style.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="shortcut icon" type="image/png" href="./images/logobook - Sao chép.ico">
    <title>Book Store</title>
</head>
<body>  
    <?php
        session_start();
        include("./admincp/config/config.php");
        include("./modules/header.php");
        include("./modules/nav.php");
        include("./modules/main.php");
        include("./modules/footer.php");
    ?>
</body>
    <script src="https://code.jquery.com/jquery-3.6.3.js"></script>
    <script src="./js/scrip.js"></script>
    <?php 
        if(isset($showdn)){
            echo $showdn;
        }
    ?>
</html>