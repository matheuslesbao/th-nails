<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" href="/assets/css/global.css">
    <link rel="stylesheet" href="/assets/css/header.css">
    <link rel="stylesheet" href="/assets/css/footer.css">
    <title><?=$this->e($title)?></title>
</head>

<body>
     <?=$this->insert('partials/header');?>
     
    <?= $this->section('content') ?>


    <?=$this->insert('partials/footer');?>

    <!-- JS -->
    <script src="/assets/js/menu.js"></script>
    <script src="/assets/js/slideshow.js"></script>
</body>

</html>