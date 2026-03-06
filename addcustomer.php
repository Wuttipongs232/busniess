<html>

<head>
    <title>User Registration11</title>
</head>

<body>
    <h1>Add Customer</h1>
    <form action="addcustomer.php" method="POST">

        <input type="text" placeholder="Enter Customer ID" name="CustomerID">
        <br><br>
        <input type="text" placeholder="Name" name="Name">
        <br><br>
        <input type="date" placeholder="Birthdate" name="birthdate">
        <br><br>
        <input type="email" placeholder="Email" name="email">
        <br><br>
        <select name="countryCode">
            <option value="AT">ออสเตรีย</option>
            <option value="AU">Australia</option>
            <option value="BD">บังคลาเทศ</option>
            <option value="CN">China</option>
            <option value="FI">Finland</option>
            <option value="GL">Greenland</option>
            <option value="ID">อินเดีย</option>
            <option value="IT">อิตาลี</option>
            <option value="JP">Japan</option>
            <option value="MY">มาเลเชีย</option>
            <option value="PH">ฟิลิปปินส์</option>
            <option value="PK">ปากีสถาน</option>
            <option value="RS">รัสเซีย</option>
            <option value="SG">Singapore</option>
            <option value="TH">ไทย</option>
        </select>
        <br><br>
        <input type="number" placeholder="outststandingDept" name="outstandingDept">
        <br><br>
        <input type="submit">
</body>

</html>

<?php
if (isset($_POST["CustomerID"]) && isset($_POST['Name'])):
    echo "<br>" . $_POST['CustomerID'] . $_POST['Name'] . $_POST['birthdate'] . $_POST['email'] . $_POST['countryCode'] . $_POST['outstandingDept'];

    require 'connect.php';

    $sql = "INSERT INTO customer VALUES (:CustomerID, :Name, :Birthdate, :Email, :CountryCode, :OutstandingDept)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':CustomerID', $_POST['CustomerID']);
    $stmt->bindParam(':Name', $_POST['Name']);
    $stmt->bindParam(':Birthdate', $_POST['birthdate']);
    $stmt->bindParam(':Email', $_POST['email']);
    $stmt->bindParam(':CountryCode', $_POST['countryCode']);
    $stmt->bindParam(':OutstandingDept', $_POST['outstandingDept']);

    if ($stmt->execute()):
        $message = 'Suscessfully add new customer';
    else :
        $message = 'Fail to add new customer';
    endif;
    echo $message;
    $conn = null;
endif;
?>