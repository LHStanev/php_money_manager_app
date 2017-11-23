<?php
/**
 * Created by PhpStorm.
 * User: Lazar Stanev
 * Date: 11/22/2017
 * Time: 5:33 PM
 */

namespace App\Service;


use App\Data\UserDTO;
use App\Repository\UserRepositoryInterface;

class UserService implements UserServiceInterface
{
    private $repository;

    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function register(UserDTO $user, string $confirmPassword): bool
    {
        if(true == $this->repository->findByUsername($user->getUsername())){
            throw new \Exception('Username already exists. Please, choose another one.');
        }
        if($user->getPassword() !== $confirmPassword) {
            throw new \Exception('Your passwords do not match. Please, try again.');
        }
        $plainPassword = $user->getPassword();
        $passwordHash = password_hash($plainPassword, PASSWORD_BCRYPT);
        $user->setPassword($passwordHash);

        return $this->repository->insert($user);
    }

    public function login(string $username, string $password)
    {
        /**
         * @var UserDTO $user
         */
        $user = $this->repository->findByUsername($username);

        if(null == $user) {
           throw new \Exception('Wrong username and/or password.');
        }

        $passwordHash = $user->getPassword();

        if(true === password_verify($password, $passwordHash)){
            return $user;
        }else {
            throw new \Exception('Wrong username and/or password.');
        }
    }
}