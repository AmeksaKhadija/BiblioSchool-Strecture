<?php 


class UserService {
    private Utilisateur $user;
    private UserRepository $userRepository;
    private RoleService $roleService;

    public function __construct() {
        $this->userRepository = new UserRepository();
        $this->roleService = new RoleService();
    }

    public function create(Utilisateur $user) {
        if ($user->getId() != 0) {
            throw new Exception("invalide value (id)");
        }

        if(empty($user->getFirstname()))  {
            throw new Exception("Firstname is empty");
        }

        if(empty($user->getLastname()))  {
            throw new Exception("lastname is empty");
        }

        if(empty($user->getEmail()))  {
            throw new Exception("email is empty");
        }

        if(empty($user->getPhone()))  {
            throw new Exception("phone is empty");
        }

        if(empty($user->getPhoto()))  {
            throw new Exception("Photo is empty");
        }

        // if(empty($user->getRole()->getRoleName())) {
        //     throw new Exception("Role name is empty");
        // }

        
        
        $user->setRole($this->roleService
            ->getRoleByName($user
            ->getRole()
            ->getRoleName()));


        return $this->userRepository->create($user);


    }

    public function delete() {

    }

    public function findAll() {

    }

    public function findById() {

    }

    public function update() {

    }
}