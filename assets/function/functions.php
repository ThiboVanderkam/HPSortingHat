<?php
    function OutputUserData($firstname, $lastname, $age, $gender, $favouritefood) {
        echo "Name:<br>" . $firstname[0]["Firstname"] . " " . $lastname[0]["Lastname"] . "<br><br>";
        echo "Age:<br>" . $age[0]["Age"] . "<br><br>";
        echo "Gender:<br>" . $gender[0]["Gender"] . "<br><br>";
        echo "Favourite food:<br>" . $favouritefood[0]["Favouritefood"] . "<br><br>";
    }

    function OutputResults($GryffindorVotes, $SlytherinVotes, $HufflepuffVotes, $RavenclawVotes) {
        $GryffindorPercentage = round($GryffindorVotes/($GryffindorVotes + $SlytherinVotes + $HufflepuffVotes + $RavenclawVotes) * 100, 0) . "%";
        $SlytherinPercentage = round($SlytherinVotes/($GryffindorVotes + $SlytherinVotes + $HufflepuffVotes + $RavenclawVotes) * 100, 0) . "%";
        $HufflepuffPercentage = round($HufflepuffVotes/($GryffindorVotes + $SlytherinVotes + $HufflepuffVotes + $RavenclawVotes) * 100, 0) . "%";
        $RavenclawPercentage = round($RavenclawVotes/($GryffindorVotes + $SlytherinVotes + $HufflepuffVotes + $RavenclawVotes) * 100, 0) . "%";
        
        echo "Gryffindor:<br>" . $GryffindorPercentage . "<br><br>";
        echo "Slytherin:<br>" . $SlytherinPercentage . "<br><br>";
        echo "Hufflepuff:<br>" . $HufflepuffPercentage . "<br><br>";
        echo "Ravenclaw:<br>" . $RavenclawPercentage . "<br><br>";
    }

?>