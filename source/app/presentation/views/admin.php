
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon"  type="image/x-icon" href="/assets/img/icons8-nails-16.png" type="image/x-icon">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="/assets/css/global.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/<?=$this->e($style)?>.css">
    <title><?=$this->e($title)?></title>

    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
</head>

<body>
    <?= $this->section('content') ?>
    <!-- JS -->
    <script src="/assets/js/admin/script.js"></script>
</body>

</html>