<?php
class Crud
{
    private $dbHost = "localhost";
    private $dbUsername = "phpmyadmin";
    private $dbPassword = "root";
    private $dbName = "shoppingsystem";
    
    private $conn = false;
    public $mysqli;
    private $result = [];

    #FUNCTION TO CREATE DATABASE CONNECTION.
    public function db_connect()
    {
        if (!$this->conn) {
            $this->mysqli = new mysqli($this->dbHost, $this->dbUsername, $this->dbPassword, $this->dbName); #CREATED CONNECTION
            $this->conn = true;

            if ($this->mysqli->connect_error) {
                array_push($this->result, $this->mysqli->connect_error);
                return false;
            } else {
                return true;
            }
        } else {
            return true;
        }
    }

    #FUNCTION TO INSERT INTO DATABASE.
    public function insert($table, $value = [])
    {
        $tableName = implode(', ', array_keys($value));
        $tableData = implode("', '", $value);
        $insertQuery = "INSERT INTO $table ($tableName) VALUES ('$tableData')";

        if ($this->tableExists($table)) {
            // echo "Table Exist";
            if ($this->mysqli->query($insertQuery)) {
                // array_push($this->result, $this->mysqli->insert_id);
?>
                <script>
                    alert("Data Inserted Succesfully");
                </script>
            <?php
                return true;
            } else {
                array_push($this->result, $this->mysqli->error);
            ?>
                <script>
                    alert("Data was not inserted");
                </script>
<?php
                return false;
            }
        } else {
            // echo "Table Does not Exist";
        }
    }

    #FUNCTION TO UPDATE INTO DATABASE.
    public function update($table, $value = [], $where = null)
    {
        if ($this->tableExists($table)) {
            $tableColumn = [];

            foreach ($value as $key => $data) {
                $tableColumn[] = "$key = '$data'";
            }

            $updateQuery = "UPDATE $table SET " . implode(', ', $tableColumn);
            if ($where != null) {
                $updateQuery .= " WHERE $where";
            }

            if ($this->mysqli->query($updateQuery)) {
                array_push($this->result, $this->mysqli->affected_rows);
                return true;
            } else {
                array_push($this->result, $this->mysqli->error);
            }
        } else {
            return false;
        }
    }

    #FUNCTION TO DELETE INTO DATABASE.
    public function delete($table, $where = null)
    {
        if ($this->tableExists($table)) {
            $deleteQuery = "DELETE FROM $table";

            if ($where != null) {
                $deleteQuery .= " WHERE $where";
            }

            if ($this->mysqli->query($deleteQuery)) {
                array_push($this->result, $this->mysqli->affected_rows);
                return true;
            } else {
                array_push($this->result, $this->mysqli->error);
            }
        } else {
            return false;
        }
    }

    #FUNCTION TO SELECT DATA FROM DATABASE. 2TYPES
    // 1st TYpe
    public function selectData($selectQuery)
    {
        $query = $this->mysqli->query($selectQuery);

        if ($query) {
            $this->result = $query->fetch_all(MYSQLI_ASSOC);
            return true;
        } else {
            return false;
        }
    }

    // 2nd Type - args will be 
    public function select($table, $columnName = "*", $where = null, $order = null, $limit = null)
    {
        if ($this->tableExists($table)) {

            $selectQuery = "SELECT $columnName from $table";

            if ($where != null) {
                $selectQuery .= " WHERE $where";
            }
            if ($order != null) {
                $selectQuery .= " ORDER BY $order";
            }
            if ($limit != null) {
                $selectQuery .= " LIMIT 0,$limit";
            }

            $query = $this->mysqli->query($selectQuery);

            if ($query) {
                array_push($this->result, $query->fetch_all(MYSQLI_ASSOC));
                return true;
            } else {
                array_push($this->result, $this->mysqli->error);
            }
            return true;
        } else {
            return false;
        }
    }


    #FUNCTION TO CHECK IF TABLE EXIST IN DATABASE OR NOT
    private function tableExists($table)
    {
        $tableCheckQuery = "SHOW TABLES FROM $this->dbName LIKE '$table'";
        $tableInDb = $this->mysqli->query($tableCheckQuery);

        #CHECKING IF $tableInDb QUERY HAS BEEN SUCCESSFULLY EXECUTED OR NOT.
        if ($tableInDb) {
            if ($tableInDb->num_rows == 1) {
                return true;
            } else {
                array_push($this->errorArr, $table . " table does not exists in database.");
                return false;
            }
        }
    }

    #SHOW ERROR MESSAGE FROM PROPERTY ERRORARRAY
    public function showError()
    {
        $result = $this->result;
        $this->result = [];
        return $result;
    }

    #CLOSE CONNECTION
    public function __destruct()
    {
        if ($this->conn) {
            if ($this->mysqli->close()) {
                $this->conn = false;
                return true;
            }
        } else {
            return false;
        }
    }
}
