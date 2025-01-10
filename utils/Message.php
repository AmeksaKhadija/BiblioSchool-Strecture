<?php 


class Message {
    public static function display(Exception $e) {
        echo "<div class='alert alert-danger' role='alert'>
                        problème de validation des champs : " . $e->getMessage() . "
                    </div>";
    }

    public static function in(string $message) {
        echo "<div class='alert alert-success' role='alert'>
                        i m in : " . $message . "
                    </div>";
    }
}