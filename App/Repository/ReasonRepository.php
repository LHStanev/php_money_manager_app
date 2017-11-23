<?php
/**
 * Created by PhpStorm.
 * User: Lazar Stanev
 * Date: 11/23/2017
 * Time: 9:50 PM
 */

namespace App\Repository;


use App\Data\ReasonDTO;
use Database\DatabaseInterface;

class ReasonRepository implements ReasonRepositoryInterface
{
    private $db;

    public function __construct(DatabaseInterface $db)
    {
        $this->db = $db;
    }


    public function showAll(): \Generator
    {
        return $this->db->prepare("SELECT id, name FROM reasons")
                ->execute()->fetch(ReasonDTO::class);
    }
}