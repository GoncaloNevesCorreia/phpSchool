<?php
    $details;

    if (isset($_POST["classRegistration"])) {
        if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["time"]) && isset($_POST["classDetails"]) && isset($_POST["gender"])) {
            if (!empty($_POST["name"]) && !empty($_POST["email"]) && !empty($_POST["time"]) && !empty($_POST["classDetails"]) && !empty($_POST["gender"])) {
                $details = [$_POST["name"], $_POST["email"], $_POST["time"], $_POST["classDetails"], $_POST["gender"]];
            }
        }
    }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>C11 - PHP Form Handling</title>
</head>

<body>
    <section class="registration">
        <h1>Absolute Class Registration</h1>
        <form method="post">
            <label>Name:</label>
            <input type="text" name="name"><br><br>

            <label>E-mail:</label>
            <input type="text" name="email"><br><br>

            <label>Especific Time (10h, 15h, 19h):</label>
            <input type="text" name="time"><br><br>

            <label>Class Details:</label>
            <textarea name="classDetails" cols="30" rows="10"></textarea><br><br>

            <label>Gender:</label><br>
            <label>Male</label>
            <input type="radio" name="gender" value="male">
            <label>Female</label>
            <input type="radio" name="gender" value="female"><br><br>

            <input type="submit" name="classRegistration" value="Submit">
        </form>

        <div class="solution">
            <h1>Your Given details are as:</h1>
            <?php
                if (isset($details)) {
                    echo "<p> <strong>Name:</strong> {$details[0]}.</p>
                    <p> <strong>E-mail:</strong> {$details[1]}.</p>
                    <p> <strong>Time:</strong> {$details[2]}.</p>
                    <p> <strong>Class Details:</strong> {$details[3]}.</p>
                    <p> <strong>Gender:</strong> {$details[4]}.</p>";
                }
            ?>
        </div>
    </section>

    <section class="reservation">
        <h1>Reservation Request</h1>
        
        <div class="info">
            <label>Arrival date:</label>
            <input type="text" name="arrival">
            
            <label>Nights:</label>
            <input type="text" name="nights">

            <label>Adults:</label>
            <input type="number" name="adults" min="1">

            <label>Children:</label>
            <input type="number" name="children" min="1">
        </div>


    </section>


</body>

</html>