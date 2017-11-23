<?php
/**
 * Created by PhpStorm.
 * User: Lazar Stanev
 * Date: 11/23/2017
 * Time: 11:42 AM
 */

namespace App\Http;


use App\Data\OperationDTO;
use App\Service\OperationServiceInterface;

class HttpOperationHandler extends HttpAbstract
{

    public function showOperations(OperationServiceInterface $service) {
        if (isset($_POST['logout'])) {
            session_destroy();
            $this->redirect('login');
        }

        $userId = $_SESSION['id'];
        $operations = $service->showOperations($userId);
        $this->render('Operations',$operations);
    }

    public function addOperation(OperationServiceInterface $service) {
        $_SESSION['error'] = null;
        $_SESSION['success'] = null;

        if( isset($_POST['type']) &&
            isset($_POST['reason_id']) &&
            isset($_POST['sum']) &&
            isset($_POST['notes']) &&
            isset($_POST['forDate']) &&
            isset($_POST['add'])) {

            $operation = $this->binder->bind(OperationDTO::class, $_POST);

            try{
                $service->addOperation($operation);
                $this->redirect('operations');
            } catch (\Exception $e) {
                $_SESSION['error'] = $e->getMessage();
                $this->render('AddOperation');
            }
        }
        $reasons = $service->showAllReasons();

        $this->render('AddOperation', $reasons);
    }

    public function editOperation(OperationServiceInterface $service, string $id) {
        $_SESSION['error'] = null;
        $_SESSION['success'] = null;

        if( isset($_POST['type']) &&
            isset($_POST['reason_id']) &&
            isset($_POST['sum']) &&
            isset($_POST['notes']) &&
            isset($_POST['for_date']) &&
            isset($_POST['update'])) {

            /**
             * @var \App\Data\OperationDTO $operation
             */
            $operation = $this->binder->bind(OperationDTO::class, $_POST);
            $operation->setId($id);

            try{
                $service->updateOperation($operation);
                $this->redirect('operations');
            } catch (\Exception $e) {
                $_SESSION['error'] = $e->getMessage();
                $this->render('EditOperation');
            }
        }else {

            $operation = $service->findById($id);
            $reasons = $service->showAllReasons();
            $dataArr[0] = $operation;
            $dataArr[1] = $reasons;
            $this->render('EditOperation', $dataArr);
        }
    }

    public function deleteOperation(OperationServiceInterface $service, string $id) {

        $service->deleteOperation($id);
        $this->redirect('operations');
    }
}