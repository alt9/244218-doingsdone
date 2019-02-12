INSERT INTO categories (name, user_id) 
VALUES 
("Входящие", 2), ("Учеба", 1), ("Работа", 1), ("Домашние дела", 1), ("Авто", 2);


INSERT INTO tasks (create_date, decided_date, result, name, file, deadline_date, category_id, user_id) 
VALUES
("2019-01-12", "2019-12-01", "0", "Собеседование в IT компании", "tasks/Home.psd", "2019-11-21 00:00:00", 3, 1),
("2019-01-12", "2019-12-25", "0", "Выполнить тестовое задание", "tasks/Home.psd", "2019-12-23 00:00:00", 3, 1),
("2019-01-12", "2019-12-21", "1", "Сделать задание первого раздела", "tasks/Home.psd", "2019-12-19 00:00:00", 2, 1),
("2019-01-12", "2019-12-22", "0", "Встреча с другом", "tasks/Home.psd", "2019-12-22 00:00:00", 5, 2),
("2019-01-12", "2019-12-22", "0", "Купить корм для кота", "tasks/Home.psd", NULL, 4, 1),
("2019-01-12", "2019-12-22", "0", "Заказать пиццу", "tasks/Home.psd", NULL, 1, 2);

INSERT INTO users (reg_date, username, email, password)
VALUES 
("2019-01-12", "Константин", "kostik12@list.ru", "kostik12"),
("2019-02-01", "noname", "no121212@mail.ru", "no121212");

--Получить список из всех проектов для одного пользователя
SELECT name FROM categories
WHERE user_id = "1";

--Получить список из всех задач для одного проекта
SELECT name FROM tasks
WHERE category_id = "1";

--Пометить задачу как выполненную
UPDATE tasks SET result = "1"
WHERE name = "Собеседование в IT компании";

--Обновить название задачи по её идентификатору
UPDATE tasks SET name = "Заказать двойную пиццу"
WHERE id = 6;
