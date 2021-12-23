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

            if($stmt->rowCount())
            {
                return array('status' => 'success', 'data' => $stmt->fetchAll(\PDO::FETCH_ASSOC));
            }
            else
            {
                return array('status' => 'fail', 'data' => 'Sem usuários encontrados');
            }

        }

        public static function selectPerson($id)
        {
            $stmt = self::$conn->prepare('SELECT * FROM '.self::$table.' WHERE id = :id LIMIT 1');
            $stmt->bindValue(':id', $id);
            $stmt->execute();

            if($stmt->rowCount())
            {
                return array('status' => 'success', 'data' => $stmt->fetchAll(\PDO::FETCH_ASSOC));

            }else
            {
                return array('status' => 'fail', 'data' => 'Nenhum usuário encontrado');
            }

        }

        public static function Update($id, $email, $password, $name)
        {
            $stmt = self::$conn->prepare('UPDATE '.self::$table.' SET email = :email, password = :password, name = :name WHERE id = :id LIMIT 1');
            $stmt->bindValue(':id', $id);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':password', $password);
            $stmt->bindValue(':name', $name);

            $stmt->execute();

            if ($stmt->rowCount()) 
            {
               return array('status' => 'success', 'data' => 'Usuário atualizado com sucesso!');
            }
            else
            {
               return array('status' => 'fail', 'data' => 'Usuário não atualizado!');
            }
            
        }

        public static function Delete($id)
        {

            $stmt = self::$conn->prepare('SELECT id FROM '.self::$table.' LIMIT 1');
            $stmt->execute();
            $array_ids = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            foreach($array_ids as $values)
            {
                $results[] = $values['id'];
            }

            if(!in_array($id, $results))
            {
                return array('status' => 'fail', 'data' => 'Usuário informado não existe!');
                exit;
            }

            $stmt = self::$conn->prepare('DELETE FROM '.self::$table.' WHERE id = :id LIMIT 1');
            $stmt->bindValue(':id', $id);

            $stmt->execute();

            if ($stmt->rowCount()) 
            {
               return array('status' => 'success', 'data' => 'Usuário Deletado com sucesso!');
            }
            else
            {
               return array('status' => 'fail', 'data' => 'Usuário não deletado!');
            }
            
        }

        public static function Insert($email, $password, $name)
        {
            $stmt = self::$conn->prepare('SELECT email FROM '.self::$table);
            $stmt->execute();
            $array_emails = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            foreach($array_emails as $values)
            {
                $results[] = $values['email'];
            }

            if(in_array($email, $results))
            {
                return array('status' => 'fail', 'data' => 'E-mail já cadastrado!');
                exit;
            }

            $stmt = self::$conn->prepare('INSERT INTO '.self::$table.'(email, password, name) VALUES(:email, :password, :name)');
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':password', $password);
            $stmt->bindValue(':name', $name);

            $stmt->execute();

            if ($stmt->rowCount()) 
            {
               return array('status' => 'success', 'data' => 'Usuário inserido com sucesso!');
            }
            else
            {
               return array('status' => 'fail', 'data' => 'Usuário não inserido!');
            }

        }

    }

?>