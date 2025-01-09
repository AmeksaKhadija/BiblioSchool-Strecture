<?php 


class UserDao {


    public function create(Utilisateur $user): Utilisateur{
        $query = "INSERT INTO utilisateurs (firstname, lastname, email, password, photo, phone, role_id ) VALUES ( ' ". $user->getFirstname() . "' , ' " . $user->getLastname() . "' , ' ". $user->getEmail() . " ' , ' " . $user->getPassword() . "', ' " . $user->getPhoto() . " ' , ' " . $user->getPhone() . "' ,". $user->getRole()->getId() .  ");" ;

        // die($query);

        $stmt = Database::getInstance()->getConnection()->prepare($query);
        $stmt->execute();

        $user->setId(Database::getInstance()
            ->getConnection()
            ->lastInsertId());

        return $user;
    }
}