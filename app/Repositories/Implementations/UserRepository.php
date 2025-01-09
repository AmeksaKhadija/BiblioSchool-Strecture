<?php 

class UserRepository {
    private UserDao $userDao;

    public function __construct() {
        $this->userDao = new UserDao();
    }

    public function create(Utilisateur $user): Utilisateur {
        return $this->userDao->create($user);
    }

}