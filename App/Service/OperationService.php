<?php
/**
 * Created by PhpStorm.
 * User: Lazar Stanev
 * Date: 11/23/2017
 * Time: 11:39 AM
 */

namespace App\Service;


use App\Data\OperationDTO;
use App\Repository\OperationRepositoryInterface;
use App\Repository\ReasonRepositoryInterface;

class OperationService implements OperationServiceInterface
{
    private $operationRepository;
    private $reasonRepository;
    /**
     * OperationService constructor.
     * @param $repository
     */
    public function __construct(OperationRepositoryInterface $operationRepository, ReasonRepositoryInterface $reasonRepository)
    {
        $this->operationRepository = $operationRepository;
        $this->reasonRepository = $reasonRepository;
    }


    public function showOperations(string $userId): \Generator
    {
       return $this->operationRepository->showAll($userId);

    }


    public function addOperation(OperationDTO $operation): bool
    {
        return $this->operationRepository->insert($operation);
    }

    public function updateOperation(OperationDTO $operation): bool
    {
        return $this->operationRepository->edit($operation);
    }

    public function showAllReasons() :\Generator {
        return $this->reasonRepository->showAll();
    }

    public function findById(string $id): OperationDTO
    {
        return $this->operationRepository->findById($id);
    }

    public function deleteOperation(string $id): bool
    {
        return $this->operationRepository->delete($id);
    }
}