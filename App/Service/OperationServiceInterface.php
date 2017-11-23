<?php
/**
 * Created by PhpStorm.
 * User: Lazar Stanev
 * Date: 11/23/2017
 * Time: 11:36 AM
 */

namespace App\Service;

use App\Data\OperationDTO;

interface OperationServiceInterface
{
    public function showOperations(string $userId) :\Generator;
    public function addOperation(OperationDTO $operation) :bool;
    public function updateOperation(OperationDTO $operation) :bool;
    public function showAllReasons() :\Generator;
    public function findById(string $id) :OperationDTO;
    public function deleteOperation(string $id):bool;
}