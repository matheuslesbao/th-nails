<?php 
namespace app\core\usecase;

use app\domain\service\UserServiceInterface as IUserService;

class UserUseCase {
    private $userService;

    public function __construct(IUserService $userService){
        $this->userService = $userService;
    }
    public function getUserByEmailUseCase(string $email){
        return $this->userService->getUserByEmail($email);
    }
}