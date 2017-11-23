<?php
/**
 * Created by PhpStorm.
 * User: Lazar Stanev
 * Date: 11/23/2017
 * Time: 11:11 AM
 */

namespace App\Data;


class OperationDTO
{
    private $id;
    private $type;
    private $reasonId;
    private $sum;
    private $notes;
    private $forDate;
    private $userId;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getReasonId()
    {
        return $this->reasonId;
    }

    /**
     * @param mixed $reason
     */
    public function setReasonId($reasonId)
    {
        $this->reasonId = $reasonId;
    }

    /**
     * @return mixed
     */
    public function getSum()
    {
        return $this->sum;
    }

    /**
     * @param mixed $sum
     */
    public function setSum($sum)
    {
        $this->sum = $sum;
    }

    /**
     * @return mixed
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @param mixed $notes
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
    }

    /**
     * @return mixed
     */
    public function getForDate()
    {
        return $this->forDate;
    }

    /**
     * @param mixed $forDate
     */
    public function setForDate($forDate)
    {
        $this->forDate = $forDate;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }


}