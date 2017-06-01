<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?? 'SiP'  ?></title>
    <link rel="stylesheet" href="<?php asset('css/app.css') ?>">
</head>
<body>
    <header>
        <?php _include('layouts._navbar'); ?>
    </header>

    <div class="container">
        <section class="section is-paddingless is-message">
            <?php if (message()->has()) _include("notifications.messages"); ?>
        </section>
        <?php _include($bodyName, $data); ?>
    </div>
</body>
</html>