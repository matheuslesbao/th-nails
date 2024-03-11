<?php 
namespace app\domain\service;

use app\domain\entity\User;

interface UserServiceInterface {
    public function registerUser(User $user): User;
    public function getUserByEmail(string $email): ?User;
}