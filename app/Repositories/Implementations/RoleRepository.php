<?php 

class RoleRepository {

    private RoleDao $roleDao;

    public function __construct() {
        $this->roleDao = new RoleDao();
    }
    
    public function findByName(string $name) {

        $query = "SELECT id, role_name, role_description, logo FROM roles WHERE role_name = '" . $name . "';";
        $stmt = Database::getInstance()->getConnection()->prepare($query);
        $stmt->execute();

        return $stmt->fetchObject(Role::class);
    }

    public function create(Role $role): Role {
        return $this->roleDao->create($role);
    }
}