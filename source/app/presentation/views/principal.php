
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon"  type="image/x-icon" href="/assets/img/icons8-nails-16.png" type="image/x-icon">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="/assets/css/global.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/partials/header.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/partials/footer.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/<?=$this->e($style)?>.css">
    <title><?=$this->e($title)?></title>

    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
</head>

<body>
     <?=$this->insert('partials/header');?>
     
    <?= $this->section('content') ?>


    <?=$this->insert('partials/footer');?>

    <!-- JS -->
    <script type="text/javascript" src="/assets/js/menu.js"></script>
    <script type="text/javascript" src="/assets/js/slideshow.js"></script>
    <!-- <script type="text/javascript" src="/assets/js/dark-mode.js"></script> -->
</body>

</html>