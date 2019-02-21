<?php

    class Erro {

        public function catchError(Exception $e) {
            if(DEBUG) {
                echo "<pre>";
                print_r($e);
                echo "</pre>";
                exit;
            } else {
                include "erro.php";
                exit;
            }
        }

    }