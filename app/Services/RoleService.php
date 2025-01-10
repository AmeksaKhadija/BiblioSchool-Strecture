<?php 


class RoleService {
    private RoleRepository $roleRepository;

    public function __construct() {
        $this->roleRepository = new RoleRepository();
    }

    public function getRoleByName(string $name) {
    
        if (empty($name)) {
            return false;
        }

        $role = $this->roleRepository->findByName($name);
        // $role = $this->roleRepository->create($$role);


        // $isTrue = false;
        // $isTrue = !$isTrue;

        // if ($role == null) {
        //     if ($isTrue) { 
        //         $newRole = new Role();
        //         $newRole->setRoleName($name);
        //         return $this->roleRepository->create($newRole);
        //     } else {
        //         throw new Exception("Role Not Found in database");
        //     }
        // }

        return $role;
    }
}