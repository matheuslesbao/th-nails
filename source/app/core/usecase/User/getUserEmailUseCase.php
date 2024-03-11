<?php 
namespace app\core\usecase\User;

use app\domain\service\UserServiceInterface as IUserService;

class getUserEmailUseCase {
    private $userService;

    public function __construct(IUserService $userService){
        $this->userService = $userService;
    }
    public function execute(string $email){
        return $this->userService->getUserByEmail($email);
    }
}