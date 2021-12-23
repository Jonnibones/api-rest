<?php

    namespace Controllers;

    use Models\Persons;
    use Models\Connection;

    class Persons_service extends Connection
    {
        public function get($id = null)
        {
            if ($id) 
            {
                return Persons::selectPerson($id);
            }
            else
            {
                return Persons::selectAll(); 
            }  
        }

        public function post($email, $password, $name)
        {
            return Persons::Insert($email, $password, $name);
        }

        public function put($id, $email, $password, $name)
        {
            return Persons::Update($id, $email, $password, $name);
        }

        public function delete($id)
        {
           return Persons::Delete($id); 
        }

    }
    

    
    

?>