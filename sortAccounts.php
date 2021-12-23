<?php ob_start(); ?>
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
            <div class="css-marginbottom-l">
                <h1 class="title yellow">
                    Sort the people
                </h1>

                <?php
                    
                    include "assets/db/connection.php";
                    include "assets/function/functions.php";
                    $conn = makeConnectionWithDatabase();
                    $AccountId = (int)$_POST["AccountId"];

                    //Check if there is a next person
                    $getsql = "SELECT AccountId FROM account ORDER BY AccountId DESC LIMIT 1;";
                    $highestAccount = getQuery($conn, $getsql);
                    $highestAccountId = (int)$highestAccount[0]["AccountId"];                
                    if ($AccountId > $highestAccountId)
                    {
                        header("Location: http://thibovanderkam.be/end.php");
                        exit;
                    }
                    
                    //Get user data
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
                        OutputUserData($firstname, $lastname, $age, $gender, $favouritefood);
                    ?>
                <p>  
            </div>

            <form method="POST" action="showSorts.php">
                <?php echo '<input type="hidden" id="AcountId" name="AccountId" value=' . $AccountId . '>' ?>              
                <input type="submit" value="Gryffindor" name="house" class="submit-button form-element yellow">
                <input type="submit" value="Slytherin" name="house" class="submit-button form-element yellow">
                <input type="submit" value="Hufflepuff" name="house" class="submit-button form-element yellow">
                <input type="submit" value="Ravenclaw" name="house" class="submit-button form-element yellow">                  
            </form>
        </div>
    </body>
</html>
<?php ob_end(); ?>