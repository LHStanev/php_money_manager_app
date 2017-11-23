<?php
/**
 * Created by PhpStorm.
 * User: Lazar Stanev
 * Date: 11/23/2017
 * Time: 11:19 AM
 */

namespace App\Repository;


use App\Data\OperationDTO;
use Database\DatabaseInterface;

class OperationRepository implements OperationRepositoryInterface
{

    private $db;


    public function __construct(DatabaseInterface $db)
    {
        $this->db = $db;
    }


    public function showAll(string $userId): \Generator
    {
        return $this->db->prepare(
            "SELECT operations.id as id, for_date AS forDate, type, reasons.name AS reasonId, sum, notes FROM operations
            LEFT JOIN users
              ON operations.user_id = users.id
                LEFT JOIN reasons
                  ON operations.reason_id = reasons.id
                    WHERE user_id = ?"
        )->execute([$userId])->fetch(OperationDTO::class);
    }

    public function insert(OperationDTO $operation): bool
    {
        $this->db->prepare(
            "INSERT INTO operations (type, reason_id, sum, notes, on_date, for_date, user_id)
                  VALUES(?,?,?,?,NOW(),?,?)"
        )->execute([
            $operation->getType(),
            $operation->getReasonId(),
            $operation->getSum(),
            $operation->getNotes(),
            $operation->getForDate(),
            $_SESSION['id']
        ]);
        return true;
    }

    public function edit(OperationDTO $operation): bool
    {
        $this->db->prepare("UPDATE operations
                  SET type = ?, reason_id = ?, sum = ?, notes = ?, for_date = ?
                    WHERE id = ?")
            ->execute([$operation->getType(),
                        $operation->getReasonId(),
                        $operation->getSum(),
                        $operation->getNotes(),
                        $operation->getForDate(),
                        $operation->getId()]);
        return true;
    }

    public function delete(string $operationId): bool
    {
        $this->db->prepare("DELETE FROM operations WHERE id = ?")->execute([$operationId]);
        return true;
    }

    public function findById(string $id): OperationDTO
    {
        return $this->db->prepare("SELECT id, type, reason_id AS reasonId, sum, notes, for_date AS forDate FROM operations
                                        WHERE id = ?")->execute([$id])->fetch(OperationDTO::class)->current();
    }
}