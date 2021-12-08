<?php

    namespace Controllers;

    use Models\Persons;
    use Models\Connection;

    class Persons_service extends Connection
    {
        public function get($id = null)
        {
            if (isset($id)) 
            {
                return Persons::selectPerson($id);
            }
            else
            {
                return Persons::selectAll(); 
            }
            
        }

        public function post()
        {
            
        }
    }
    

    
    

?>