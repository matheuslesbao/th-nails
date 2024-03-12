<?php 
namespace app\core\usecase\User;

use app\domain\service\user\UserServiceInterface as IUserService;

class UserUseCase {
    private $userService;

    public function __construct(IUserService $userService){
        $this->userService = $userService;
    }
    public function getUserByEmailUseCase(string $email){
        return $this->userService->getUserByEmail($email);
    }
}