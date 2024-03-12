<?php
namespace app\domain\service\user;

use app\domain\entity\User;
use app\domain\repository\user\UserRepositoryInterface as IUserRepository;

class UserService implements UserServiceInterface {
    private $userRepository;

    public function __construct(IUserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function registerUser(User $user): User
    {
         //DEFINIR A DATA
         $user->setCreatedAt(date('Y-m-d H:i:s'));
    
         //INSERIR Usuario NO BANCO
         $this->userRepository->insert([
             'name'  => $user->getName(),
             'username'  => $user->getUsername(),
             'password' => $user->getPassword(),
             'email' => $user->getEmail(),
             'created_at'  => $user->getCreatedAt()
         ]);
     
         //RETORNAR USUÁRIO
         return $user;
    }
    public function getUserByEmail(string $email): ?User {
        return $this->userRepository->findByEmail($email);
        
    }
}