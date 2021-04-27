<?php
    require_once('config.php');

    class DatabaseTranscations extends PDOStatement {
        private $connection;

        public function __construct()
        {
        }

        private function connection() {
            $connection = new PDOConfig();
            if($connection === false){
                echo "ERROR: Could not connect. " . mysqli_connect_error();
            }
            return $connection;
        }

        public function insert($Course, $Course_Desc) {
            $sql = "INSERT INTO courses(Course, Course_Desc) VALUES (?, ?)";
        try {
            $connection = $this->connection();
            $statement = $connection->prepare($sql);

            $statement->bindParam(1, $Course, PDO::PARAM_STR);
            $statement->bindParam(2, $Course_Desc, PDO::PARAM_STR);

            $statement->execute();
            $connection = null;
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
        }

        public function select($id = null) {
            if (isset($id)) {
                $sql = "SELECT * FROM courses WHERE id = :id";
            try {
                $connection = $this->connection();
                $statement = $connection->prepare($sql);
                $statement->bindValue(':id', $id);
                $statement->execute();
                $result = $statement->fetch(PDO::FETCH_ASSOC);
                $connection = null;
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
            } else {
                $sql =  "SELECT * FROM courses";
                try {
                    $connection = $this->connection();
                    $statement = $connection->query($sql);
                    $result = $statement->fetchAll();
                    $connection = null;
                    return $result;
                } catch (PDOException $e) {
                    echo $e->getMessage();
                    return false;
                }
            }
        }

        public function update($Course, $Course_Desc, $id) {
            $sql = "UPDATE courses set Course = ?, Course_Desc = ? WHERE id = ?";
            try {
                $connection = $this->connection();
                $statement = $connection->prepare($sql);
                $statement->bindParam(1, $Course, PDO::PARAM_STR);
                $statement->bindParam(2, $Course_Desc, PDO::PARAM_STR);
                $statement->bindParam(3, $id, PDO::PARAM_INT);
                $statement->execute();
                $connection = null;
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
        }
        }

        public function delete($id) {
            $sql = "DELETE FROM courses WHERE id = ?";
            try {
                $connection = $this->connection();
                $statement = $connection->prepare($sql);
                $statement->bindParam(1, $id, PDO::PARAM_INT);
                $statement->execute();
                $connection = null;
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
    }
