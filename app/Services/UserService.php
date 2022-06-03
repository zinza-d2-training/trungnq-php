<?php 
namespace App\Services;
use App\Repositories\UserRepository;
class UserService{

    protected $userRepositoty;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepositoty = $userRepository;
    }

    public function saveUserData($data)
    {
        $result = $this->userRepositoty->new($data);
    }
    public function getUser($id){
        $result = $this->userRepositoty->getById($id);
        return $result;
    }
    public function forgotPassword($email){
        return $this->userRepositoty->forgotPassword($email);
    }
    public function haderLogin($data){
        return $this->userRepositoty->login($data);
    }
}

?>