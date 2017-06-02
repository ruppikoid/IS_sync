<?php

    // Класс для простой работы с базой данных MySQL
    class Database {

        // переменная для хранения соединения MySQLi
        private $connection;
        // временная переменная для хранения настроек соединения
        private $config;

        // функция создания нового объекта БД
        public function __construct() {
            // загрузка файла конфигурации
            $this->load_config();

            // создание нового подключения с параметрами
            $this->connection = new mysqli(
                $this->config['host'],
                $this->config['user'],
                $this->config['password'],
                $this->config['db_name']
            );

            // установка кодировки данных в UTF8
            $this->connection->query('set names utf8');
        }

        // функция уничтожения объекта БД
        public function __destruct() {
            // закрытие соединения с БД
            $this->connection->close();
        }

        // функция загрузки конфигурационного файла
        private function load_config() {
            // чтение всего файла во временное хранилище
            $configuration = include("core/config.php");
            // получение части настроек массива БД
            $this->config = $configuration['database'];
        }

        // функция получения одной записи из БД по SQL запросу
        public function get_one($sql) {
            // вызов запроса в БД
            $result = $this->query($sql);
            // возврат преобразованного ассоциативного массива
            return $result->fetch_assoc();
        }

        // функция получения всех записей из БД по SQL запросу
        public function get_all($sql) {
            // вызов запроса в БД
            $result = $this->query($sql);
            // создание пустого массива для результатов
            $items = [];

            // циклическое добавление всех строк результата в созданный массив
            while ($row = $result->fetch_assoc()) {
                array_push($items, $row);
            }

            // возврат массива результатов
            return $items;
        }

        // функция запроса в БД
        public function query($sql) {
            // вызов локальной функции соединения для выполнения запроса
            $query = $this->connection->query($sql);
            // вернуть результат выполнения запроса в БД
            return $query;
        }

        // функция получения ID последней добавленной записи
        public function lastInsertID() {
            return $this->connection->insert_id;
        }

    }

    // создание нового объекта базы данных 
    // для обращения из любого места приложения
    $database = new Database();

?>
