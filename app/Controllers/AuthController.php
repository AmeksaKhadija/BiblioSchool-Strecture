<?php 

class AuthController {
    private AuthService $authService;

    public function __construct() {
        $this->authService = new AuthService();
        Message::in("AuthController constructor");
    }   
    
    public function register(RegisterForm $registerForm) {
       try {
            $user = $this->authService->register($registerForm);
       }catch (Exception $e) {
            Message::display($e);
       }
    }

    public function login(LoginForm $logInForm) {
        Message::in("Login methode dans la classe auth controller");
        Message::in("ceci est une instance de la classe LoginForm dans la méthode login de AuthController");
        var_dump($logInForm);
        try {
            $user = $this->authService->login($logInForm);
            Message::in("un objet user de la classe authService -> méthode login");
            var_dump($user);
            die($user);
        } catch (Exception $e) {
            Message::display($e);
        }
    }





    public function logout(): void {

    }
}