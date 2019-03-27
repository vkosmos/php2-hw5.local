<?php
/**
 * @var \App\View $this
 */
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" type="text/css" href="/templates/css/style.css">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Список новостей.</title>
</head>
<body>
    <h1>Список новостей</h1>

    <p><a class="button" href="/admin/">Особо секретная админка</a></p>

    <ul class="news-list">

        <?php foreach($this->news as $item): ?>
            <li class="news-list__item">
                <p class="news-list__text">
                    <b><?=$item->title;?></b>
                </p>
                <p class="news-list__text">
                    Автор: <?= $item->author->name ?? 'редакционная статья'; ?>
                </p>
                <p class="news-list__links">
                    <a class="button" href="/article/?id=<?=$item->id?>">Подробнее</a>
                </p>
            </li>
        <?php endforeach; ?>

    </ul>

</body>
</html>