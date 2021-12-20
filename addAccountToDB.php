<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="assets/css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body class="css-background">
        <?php
            include "assets/db/connection.php";
            $firstname = $_GET["account-firstname"];
            $lastname = $_GET["account-lastname"];
            $age = $_GET["account-age"];
            $gender = $_GET["account-gender"];
            $favouritefood = $_GET["account-favouritefood"];
            $startvalue = 0;
            
            
            $conn = makeConnectionWithDatabase();

            $getsql = "SELECT AccountId FROM account ORDER BY AccountId DESC LIMIT 1;";
            $highestAccountId = getQuery($conn, $getsql);

            $highestAccountId = (int)$highestAccountId[0]["AccountId"];
            $nextAccountId = $highestAccountId + 1;

            $sql = "INSERT INTO account (AccountId, Firstname, Lastname, Age, Gender, Favouritefood, Gryffindor, Slytherin, Ravenclaw, Hufflepuff)
                    VALUES ($nextAccountId, '$firstname', '$lastname', $age, '$gender', '$favouritefood', $startvalue, $startvalue, $startvalue, $startvalue);";


            mysqli_query($conn, $sql);

            closeConnection($conn);
    
        ?>

        <div id="css-mainsection">
            <h1 id="title">
                Succes!
            </h1>
            
            <form method="GET" action="sortAccounts.php">
                <input type="hidden" id="AcountId" name="AccountId" value="0">
                <input type="submit" value="SORT PEOPLE" class="form-element submit-button">
            </form>

            <form method="GET" action="addAccount.php">
            <input type="submit" value="ADD ANOTHER PERSON" class="form-element submit-button">
            </form>
            
        </div>
    </body>
</html>

