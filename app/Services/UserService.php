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

        if ($this->checkEmailifExist($user->getEmail())){
            throw new Exception("Email is already exist !");
        }
        
        return $this->userRepository->create($user);


    }

    public function checkEmailifExist(string $email) {
        $user = $this->userRepository->findByEmail($email);
        
        if ($user != null ) {
            return true;
        }

        return false;
    }

    public function delete() {

    }

    public function findAll() {

    }

    public function findById() {

    }

    public function update() {

    }

    public function findByEmailAndPassword(Utilisateur $user) : Utilisateur
    {
        Message::in("la méthode findByEmailAndPassword dans la classe UserService");
        var_dump($user);
        $user = $this->userRepository->findByEmailAndPassword($user);
        Message::in("L'utilisateur avec ces attr : ");
        var_dump($user);
        if (!$user) {
            Message::in("l'utilisateur est null");
            return new Utilisateur();
        }

        Message::in("L'ajout du role a l'instance de la classe user");

        //TODO implémentation de cette fonction .......
        // --------------------------------------------
        // $user->setRole(
        //     $this->roleService->getRoleById($user->getRole_ID())
        // );

        Message::in("L'utilisateur avec leur rôle ");
        var_dump($user);
        return $user;
    }
}