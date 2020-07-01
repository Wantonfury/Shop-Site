<?php
    function checkUser() {
        $servername = "sql102.byethost.com";
        $username = "b4_24675464";
        $password = "parola";
        $database = "b4_24675464_Blogs";
        $tbl_name = "Users";
        //$myusername =  $_POST['acc'] ?? '';
        //$mypassword = $_POST['pwd'] ?? '';
        $myusername = $_GET["acc"];
        $mypassword = $_GET["pwd"];

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            /*echo "Connected successfully"; */
        } catch(PDOException $e) {    
                /*echo "Connection failed: " . $e->getMessage();*/
        }
            
        $sql = "SELECT * FROM $tbl_name WHERE user='$myusername' and password='$mypassword'";
        $result = $conn->query($sql);
        $row = $result->fetch();

        if ($row) {
            //echo "<script> localStorage.setItem('logged', 'true'); </script>";
            echo json_encode(array(result => "success"));
        }
        else {
            echo json_encode(array(result => "fail"));
            /*echo "Login failed";*/
        }
    }

    /*if ($_SERVER['REQUEST_METHOD'] == "GET") {*/
        checkUser();
    /*}*/
?>

<script>
    var articles = [];
    var articlesTotal = 0;
  </script>
  <?php
  while ($row = $result->fetch_assoc()) { ?>
    <script>
      article = {
        title: <?php echo "'" . $row["title"] . "'"; ?>,
        date: <?php echo "'" . $row["date"] . "'"; ?>,
        body: <?php echo "'" . $row["body"] . "'"; ?>
      };

      articles.push(article);
      articlesTotal = articlesTotal + 1;
    </script>
  <?php }
?>