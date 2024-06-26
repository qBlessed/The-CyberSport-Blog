<?php

require('connect.php');

session_start();
// Функция для вывода Данных в удобочитаемом формате
if (!function_exists('tt')) {
    function tt($value) {
        echo '<pre>';
        print_r($value);
        echo '</pre>';
    }
}

if (!function_exists('tte')) {
    function tte($value) {
        echo '<pre>';
        print_r($value);
        echo '</pre>';
    }
}



// Функция для выполнения запроса SELECT с возможностью указания условий
if (!function_exists('selectAll')) {
    function selectAll($table, $params = []) {
        global $pdo;
        $sql = "SELECT * FROM $table";
        if (!empty($params)) {
            $i = 0;
            foreach ($params as $key => $value) {
                if (!is_numeric($value)) {
                    $value = "'" . $value . "'";
                }
                if ($i === 0) {
                    $sql .= " WHERE $key = $value";
                } else {
                    $sql .= " AND $key = $value";
                }
                $i++;
            }
        }
        $query = $pdo->prepare($sql);
        $query->execute();
        // Обработка ошибок запроса
        if ($query->errorCode() !== '00000') {
            // Обработка ошибки, например, логирование или вывод сообщения
            $errorInfo = $query->errorInfo();
            echo "Database Error: " . $errorInfo[2];
            // Возможно, вам захочется остановить выполнение скрипта
            // exit();
        }
        return $query->fetchAll();
    }
}

// Функция для выполнения запроса SELECT с выбором одной строки
if (!function_exists('selectOne')) {
    function selectOne($table, $params = []) {
        global $pdo;
        $sql = "SELECT * FROM $table";
        if (!empty($params)) {
            $i = 0;
            foreach ($params as $key => $value) {
                if (!is_numeric($value)) {
                    $value = "'" . $value . "'";
                }
                if ($i === 0) {
                    $sql .= " WHERE $key = $value";
                } else {
                    $sql .= " AND $key = $value";
                }
                $i++;
            }
        }
        $sql .= " LIMIT 1";
        $query = $pdo->prepare($sql);
        $query->execute();
        if ($query->errorCode() !== '00000') {
            $errorInfo = $query->errorInfo();
            echo "Database Error: " . $errorInfo[2];
            // exit();
        }
        return $query->fetch();
    }
}

// Функция для выполнения запроса INSERT
if (!function_exists('insert')) {
    function insert($table, $params) {
        global $pdo;
        $i = 0;
        $coll = '';
        $mask = '';
        foreach ($params as $key => $value) {
            if ($i === 0) {
                $coll .= "$key";
                $mask .= "'" . $value . "'";
            } else {
                $coll .= ", $key";
                $mask .= ",'" . $value . "'";
            }
            $i++;
        }
        $sql = "INSERT INTO $table ($coll) VALUES ($mask)";
        $query = $pdo->prepare($sql);
        $query->execute($params);
        return $pdo->lastInsertId();
    }
}

// Функция для выполнения запроса UPDATE
if (!function_exists('updata')) {
    function updata($table, $id, $params) {
        global $pdo;
        $i = 0;
        $str = '';
        foreach ($params as $key => $value) {
            if ($i === 0) {
                $str .= $key . " = ?";
            } else {
                $str .= ", " . $key . " = ?";
            }
            $i++;
        }
        $sql = "UPDATE $table SET $str WHERE id = ?";
        $query = $pdo->prepare($sql);

        $paramValues = array_values($params);
        $paramValues[] = $id;

        $success = $query->execute($paramValues);
        return $success;
    }
}



// Функция для выполнения запроса DELETE
if (!function_exists('delete')) {
    function delete($table, $id) {
        global $pdo;
        $sql = "DELETE FROM $table WHERE id =".$id;
        $query = $pdo->prepare($sql);
        $query->execute();
    }
}
/// Автори постів

if (!function_exists('selectAllFromPostsWithUsers')) {
    function selectAllFromPostsWithUsers($table1, $table2) {
        global $pdo;
        $sql = "SELECT 
                t1.id,
                t1.title,
                t1.img,
                t1.content,
                t1.status,
                t1.id_topic,
                t1.created_date,
                t2.username
                FROM $table1 AS t1 
                JOIN $table2 AS t2 
                ON t1.id_user = t2.id";
        $query = $pdo->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
}


// Автори на головну
if (!function_exists('selectAllFromPostsWithUsersOnindex')) {
    function selectAllFromPostsWithUsersOnindex($table1, $table2, $limit, $offset) {
        global $pdo;
        $sql = "SELECT p.*, u.username FROM  $table1 AS p JOIN $table2 AS  u ON p.id_user = u.id 
                WHERE p.status=1 
                ORDER BY p.created_date DESC 
                LIMIT $limit OFFSET  $offset";
        $query = $pdo->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
}

//Пошук
if (!function_exists('search')) {
    function search($text, $table1, $table2)
    {
        $text = trim(strip_tags(stripslashes(htmlspecialchars($text))));
        global $pdo;

        // Використання параметризованих запитів для запобігання SQL-ін'єкціям
        $sql = "SELECT p.*, u.username 
                FROM $table1 AS p 
                JOIN $table2 AS u ON p.id_user = u.id 
                WHERE p.status = 1 
                AND (p.title LIKE :text OR p.content LIKE :text)";

        $query = $pdo->prepare($sql);
        $query->bindValue(':text', '%' . $text . '%', PDO::PARAM_STR);

        try {
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Належним чином обробляємо помилку
            error_log('Помилка запиту пошуку: ' . $e->getMessage());
            return [];
        }
    }
}

//single
if (!function_exists('selectPostFromPostsWithUsersOnSingle')) {
    function selectPostFromPostsWithUsersOnSingle($table1, $table2,$id)
    {
        global $pdo;
        $sql = "SELECT p.*, u.username FROM  $table1 AS p JOIN $table2 AS  u ON p.id_user = u.id WHERE p.id=$id";

        $query = $pdo->prepare($sql);
        $query->execute();
        return $query->fetch();

    }
}

//СountRow
if (!function_exists('СountRowe')) {
    function СountRowe($tablel)
    {
        global $pdo;
        $sql = "SELECT COUNT(*) FROM $tablel WHERE `status` = 1";

        $query = $pdo->prepare($sql);
        $query->execute();
        return $query->fetchColumn();
    }
}

if (!function_exists('selectTopFromPosts')) {
    function selectTopFromPosts($table1) {
        global $pdo;
        $sql = "SELECT * FROM $table1 WHERE id_topic = 44";
        $query = $pdo->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
}

?>
