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
    
    function POST_isset(...$arr_input) {
        foreach ($arr_input as $value) {
            if(!isset($_POST[$value])) {
                return false;
            }
        }
        return true;
    }


    $arrivalErr = $nightsErr = $adultsErr = $childrenErr = $roomErr = $bedErr = $nameErr = $emailErr = $phoneErr = "";
    $arrival = $nights = $adults = $children = $room = $bed = $name = $email = $phone = "";

    if (isset($_POST["form-1"])) {
        if (POST_isset("arrival", "nights", "adults", "children", "room", "bed", "name", "email", "phone")) {
            
            if (!empty($_POST["arrival"])) {
                $arrival = clean_input($_POST["arrival"]);
            } else {
                $arrivalErr = "Arrival Date is Inválid.";
            }

            if (!empty($_POST["nights"])) {
                $nights = clean_input($_POST["nights"]);
            } else {
                $nightsErr = "";
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
                        <input type="text" id="arrival" name="arrival" placeholder="Arrival data...">
                    </div>
                    <div class="col-25">
                        <div class="warning">
                            <span></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="nights">Nights: </label>
                    </div>
                    <div class="col-50">
                        <input type="number" id="nights" name="nights" placeholder="Number of nights...">
                    </div>
                    <div class="col-25">
                        <div class="warning">
                            <span>Nights must be a number.</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="adults">Adults: </label>
                    </div>
                    <div class="col-50">
                        <select id="adults" name="adults">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>
                    <div class="col-25">
                        <div class="warning">
                            <span>Adults must be a number.</span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="children">Children: </label>
                    </div>
                    <div class="col-50">
                        <select id="children" name="children">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>
                    <div class="col-25">
                        <div class="warning">
                            <span>Children must be a number.</span>
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
                            <span>Select a room type.</span>
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
                            <span>Select a bed type.</span>
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
                        <input type="text" id="name" name="name" placeholder="Insert full name...">
                    </div>
                    <div class="col-25">
                        <div class="warning">
                            <span>Name is required.</span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="email">Email: </label>
                    </div>
                    <div class="col-50">
                        <input type="email" id="email" name="email" placeholder="Insert email...">
                    </div>
                    <div class="col-25">
                        <div class="warning">
                            <span>Email address is invalid.</span>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-25">
                        <label for="phone">Phone: </label>
                    </div>
                    <div class="col-50">
                        <input type="number" id="phone" name="phone" placeholder="Insert phone number...">
                    </div>
                    <div class="col-25">
                        <div class="warning">
                            <span>Phone number is invalid.</span>
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