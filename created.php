<?php
 
    class Created
    {
        private $servername = "localhost";
        private $username   = "root";
        private $password   = "";
        private $database   = "db_task";
        public  $con;
 
 
        // Database Connection 
        public function __construct()
        {
            $this->con = new mysqli($this->servername, $this->username,$this->password,$this->database);
            if(mysqli_connect_error()) {
             trigger_error("Failed to connect to MySQL: " . mysqli_connect_error());
            }else{
            return $this->con;
            }
        }
 
        public function insertData($post)
        {        
            date_default_timezone_set('Asia/Dhaka');
            $current_date = date('Y-m-d');
            $amount = $this->con->real_escape_string($_POST['amount']);
            $buyer = $this->con->real_escape_string($_POST['buyer']);
            $receipt_id = $this->con->real_escape_string($_POST['receipt_id']);
            $items = $_POST['items'];
            $buyer_email = $this->con->real_escape_string($_POST['buyer_email']);
            $buyer_ip = $this->con->real_escape_string($_SERVER['REMOTE_ADDR']);
            $note = $this->con->real_escape_string($_POST['note']);
            $city = $this->con->real_escape_string($_POST['city']);
            $phone = $this->con->real_escape_string($_POST['phone']);
            $salt_value = 'Aquickbrownfoxjumpoverthelazydogs';
            $salted_receipt_id = $receipt_id.$salt_value;
            $sha512_receipt_id = hash('sha512',$salted_receipt_id);
            $hash_key = $this->con->real_escape_string($sha512_receipt_id);
            $entry_at = $this->con->real_escape_string($current_date);
            $entry_by = $this->con->real_escape_string($_POST['entry_by']);     
            
            $_SESSION['entry_by'] = $entry_by;

            setcookie('entry_by', $entry_by, time()+60*60*24,"/");

            $query="INSERT INTO 
                tbl_task_table(
                    amount, buyer, receipt_id, buyer_email, buyer_ip, note,
                    city, phone, hash_key, entry_at, entry_by
                ) 
                VALUES('$amount', '$buyer', '$receipt_id', '$buyer_email', '$buyer_ip', '$note',
                    '$city', '$phone', '$hash_key', '$entry_at', '$entry_by')";
            $sql = $this->con->query($query);
            //print_r($_POST);
            $last_id =  $this->con-> insert_id;

            foreach($items AS $item){
                $item = $this->con->real_escape_string($item);
                $query2 = "INSERT INTO `tbl_item_info`(`item_name`,`task_id`) VALUES('".$item."', '".$last_id."')";
                $sql2 = $this->con->query($query2);
            }

            if ($sql==true) {
                header("Location:show.php?success=insert");
            }else{
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Report Data Insert Failed.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
            }
        }
 
        public function showData()
        {
            $query = "SELECT *, GROUP_CONCAT(item_name SEPARATOR ', ') as item_names FROM tbl_task_table, tbl_item_info 
                WHERE tbl_task_table.id = tbl_item_info.task_id GROUP BY entry_by";
            $result = $this->con->query($query);
                if ($result->num_rows > 0) {
                    $data = array();
                    while ($row = $result->fetch_assoc()) 
                    {
                        $data[] = $row;
                    }
                    return $data;
                }
                else
                {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    No Data Found. Please <a href="index.php">insert First</a>. Thanks!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
                }
        }
 
    }
?>