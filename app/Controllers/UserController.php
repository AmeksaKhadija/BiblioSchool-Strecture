<?php 


class UserController {

    private Utilisateur $user; 
    private RoleService $roleService;
    private UserService $userService;

    public function __construct() {
        $this->roleService = new RoleService();
        $this->userService = new UserService();
    }

    public function createUtilisateur() {
        $firstname = "first";
        $lastname = "last";
        $phone = "0607189671";
        $photo = "Logo.png";
        $email = "adminssdsd@example.com";
        $password = "998877";
        $rolename = "Utilisateur";

        $role = Role::instanceWithName($rolename);

        
        $user = Utilisateur::instanceWithoutId($firstname, 
            $lastname, 
            $email,
            $password, 
            $phone, 
            $photo, 
            $role, 
            []);


        try {
            $user = $this->userService->create($user);
            return $user;
        }catch (Exception $e) {
            die("Erreur de base de données : " . $e->getMessage());
        }

        
    }

    
}