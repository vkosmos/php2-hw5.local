<?php
/**
 * @var \App\View $this
 */
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="/templates/css/style.css">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Добавление новости</title>
</head>
<body>

<h1>Админка. Добавление новости</h1>

<p><a class="button" href="/admin/">На главную админки</a></p>

<form class="form" action="/admin/add" method="post">
    <p>
        <label>
            Название новости<br>
            <input class="form__input" type="text" name="title" placeholder="Название" value="">
        </label>
    </p>
    <p>
        <label>
            Текст новости<br>
            <textarea class="form__textarea" name="content" cols="40" rows="5" placeholder="Текст"></textarea>
        </label>
    </p>
    <p>
        <label>
            Автор<br>

            <select name="author">
                <option value="0">Редакционная статья</option>

                <?php foreach($this->authors as $author): ?>
                <option value="<?=$author->id;?>"><?=$author->name;?></option>
                <?php endforeach; ?>

            </select>

        </label>
    </p>

    <button class="button" type="submit">Добавить</button>

</form>



</body>
</html>