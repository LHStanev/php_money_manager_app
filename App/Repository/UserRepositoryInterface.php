<?php
/**
 * Created by PhpStorm.
 * User: Lazar Stanev
 * Date: 11/22/2017
 * Time: 5:03 PM
 */

namespace App\Repository;


use App\Data\UserDTO;

interface UserRepositoryInterface
{
    public function insert(UserDTO $user): bool;
    public function findByUsername(string $username);
}