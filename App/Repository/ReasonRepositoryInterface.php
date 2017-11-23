<?php
/**
 * Created by PhpStorm.
 * User: Lazar Stanev
 * Date: 11/23/2017
 * Time: 9:49 PM
 */

namespace App\Repository;


interface ReasonRepositoryInterface
{
    public function showAll() :\Generator;
}