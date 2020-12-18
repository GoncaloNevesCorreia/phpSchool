<?php
    $details;

    if (isset($_POST["classRegistration"])) {
        if (POST_isset("name", "email", "time", "classDetails", "gender")) {
            $name = clean_input($_POST["name"]);
            $email = clean_input($_POST["email"]);
            $time = clean_input($_POST["time"]);
            $classDetails = clean_input($_POST["classDetails"]);
            $gender = clean_input($_POST["gender"]);

            $details = [$name, $email, $time, $classDetails, $gender];
        }
   
    }

    function clean_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    function POST_isset($name, $errorMessage) {
        if (isset($_POST[$name])) {

            return ["value" => clean_input($_POST[$name]), 
                    "errorMessage" => ""
                ];
        } else {
            return ["value" => "", 
                    "errorMessage" => $errorMessage
                ];
        }
    }

    function print_error_message($variable) {
        echo (!empty($variable)) ? $variable["errorMessage"] : "";
    }

    function print_value_on_select($variable, $num) {
        echo (!empty($variable)) ? ($variable["value"] == $num) ? "selected" : "" : "";
    }


    
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>C11 - PHP Form Handling</title>
    <link rel="stylesheet" href="css/c11.css">
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




    <?php

    $arrival = $nights = $adults = $children = $room = $bed = $name = $email = $phone = [];

    if (isset($_POST["form-1"])) {
        $arrival = POST_isset("arrival", "Arrival Date is Inválid.");
        $nights = POST_isset("nights", "Nights must be a number.");
        $adults = POST_isset("adults", "Adults must be a number.");
        $children = POST_isset("children", "Children must be a number.");
        $room = POST_isset("room", "Select a room type.");
        $bed = POST_isset("bed", "Select a bed type.");
        $name = POST_isset("name", "Name is required.");
        $email = POST_isset("email", "Email address is invalid.");
        $phone = POST_isset("phone", "Phone number is invalid.");
    }
    ?>

    <section class="container">
        <h1>Reservation Request</h1>
        <form method="POST" id="form-1">
            <div class="fields">
                <div class="title">
                    <span>General Information</span>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="arrival">Arrival Date:</label>
                    </div>
                    <div class="col-50">
                        <input type="text" id="arrival" name="arrival" placeholder="Arrival data..." value="<?php echo (!empty($arrival)) ? $arrival["value"] : "" ?>">
                    </div>
                    <div class="col-25">
                        <div class="warning">
                            <span><?php print_error_message($arrival) ?></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="nights">Nights: </label>
                    </div>
                    <div class="col-50">
                        <input type="number" id="nights" name="nights" placeholder="Number of nights..." value="<?php echo (!empty($nights)) ? $nights["value"] : "" ?>">
                    </div>
                    <div class="col-25">
                        <div class="warning">
                            <span><?php print_error_message($nights) ?></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="adults">Adults: </label>
                    </div>
                    <div class="col-50">
                        <select id="adults" name="adults">
                            <option <?php print_value_on_select($adults, 1); ?> value="1">1</option>
                            <option <?php print_value_on_select($adults, 2); ?> value="2">2</option>
                            <option <?php print_value_on_select($adults, 3); ?> value="3">3</option>
                        </select>
                    </div>
                    <div class="col-25">
                        <div class="warning">
                            <span><?php print_error_message($adults) ?></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="children">Children: </label>
                    </div>
                    <div class="col-50">
                        <select id="children" name="children">
                            <option <?php print_value_on_select($children, 0); ?> value="0">0</option>
                            <option <?php print_value_on_select($children, 1); ?> value="1">1</option>
                            <option <?php print_value_on_select($children, 2); ?> value="2">2</option>
                            <option <?php print_value_on_select($children, 3); ?> value="3">3</option>
                        </select>
                    </div>
                    <div class="col-25">
                        <div class="warning">
                            <span><?php print_error_message($children) ?></span>
                        </div>
                    </div>
                </div>
                
                
            </div>


            <div class="fields">
                <div class="title">
                    <span>Preferences</span>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label>Room type:</label>
                    </div>
                    <div class="col-50">
                        <input type="radio" id="standard" name="room" value="standard">
                        <label for="standard">Standard</label>

                        <input type="radio" id="business" name="room" value="business">
                        <label for="business">Business</label>

                        <input type="radio" id="suite" name="room" value="suite">
                        <label for="suite">Suite</label>
                    </div>
                    <div class="col-25">
                        <div class="warning">
                            <span><?php print_error_message($room) ?></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="">Bed type:</label>
                    </div>
                    <div class="col-50">
                        <input type="radio" id="king" name="bed" value="king">
                        <label for="king">King</label>

                        <input type="radio" id="double" name="bed" value="double">
                        <label for="double">Double Double</label>

                        <input type="checkbox" id="smoking" name="smoking" value="smoking">
                        <label for="smoking">Smoking</label>
                    </div>
                    <div class="col-25">
                        <div class="warning">
                            <span><?php print_error_message($bed) ?></span>
                        </div>
                    </div>
                </div>
                
            </div>

            <div class="fields">
                <div class="title">
                    <span>Contact Information</span>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="name">Name:</label>
                    </div>
                    <div class="col-50">
                        <input type="text" id="name" name="name" placeholder="Insert full name..." value="<?php echo (!empty($name)) ? $name["value"] : "" ?>">
                    </div>
                    <div class="col-25">
                        <div class="warning">
                            <span><?php print_error_message($nights) ?></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="email">Email: </label>
                    </div>
                    <div class="col-50">
                        <input type="email" id="email" name="email" placeholder="Insert email..." value="<?php echo (!empty($email)) ? $email["value"] : "" ?>">
                    </div>
                    <div class="col-25">
                        <div class="warning">
                            <span><?php print_error_message($email) ?></span>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-25">
                        <label for="phone">Phone: </label>
                    </div>
                    <div class="col-50">
                        <input type="number" id="phone" name="phone" placeholder="Insert phone number..." value="<?php echo (!empty($phone)) ? $phone["value"] : "" ?>">
                    </div>
                    <div class="col-25">
                        <div class="warning">
                            <span><?php print_error_message($phone) ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                    <input name="form-1" type="submit" value="Submit Reservation">
                    <button class="btnClear">Clear</button>
                </div>
        </form>
    </section>  


<script>
    const btnClear = document.querySelector(".btnClear");
    btnClear.addEventListener("click", event => {
        event.preventDefault();
        document.querySelector("#form-1").reset();
    });
</script>
</body>

</html>