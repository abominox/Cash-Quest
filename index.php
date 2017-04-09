<!DOCTYPE html>
<html>
<script language="javascript">
    function findQuests() {
        var x = document.getElementById("locationForm");
        var location = x.elements[0].value;
        /*Send location to search on backend*/
        var y = document.getElementById('pageTitle');
        y.innerHTML = location;
    }
</script>
<head>
    <link href="style.css" rel="stylesheet" type="text/css">
    <script src="scripts.js"></script>
</head>
<body>
    <div id="header">
        <h1 id="headTitle">Find a Quest!</h1>
        <div id="topButtons">
            <button type="button" onclick="location.href='php/register.php';" class="button">New user</button>
            <button type="button" onclick="alert('Hello world!')" class="button">Sign in</button>
        </div>
    </div>
    <div id="myModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close">&times;</span>
                <h2>Create an account:</h2>
            </div>
            <div class="modal-body">
                <form id="form1">
                    <p class="pargInd">What's your desired username? <input type="text" name="username" id="emailText" class="textField"><br></p>
                    <p class="pargInd">What's your desired password? <input type="text" name="password" id="passwordText" class="textField"><br></p>
                    <p class="pargInd">What's your email? <input type="text" name="email" id="emailText" class="textField"><br></p>
                </form>
            </div>
            <div class="modal-footer">
                <button onclick="myFunction()" class="button" id="doneButton">Create Account</button>
            </div>
            <button type="button" onclick="location.href='html/register.php';" class="button">New user</button>
            <button type="button" onclick="location.href='html/login.html';" class="button">Sign in</button>
        </div>
    </div>
    <div id="locationSection">
        <div id="firstLine">
            <form id="locationForm">
                <p id="locationParag">Location <input type="text" name="location" id="textField"><br></p>
            </form>
        </div>

        <!-- <button onclick="findQuests()" id="findQuestsButton" class="button">Find Quests</button> -->
        <a href="dashboard.html"><button onclick="href='dashboard.html'" id="findQuestsButton" class="button">Find Quests</button></a>
    </div>

    <script>
        function myFunction() {

            var x = document.getElementById("form1");
            var username = x.elements[0].value;
            var password = x.elements[1].value;
            var password = x.elements[2].value;
            createUser();


            function createUser() {
                <?php
                    $submit = strip_tags($_POST['submit']);
                    $username = strtolower(strip_tags($_POST['username']));
                    $password = strip_tags($_POST['password']);
                    $repeatpassword = strip_tags($_POST['repeatpassword']);
                    $email = strip_tags($_POST['email']);
                    $date = date("Y-m-d");
                    if ($submit)
                    {
                        if ($username && $password && $repeatpassword && $email && $date)
                        {
                            if ($password == $repeatpassword)
                            {
                                if (strlen($username) > 25)
                                {
                                    echo "Length of username must not exceed 25 characters!";
                                }
                                if (strlen($email) > 50)
                                {
                                    echo "Length of email address must not exceed 50 characters!";
                                }
                                else
                                {
                                    if (strlen($password) > 25 || strlen($password) < 6)
                                    {
                                        echo "Password must be between 6 and 25 characters!";
                                    }
                                    else
                                    {
                                        //open db
                                        $hostname = "localhost";
                                        $dbloginusername = "hackathon";
                                        $dbloginpassword = "muffin";
                                        $connect = mysql_connect("$hostname", "$dbloginusername", "$dbloginpassword") or die("Could not connect to MySQL database at address " . $hostname . " using provided login credentials!");
                                        mysql_select_db("hackathon");
                                        //ensure entered username does not already exist in db
                                        $namecheck = mysql_query("SELECT username FROM User WHERE username = '$username'");
                                        $count = mysql_num_rows($namecheck);
                                        if ($count > 0)
                                        {
                                            die("An account with this username already exists, please enter a new username.");
                                        }
                                        //hashing password using bcrypt after successfully registering user
                                        $password = password_hash($password, PASSWORD_DEFAULT);
                                        //send data to db
                                        $queryreg = mysql_query("INSERT INTO User(id, username, password, email) VALUES ('', '$username','$password', '$email')");
                                        die("You have successfully registered for CHANGE NAME OF PROJECT HERE! <a href='login.html'>Return to login page.</a>");
                                    }
                                }
                            }
                            else
                            {
                                echo "Your passwords do not match!";
                            }
                        }
                        else
                        {
                            echo "Please fill in <strong>all</strong> required fields.";
                        }
                    }
                ?>
            }

        }

        // Get the modal
        var modal = document.getElementById('myModal');

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }


        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>
<footer id="footer">
    <p>Post a job and help college students financially <br>or if you are a student, search your local area for quests!</p>
</footer>
</html>
