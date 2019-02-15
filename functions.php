<?php

// шаблонизатор
function include_template($name, $data) {
    $name = 'templates/' . $name;
    $result = '';

    if (!is_readable($name)) {
        return $result;
    }

    ob_start();
    extract($data);
    require $name;

    $result = ob_get_clean();

    return $result;
}


// показывать или нет выполненные задачи
$show_complete_tasks = rand(0, 1);


// расчет дедлайна задачи
function num_tasks($tasks_array, $cat_key) {
  $num = 0;
  
  foreach ($tasks_array as $task) {
      if ($task["category_id"] === $cat_key) {
        $num++;
      }
  }
  return $num;
}


// фильтрация опасных спецсимволов - защита от XSS-атак
function esc($str) {
	$text = htmlspecialchars($str);
	//$text = strip_tags($str);

	return $text;
}


 // Разница в датах дедлайн - сейчас
    function time_diff_calc($time_value) {
        if ($time_value !== "Нет") {
          $secs_in_hour = 3600; // секунд в 1 ч
          $cur_date = time(); // этот момент
          $end_date = strtotime($time_value); // конечная метка - дедлайн
          $delta = floor(($end_date - $cur_date) / $secs_in_hour); // разница между датами
          
          return $delta;
        } 
        else {
          return $time_value;
        }
    };

?>