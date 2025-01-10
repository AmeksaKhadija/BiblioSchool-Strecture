<?php 

class UserRepository {
    private UserDao $userDao;

    public function __construct() {
        $this->userDao = new UserDao();
    }

    public function create(Utilisateur $user): Utilisateur {
        return $this->userDao->create($user);
    }

    public function findByEmail(string $email): mixed {
        $query = "SELECT id, firstname, lastname, email, phone, photo, role_id, password FROM utilisateurs WHERE email = '" . $email . "';";
        $stmt = Database::getInstance()->getConnection()->prepare($query);
        $stmt->execute();

        return $stmt->fetchObject(Utilisateur::class);
    }

    public function findByEmailAndPassword(Utilisateur $user) : mixed {
        Message::in("je suis dans la méthode findbyemailandpassword de la classe USerRepository");
        $query = "SELECT id, firstname, lastname, email, phone, photo, role_id, password FROM utilisateurs WHERE email = '" . $user->getEmail() . "' AND password = '". $user->getPassword() ."';";

        Message::in("la requête");
        Message::in($query);
        $stmt = Database::getInstance()->getConnection()->prepare($query);
        $stmt->execute();

    

        return $stmt->fetchObject(Utilisateur::class);
    }

}