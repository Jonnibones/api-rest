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

        public function post($id, $email, $password, $name)
        {
            if(is_null($id))
            {
                return Persons::Insert($email, $password, $name);
            }
            else
            {
                return Persons::Update($id, $email, $password, $name);
            }
        }

        public function put()
        {
            
        }

        public function delete()
        {
            
        }
    }
    

    
    

?>