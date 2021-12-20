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
            <h1 id="title">
                    Add account
            </h1>
            <div class="css-form">
                <form method="GET" action="addAccountToDB.php">

                    <div class="form-element">
                        <label for="account-firstname">
                            First name
                        </label>
                        <br>
                        <input type="text" name="account-firstname" id="account-firstname" required>
                    </div>

                    <div class="form-element">
                        <label for="account-lastname">
                            Last name
                        </label>
                        <br>
                        <input type="text" name="account-lastname" id="account-lastname" required>
                    </div>

                    <div class="form-element">
                        <label for="account-age">
                            Age
                        </label>
                        <br>
                        <input type="number" name="account-age" id="account-age" required>
                    </div>

                    <div class="form-element">
                        <input type="radio" value="male" name="account-gender" id="account-gender-male">
                        <label for="account-gender-male">Male</label>
                        <br>
                        <input type="radio" value="female" name="account-gender" id="account-gender-female">
                        <label for="account-gender-female">Female</label>
                        <br>
                        <input type="radio" value="other" name="account-gender" id="account-gender-other">
                        <label for="account-gender-other">Other</label>
                    </div>

                    <div class="form-element">
                        <label for="account-favouritefood">
                            Favourite food
                        </label>
                        <br>
                        <input type="text" name="account-favouritefood" id="account-favouritefood" required>
                    </div>
    
                    <input type="submit" value="submit" class="submit-button">
                    <br>
                </form>
                
            </div>
        </div>
    </body>
</html>