<html>

<head>
    <title>User Registration11</title>
</head>

<body>
    <h1>Add Customer</h1>
    <form action="addcountry.php" method="POST">
        <label for="">CountryCode:</label>
        <input type="text" name="CountryCode">
        <br><br>
        <label for="">CountryName:</label>
        <input type="text" name="CountryName">

        <input type="submit">

    </form>
</body>

</html>

<?php
if (isset($_POST["CountryCode"]) && isset($_POST['CountryName'])):
    echo "<br>" . $_POST['CountryCode'] . $_POST['CountryName'];

    require 'connect.php';

    $sql = "INSERT INTO country VALUES (:CountryCode, :CountryName)";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':CountryCode', $_POST['CountryCode']);
    $stmt->bindParam(':CountryName', $_POST['CountryName']);

    if ($stmt->execute()):
        $message = 'Suscessfully add new customer';
    else :
        $message = 'Fail to add new customer';
    endif;
    echo $message;
    $conn = null;
endif;
?>