<?php 
include './../utils/Message.php';
include_once './../app/Models/Role.php';
include './../app/Models/Utilisateur.php';
include './../app/Models/Categorie.php';
include './../app/Models/Livre.php';
include './../app/Models/Tag.php';
// include './../utils/ArrayActions.php';
include './../app/Core/Database.php';
include './../app/DAOs/RoleDao.php';
include './../app/Repositories/Implementations/RoleRepository.php';
include './../app/Services/RoleService.php';
include './../app/DAOs/UserDao.php';
include './../app/Repositories/Implementations/UserRepository.php';
include './../app/Services/UserService.php';
include './../app/Controllers/UserController.php';
include './../app/http/RegisterForm.php';
include './../app/http/LoginForm.php';
include './../app/Services/AuthService.php';
include './../app/Controllers/AuthController.php';



class Test {
    public function __construct() {
        Message::in("Test Contructor");
    }
    
    public function testRole() {
        echo "Role Test : ";
        $role = Role::instanceWithNameAndDescriptionAndLogo("Admin", "This is role admin", "logo admin");
        $this->display($role);

        

        echo "Utilisateur Test : ";

        $user = Utilisateur::instanceWithFirstnameAndLastname("Reda" , "Firoud");
        $user->setRole($role);
        $this->display($user);
        $user2 = Utilisateur::instanceWithoutId("Reda" , "Firoud", "", "", "", "", $role, ["r1", "r2"]);
        $this->display($user2);

        echo "Test Categorie : ";
        $categorie = Categorie::instanceNameDescription("Cat 1", "This is cat 1");
        $this->display($categorie);


        echo "Livre Test : ";
        $livre = Livre::instancewithTitreAndDescriptionCourt("TOTO", "this is TOTO Livre");
        $livre->setCategorie($categorie);
        // $this->display($livre);

        echo "Tag Test : " ;
        $tagList = [];
        for ($i = 0 ; $i < 10 ; $i++) {
            $name = "tag " . $i;
            $tag = Tag::instanceWithNameAndDescriptionAndLogo($name, "Tag description", "logo Tag");
            array_push($tagList , $tag);
        }

        $livre->setTag($tagList);
        $this->display($livre);


        // $roleService = new RoleService();
        // $roleService->getRoleByName("Admin");


        //User Test
        $userController = new UserController();
        $userCreated = $userController->createUtilisateur();
    }

    public function authTest() {
        $registerForme = RegisterForm::instanceWithAllArgs(
            "Walid" , 
            "El karti" , 
            "Walid1s@gmail.com",
            "walidlove" , 
            "walidlove" , 
            "0607189671" , 
            "photo.png");

        $authController = new AuthController();
        $authController->register($registerForme);
        
    }

    public function loginTest() {
        Message::in("méthode Login dans la classe Test");
        $loginForm = LoginForm::instanceWithAllArgs("Walid1s@gmail.com", "walidlove");

        
        $authController = new AuthController();
        Message::in("ceci est une instance de la classe authControlleur dans la méthode login TEst");
        var_dump($authController);

        $authController->login($loginForm);
        
    }

    public function display($obj) {
        echo $obj;
        echo "<br />";
        echo "===================================================================================";
        echo "<br />";
    }

}