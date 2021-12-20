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
        <div id="css-mainsection">
            <div id="css-header">
                <h1 id="title">
                    Sort the people
                </h1>

                <?php
                    include "assets/db/connection.php";
                    $conn = makeConnectionWithDatabase();
                    $AccountId = (int)$_GET["AccountId"];

                    $getsql = "SELECT AccountId FROM account ORDER BY AccountId DESC LIMIT 1;";
                    $highestAccount = getQuery($conn, $getsql);
                    $highestAccountId = (int)$highestAccount[0]["AccountId"];
                    if ($AccountId > $highestAccountId)
                    {
                        header("Location: end.php");
                    }

                    $getsql = "SELECT Firstname FROM account WHERE AccountId = $AccountId";
                    $firstname = getQuery($conn, $getsql);
                    $getsql = "SELECT Lastname FROM account WHERE AccountId = $AccountId";
                    $lastname = getQuery($conn, $getsql);
                    $getsql = "SELECT Age FROM account WHERE AccountId = $AccountId";
                    $age = getQuery($conn, $getsql);
                    $getsql = "SELECT Gender FROM account WHERE AccountId = $AccountId";
                    $gender = getQuery($conn, $getsql);
                    $getsql = "SELECT Favouritefood FROM account WHERE AccountId = $AccountId";
                    $favouritefood = getQuery($conn, $getsql);

                    closeConnection($conn);

                    
                    ?>
                    <p class="red attributes">
                    <?php
                    echo "Name:<br>" . $firstname[0]["Firstname"] . " " . $lastname[0]["Lastname"] . "<br><br>";
                    echo "Age:<br>" . $age[0]["Age"] . "<br><br>";
                    echo "Gender:<br>" . $gender[0]["Gender"] . "<br><br>";
                    echo "Favourite food:<br>" . $favouritefood[0]["Favouritefood"] . "<br><br>";
                    ?>
                    <p> 
                    



                
            </div>

            <form method="GET" action="showSorts.php">
                <?php echo '<input type="hidden" id="AcountId" name="AccountId" value=' . $AccountId . '>' ?>              
                <input type="submit" value="Gryffindor" name="house" class="submit-button form-element yellow">
                <input type="submit" value="Slytherin" name="house" class="submit-button form-element yellow">
                <input type="submit" value="Hufflepuff" name="house" class="submit-button form-element yellow">
                <input type="submit" value="Ravenclaw" name="house" class="submit-button form-element yellow">                  
            </form>
        </div>
    </body>
</html>