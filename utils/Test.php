<?php 

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


class Test {
    
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


        $roleService = new RoleService();
        $roleService->getRoleByName("Admin");


        //User Test
        $userController = new UserController();
        $userCreated = $userController->createUtilisateur();
        die($userCreated);
    }

    public function display($obj) {
        echo $obj;
        echo "<br />";
        echo "===================================================================================";
        echo "<br />";
    }

}