<?php 

namespace Models;

use Models\Connection;

    class Persons extends Connection
    {
        private static $table = 'bd_persons.tb_persons';

        public static function selectAll()
        {
            $stmt = self::$conn->prepare('SELECT * FROM '.self::$table);
            $stmt->execute();

            if($stmt->rowCount() > 0)
            {
                return json_encode(array('status' => 'success', 'data' => $stmt->fetchAll(\PDO::FETCH_ASSOC)));
            }
            else
            {
                return json_encode(array('status' => 'fail', 'data' => 'Sem usuários encontrados'));
            }

        }

        public static function selectPerson($id)
        {
            $stmt = self::$conn->prepare('SELECT * FROM '.self::$table.' WHERE id = :id');
            $stmt->bindValue(':id', $id);
            $stmt->execute();

            if($stmt->rowCount() > 0)
            {
                return json_encode(array('status' => 'success', 'data' => $stmt->fetchAll(\PDO::FETCH_ASSOC)));
            }
            else
            {
                return json_encode(array('status' => 'fail', 'data' => 'Sem usuários encontrados'));
            }

        }
    }

?>