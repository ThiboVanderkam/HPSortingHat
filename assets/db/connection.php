<?php
    function makeConnectionWithDatabase() {
        $hostname = "ID362561_sortinghat.db.webhosting.be";
        $dbUser = "ID362561_sortinghat";
        $dbPassword = "WebFundamentals2021";
        $dbName = "ID362561_sortinghat";
        $port = 3306;

        $conn = mysqli_connect($hostname, $dbUser, $dbPassword, $dbName, $port);

        if ($conn == false) {
            echo "ik kan de database niet bereiken";
            die();
        }
        return $conn;
    }
    

    function closeConnection($conn) {
        $conn->close();
    }

    function insertQuery($conn, $query) {
        mysqli_query($conn, $query);
    }

    function getQuery($conn, $query) {
        $val = mysqli_query($conn, $query)->fetch_all(MYSQLI_ASSOC);
        return $val;
    }

?>