<?php

/**
 * Класс Одиночка(Singleton) порождающий паттерн,
 * который гарантирует, что для определенного класса
 * будет создан только один объект
 */

class Singleton {

    private static $instance = null;
    /*
     * При вызове метода, возвращает единственный экземпляр класса
     * из $instance (создается при первом вызове)     *
     */
    public static function getInstance() {
        if (static::$instance === null) {
            static::$instance = new Singleton();
        }

        return static::$instance;
    }

    // не разрешает создавать объект вне класса
    protected function __construct() { }
    // не разрешает клонировать объект
    protected function __clone() { }
    // запрещает восстановить объект
    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize a singleton.");
    }

    /*
     * остальная бизнес логики класса
     */
    public function foo() {
        return 'foo';
    }

}

// проверка
$s1 = Singleton::getInstance();
$s2 = Singleton::getInstance();

if ($s1 === $s2) {
    echo "Одиночка(Singleton) работает, в переменных один и тот же экземпляр";
} else {
    echo "Одиночка(Singleton) класс с ошибкой, в переменных разные экземпляры";
}