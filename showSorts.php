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
        <div class="css-mainsection css-marginbottom-m css-margintop-m">
            <div class="css-marginbottom-m">
                <h1 class="title yellow">
                    Sort the people
                </h1>

                <?php
                    include "assets/db/connection.php";
                    include "assets/function/functions.php";
                    $conn = makeConnectionWithDatabase();
                    $AccountId = (int)$_POST["AccountId"];
                    $house = $_POST["house"];
                    

                    $valuesql = "SELECT $house FROM account WHERE AccountId = $AccountId;";
                    $value = getQuery($conn, $valuesql);
                    $newValue = ((int)$value[0][$house]) + 1;
                    
                    $sql = "UPDATE account SET $house = $newValue WHERE AccountId = $AccountId;";
                    mysqli_query($conn, $sql);

                    $getsql = "SELECT Firstname FROM account WHERE AccountId = $AccountId;";
                    $firstname = getQuery($conn, $getsql);
                    $getsql = "SELECT Lastname FROM account WHERE AccountId = $AccountId;";
                    $lastname = getQuery($conn, $getsql);
                    $getsql = "SELECT Age FROM account WHERE AccountId = $AccountId;";
                    $age = getQuery($conn, $getsql);
                    $getsql = "SELECT Gender FROM account WHERE AccountId = $AccountId;";
                    $gender = getQuery($conn, $getsql);
                    $getsql = "SELECT Favouritefood FROM account WHERE AccountId = $AccountId;";
                    $favouritefood = getQuery($conn, $getsql);
                    
                    $getsql = "SELECT Gryffindor FROM account WHERE AccountId = $AccountId;";
                    $Gryffindor = getQuery($conn, $getsql);
                    $GryffindorVotes = ((int)$Gryffindor[0]["Gryffindor"]) + 1;

                    $getsql = "SELECT Slytherin FROM account WHERE AccountId = $AccountId;";
                    $Slytherin = getQuery($conn, $getsql);
                    $SlytherinVotes = ((int)$Slytherin[0]["Slytherin"]) + 1;

                    $getsql = "SELECT Hufflepuff FROM account WHERE AccountId = $AccountId;";
                    $Hufflepuff = getQuery($conn, $getsql);
                    $HufflepuffVotes = ((int)$Hufflepuff[0]["Hufflepuff"]) + 1;

                    $getsql = "SELECT Ravenclaw FROM account WHERE AccountId = $AccountId;";
                    $Ravenclaw = getQuery($conn, $getsql);
                    $RavenclawVotes = ((int)$Ravenclaw[0]["Ravenclaw"]) + 1;

                ?>
                <p class="red attributes">
                    <?php
                        OutputUserData($firstname, $lastname, $age, $gender, $favouritefood);
                    ?>
                <p>

                <p class="red attributes">
                    <?php
                        OutputResults($GryffindorVotes, $SlytherinVotes, $HufflepuffVotes, $RavenclawVotes);
                    ?>
                <p> 
                    
                <?php
                    closeConnection($conn);
                    $AccountId = $AccountId + 1;
                ?>
                
            </div>

                <form method="POST" action= sortAccounts.php>               
                    <?php echo '<input type="hidden" id="AcountId" name="AccountId" value=' . $AccountId . '>' ?>              
                    <input type="submit" value="Next Person" class="submit-button form-element yellow">                 
                </form>
        </div>
    </body>
</html>