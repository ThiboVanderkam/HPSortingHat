<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Harry Potter Sorting Hat</title>
        <link href="assets/css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body class="css-background">
        <?php
            include "assets/db/connection.php";
            $firstname = $_POST["account-firstname"];
            $lastname = $_POST["account-lastname"];
            $age = $_POST["account-age"];
            $gender = $_POST["account-gender"];
            $favouritefood = $_POST["account-favouritefood"];
            $startvalue = 0;
            
            
            $conn = makeConnectionWithDatabase();

            $getsql = "SELECT AccountId FROM account ORDER BY AccountId DESC LIMIT 1;";
            $highestAccountId = getQuery($conn, $getsql);

            $highestAccountId = (int)$highestAccountId[0]["AccountId"];
            $nextAccountId = $highestAccountId + 1;

            $sql = "INSERT INTO account (AccountId, Firstname, Lastname, Age, Gender, Favouritefood, Gryffindor, Slytherin, Ravenclaw, Hufflepuff)
                    VALUES ($nextAccountId, '$firstname', '$lastname', $age, '$gender', '$favouritefood', $startvalue, $startvalue, $startvalue, $startvalue);";
            insertQuery($conn, $sql);

            closeConnection($conn);
    
        ?>

        <div class="css-mainsection css-marginbottom-m css-margintop-m">
            <h1 class="title yellow">
                Succes!
            </h1>
            
            <form method="POST" action="sortAccounts.php">
                <input type="hidden" id="AcountId" name="AccountId" value="0">
                <input type="submit" value="SORT PEOPLE" class="form-element submit-button red">
            </form>

            <form method="POST" action="addAccount.php">
                <input type="submit" value="ADD ANOTHER PERSON" class="form-element submit-button red">
            </form>
            
        </div>
    </body>
</html>

