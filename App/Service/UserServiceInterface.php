<?php
/**
 * Created by PhpStorm.
 * User: Lazar Stanev
 * Date: 11/22/2017
 * Time: 5:32 PM
 */

namespace App\Service;


use App\Data\UserDTO;

interface UserServiceInterface
{
    public function register(UserDTO $user, string $confirmPassword) :bool;
    public function login(string $username, string $password);
}