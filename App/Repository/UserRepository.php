<?php
/**
 * Created by PhpStorm.
 * User: Lazar Stanev
 * Date: 11/22/2017
 * Time: 5:18 PM
 */

namespace App\Repository;


use App\Data\UserDTO;
use Database\DatabaseInterface;

class UserRepository implements UserRepositoryInterface
{
    private $db;

    public function __construct(DatabaseInterface $db)
    {
        $this->db = $db;
    }

    public function insert(UserDTO $user): bool
    {
        $stm = $this->db->prepare(
            "INSERT INTO users (username, password, first_name, last_name)
                  VALUES(?,?,?,?)");
        $stm->execute([
           $user->getUsername(),
           $user->getPassword(),
           $user->getFirstName(),
           $user->getLastName()
        ]);
        return true;
    }

    public function findByUsername(string $username)
    {
        return $this->db
        ->prepare("SELECT id, username, password, first_name AS firstName, last_name AS lastName FROM users WHERE username = ?")
        ->execute([$username])
        ->fetch(UserDTO::class)->current();

    }
}