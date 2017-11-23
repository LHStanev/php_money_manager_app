<?php


namespace App\Http;


use Core\DataBinder;
use Database\DatabaseInterface;

class HttpAbstract
{
    protected $binder;
    private $db;
    const PATH      = 'Views/Templates/';
    const EXTENSION = '.php';
    /**
     * HttpAbstract constructor.
     * @param $binder
     * @param $db
     */
    public function __construct(DataBinder $binder, DatabaseInterface $db)
    {
        $this->binder = $binder;
        $this->db = $db;
    }

    public function render(string $viewName, $data = []) {
        require_once self::PATH . $viewName . self::EXTENSION;
    }

    public function redirect(string $location) {
        header("Location: $location" . self::EXTENSION);
        exit();
    }

}