<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/flatpickr.min.css">
</head>

<body>

		<main class="content__main">
                <h2 class="content__main-heading">Список задач</h2>

                <form class="search-form" action="index.php" method="post">
                    <input class="search-form__input" type="text" name="" value="" placeholder="Поиск по задачам">

                    <input class="search-form__submit" type="submit" name="" value="Искать">
                </form>

                <div class="tasks-controls">
                    <nav class="tasks-switch">
                        <a href="/" class="tasks-switch__item tasks-switch__item--active">Все задачи</a>
                        <a href="/" class="tasks-switch__item">Повестка дня</a>
                        <a href="/" class="tasks-switch__item">Завтра</a>
                        <a href="/" class="tasks-switch__item">Просроченные</a>
                    </nav>

                    <label class="checkbox">
                        <!--добавить сюда аттрибут "checked", если переменная $show_complete_tasks равна единице-->
                        <input class="checkbox__input visually-hidden show_completed" type="checkbox" <?php if ($show_complete_tasks == 1): ?>checked<?php endif; ?>>
                        <span class="checkbox__text">Показывать выполненные</span>
                    </label>
                </div>

                <table class="tasks">
                    
                    <?php foreach ($tasks as $key => $value): ?>
                    
                    <?php
                    $deadline_time = htmlspecialchars($value["date"]);
                    $time_diff = time_diff_calc($deadline_time);
                    ?>

                    <tr class="tasks__item task <?php if ($value['result']): ?>task--completed<?php endif; ?> <?php if ($time_diff != "Нет" and $time_diff <= 24): ?>task--important<?php endif; ?> ">
                    
                        <td class="task__select">
                            <label class="checkbox task__checkbox">
                                <input class="checkbox__input visually-hidden task__checkbox" type="checkbox" value="1" <?php if ($value['result']): ?>checked<?php endif; ?>>
                                <span class="checkbox__text"><?php echo htmlspecialchars($value['task']); ?></span>
                            </label>
                        </td>

                        <td class="task__file">
                            <a class="download-link" href="#">Home.psd</a>
                        </td>

                        <td class="task__date"><?php echo ($deadline_time); ?></td>
                    </tr>
                    <?php endforeach; ?>
                    
                    
                    
                    <!--показывать следующий тег <tr/>, если переменная $show_complete_tasks равна единице-->
                    <?php if ($show_complete_tasks == 1): ?>
                    <tr class="tasks__item task task--completed">
                        <td class="task__select">
                            <label class="checkbox task__checkbox">
                                <input class="checkbox__input visually-hidden" type="checkbox" checked>
                                <span class="checkbox__text">Записаться на интенсив "Базовый PHP"</span>
                            </label>
                        </td>
                        <td class="task__date">10.10.2019</td>

                        <td class="task__controls">
                        </td>
                    </tr>
                    <?php endif; ?>
                </table>
            </main>


<script src="flatpickr.js"></script>
<script src="script.js"></script>

</body>
</html>