<?php
/**
 * Created by PhpStorm.
 * User: Lazar Stanev
 * Date: 11/23/2017
 * Time: 11:17 AM
 */

namespace App\Repository;


use App\Data\OperationDTO;

interface OperationRepositoryInterface
{
    public function showAll(string $userId) :\Generator;
    public function insert(OperationDTO $operation) :bool;
    public function edit(OperationDTO $operationDTO) : bool;
    public function delete(string $operationId) :bool;
    public function findById(string $id) :OperationDTO;
}