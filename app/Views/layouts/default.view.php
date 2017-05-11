<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?? 'SisProd'  ?></title>
    <link rel="stylesheet" href="<?= asset('css/app.css') ?>">
</head>
<body>
    <header>
        <?php _include('layouts._navbar'); ?>
    </header>
    <div class="container is-fluid">
        <div class="columns">
            <div class="column is-2">
                <?php _include('layouts._horizontal-menu'); ?>
            </div>

            <div class="column">
                <?php _include($body); ?>
            </div>
        </div>
    </div>

</body>
</html>