<?php 

require_once('functions.php');
// подключаем при отсутствии базы данных require_once('data.php');

$con = mysqli_connect('localhost', 'root', NULL, 'doingsdone');
mysqli_set_charset($con, 'utf-8');

$categories_sql = 'SELECT * FROM categories';
$categories = mysqli_query($con, $categories_sql);
$tasks_sql = 'SELECT * FROM tasks';
$tasks = mysqli_query($con, $tasks_sql);

$page_content = include_template('index.php', ['tasks' => $tasks,
			'show_complete_tasks' => $show_complete_tasks
			]);
$layout_content = include_template('layout.php', [
			'categories' => $categories,
			'tasks' => $tasks,
			'content' => $page_content,
			'title' => 'Дела в порядке'
			]);

print($layout_content);

?>
