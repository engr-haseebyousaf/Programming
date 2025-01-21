<?php
class Database{     //class for database connectivity
    private $db_host = "localhost";
    private $db_user = "root";
    private $db_pass = "";
    private $db_name = "students";
    private $conn = false;
    private $mysqli = "";
    private $result = array();
    public function __construct(){  // constructor function to connect
        if (!$this->conn) {
            $this->mysqli = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
            if ($this->mysqli->connect_error) {
                array_push($this->result,$this->mysqli->connect_error);
                $this->conn = false;
            }else {
                $this->conn = true;
            }
        }
    }   // constructor end
    // Function to select values
    public function select($table,$rows="*",$join=null, $where=null, $order=null, $limit=null){
        if ($this->tableExists($table)) {
            $sql = "SELECT $rows FROM $table";
            if ($join!=null) {
                $sql .= " $join";
            }
            if ($where!=null) {
                $sql .= " WHERE $where";
            }
            if ($order!=null) {
                $sql .= " ORDER BY $order";
            }
            if ($limit!=null) {
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                } else {
                    $page = 1;
                }
                $start = ($page - 1) * $limit;
                $sql .= " LIMIT $start,$limit";
            }
            $query = $this->mysqli->query($sql);
            if ($query) {
                $this->result = $query->fetch_all(MYSQLI_ASSOC);
                return true;
            } else {
                array_push($this->result, $this->mysqli->error);
                return false;
            }
        } else {
            return false;
        }
    }  //end of select function
    // Function to show records by passing query
    public function sql($sql){
        $query = $this->mysqli->query($sql);
            if ($query) {
                $this->result = $query->fetch_all(MYSQLI_ASSOC);
                return true;
            } else {
                array_push($this->result, $this->mysqli->error);
                return false;
            }
        } //sql function ends
        //  public function to show pagination in web page
        public function pagination($table,$join=null, $where=null, $limit=null){
            if ($this->tableExists($table)) {
                $sql = "SELECT COUNT(*) FROM $table";
                if ($join!=null) {
                    $sql .= " $join";
                }
                if ($where!=null) {
                    $sql .= " WHERE $where";
                }
                
                $check = $this->mysqli->query($sql);

                if ($check) {
                    $total_rows = $check->fetch_all(MYSQLI_ASSOC);
                    $total_rows = $total_rows[0]["COUNT(*)"];
                    $total_pages = ceil($total_rows/$limit);
                    $url = basename($_SERVER["PHP_SELF"]);
                    $pages = "<ul class='pagination'>";
                    if (isset($_GET['page'])) {
                        if ($_GET['page']>1) {
                            $p = $_GET['page'] - 1;
                            $pages .= "<li><a href='$url?page=$p'>Prev</a></li>";
                        }
                    }
                    for ($i=1; $i <= $total_pages; $i++) {
                        if ($_GET['page'] == $i) {
                            $active = "class='active'";
                        } else {
                            $active = "";
                        }
                        $pages .= "<li><a $active href='$url?page=$i'>$i</a></li>";
                    }
                    if (isset($_GET['page'])) {
                        if ($_GET['page']<$total_pages) {
                            $p = $_GET['page'] + 1;
                            $pages .= "<li><a href='$url?page=$p'>Next</a></li>";
                        }
                    }
                    $pages .= "</ul>";
                    echo $pages;
                    return true;
                } else {
                    array_push($this->result,$this->mysqli->error);
                    return false;
                }
            }  //pagination ends
        }  //pagination function ends
    // Function to insert any record in database
    public function insert($table, $params=array()){
        if ($this->tableExists($table)) {
            $table_columns = implode(", ",array_keys($params));
            $table_values = implode("', '",$params);
            $sql = "INSERT INTO $table ({$table_columns}) VALUES ('{$table_values}');";
            if ($this->mysqli->query($sql)) {
                array_push($this->result,$this->mysqli->insert_id);
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }   //insert function ends
    //update function to update value
    public function update($table, $params=array(),$where=null){
        if ($this->tableExists($table)) {
            $variable = array();
            foreach ($params as $key => $value) {
                $variable[] = "$key = '$value'";
            }
            $values = implode(", ",$variable);
            $sql = "UPDATE students2 SET $values WHERE ";
            if ($where!=null) {
                $sql .= $where;
            }
            if ($this->mysqli->query($sql)) {
                array_push($this->result, $this->mysqli->affected_rows);
                return true;
            }
        } else {
            return false;
        }
    }   // update function ends
    public function delete($table, $where=null){
        if ($this->tableExists($table)) {
            $sql = "DELETE FROM $table";
            if ($where!=null) {
                $sql .= " WHERE $where";
            }
            if ($this->mysqli->query($sql)) {
                array_push($this->result, $this->mysqli->affected_rows);
                return true;
            }
        } else {
            return false;
        }
    }   //delete function ends
    // Function to check whether a table exists in the database
    private function tableExists($table){
        $sql = "SHOW TABLES LIKE '$table';";
        $tableInDb = $this->mysqli->query($sql);
        if ($tableInDb) {
            if ($tableInDb->num_rows == 1) {
                return true;
            } else {
                array_push($this->result,$table . " Does not exist in database " . $this->db_name);
                return false;
            }
        }
    }   // end of function tableExists
    public function getResult(){
        $results = $this->result;
        $this->result = [];
        return $results;
    }
    public function __destruct(){   //desctructor function to close connection
        if ($this->conn) {
            $this->mysqli->close();
            $this->conn = false;
        }
    }
}   //class close