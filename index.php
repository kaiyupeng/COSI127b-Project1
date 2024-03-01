<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Bootstrap JS dependencies -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COSI 127b</title>
</head>
<body>
    <div class="container">
        <h1 style="text-align:center">COSI 127b</h1><br>
        <h3 style="text-align:center">Connecting Front-End to MySQL DB</h3><br>
    </div>
    <!-- <div class="container">
        <form id="ageLimitForm" method="post" action="index.php">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Enter minimum age" name="inputAge" id="inputAge">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit" name="submitted" id="button-addon2">Query</button>
                </div>
            </div>
        </form>
    </div> -->
    <div class="container">
        <form id="basicQueries" method="post" action="index.php">
            <div class="input-group mb-3">
                <button class="btn" type="submit" name="viewAllMovies" id="viewAllMovies">View All Movies</button>
                &nbsp;&nbsp;&nbsp;
                <button class="btn" type="submit" name="viewAllActors" id="viewAllActors">View All Actors</button>
            </div>
        </form>
    </div>
    <div class="container">
        <form id="usersLikingMovies" method="post" action="index.php">
        <div class="form-group">
            <label for="uemail">Email address</label>
            <input type="email" class="form-control" id="uemail" name="uemail" placeholder="Enter your email" required>
        </div>
        <div class="form-group">
            <label for="mpid">Movie id</label>
            <input type="text" class="form-control" id="mpid" name="mpid" placeholder="Enter movie id" required>
        </div>
        <button type="submit" class="btn btn-primary" name="likeMovie" id="likeMovie">Like</button>
        </form>
    </div>
    <br>

    <!-- <div class="container">
        <h1>Guests</h1>
        <?php
        // we want to check if the submit button has been clicked (in our case, it is named Query)
        if(isset($_POST['submitted']))
        {
            // set age limit to whatever input we get
            // ideally, we should do more validation to check for numbers, etc. 
           $ageLimit = $_POST["inputAge"]; 
        }
        else
        {
            // if the button was not clicked, we can simply set age limit to 0 
            // in this case, we will return everything
            $ageLimit = 0;
        }

        // we will now create a table from PHP side 
        echo "<table class='table table-md table-bordered'>";
        echo "<thead class='thead-dark' style='text-align: center'>";

        // initialize table headers
        // YOU WILL NEED TO CHANGE THIS DEPENDING ON TABLE YOU QUERY OR THE COLUMNS YOU RETURN
         echo "<tr><th class='col-md-2'>Firstname</th><th class='col-md-2'>Lastname</th></tr></thead>";

        // generic table builder. It will automatically build table data rows irrespective of result
        class TableRows extends RecursiveIteratorIterator {
            function __construct($it) {
                parent::__construct($it, self::LEAVES_ONLY);
            }

            function current() {
                return "<td style='text-align:center'>" . parent::current(). "</td>";
            }

            function beginChildren() {
                echo "<tr>";
            }

            function endChildren() {
                echo "</tr>" . "\n";
            }
        }

        // SQL CONNECTIONS
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "COSI127b";

        try {
            // We will use PDO to connect to MySQL DB. This part need not be 
            // replicated if we are having multiple queries. 
            // initialize connection and set attributes for errors/exceptions
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // prepare statement for executions. This part needs to change for every query
            $stmt = $conn->prepare("SELECT first_name, last_name FROM guests where age>=$ageLimit");

            // execute statement
            $stmt->execute();

            // set the resulting array to associative. 
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

            // for each row that we fetched, use the iterator to build a table row on front-end
            foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
                echo $v;
            }
        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        echo "</table>";
        // destroy our connection
        $conn = null;
    
        ?>

    </div> -->

        <?php
        // Click "View All Movies"
        if(isset($_POST['viewAllMovies']))
        {
            class MovieRows extends RecursiveIteratorIterator {
                function __construct($it) {
                    parent::__construct($it, self::LEAVES_ONLY);
                }

                function current() {
                    return "<td style='text-align:center'>" . parent::current(). "</td>";
                }

                function beginChildren() {
                    echo "<tr>";
                }

                function endChildren() {
                    echo "</tr>" . "\n";
                }
            }

            // SQL CONNECTIONS
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "COSI127b";

            try {
                
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $stmt = $conn->prepare("SELECT mp.id, mp.name, mp.rating, mp.production, mp.budget, Movie.boxoffice_collection
                FROM Movie JOIN MotionPicture mp ON Movie.mpid = mp.id");

                $stmt->execute();
                
                echo "<div class='container'>";
                echo "<h1> Movies </h1>";
                echo "<table class='table table-md table-bordered'>";
                echo "<thead class='thead-dark' style='text-align: center'>";

                echo "<tr><th class='col-md-2'>ID</th>
                <th class='col-md-2'>Name</th>
                <th class='col-md-2'>Rating</th>
                <th class='col-md-2'>Production</th>
                <th class='col-md-2'>Budget</th>
                <th class='col-md-2'>Boxoffice collection</th>
                </tr></thead>";

                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

                foreach(new MovieRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
                    echo $v;
                }
            }
            catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            echo "</table>";
            echo "</div>";
            $conn = null;
        }
    

        // Click "View All Actors"
        if(isset($_POST['viewAllActors']))
        {

            class ActorRows extends RecursiveIteratorIterator {
                function __construct($it) {
                    parent::__construct($it, self::LEAVES_ONLY);
                }

                function current() {
                    return "<td style='text-align:center'>" . parent::current(). "</td>";
                }

                function beginChildren() {
                    echo "<tr>";
                }

                function endChildren() {
                    echo "</tr>" . "\n";
                }
            }

            // SQL CONNECTIONS
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "COSI127b";

            try {
                
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $stmt = $conn->prepare("SELECT DISTINCT p.id, p.name, p.nationality, p.dob, p.gender
                FROM People p JOIN Role r ON p.id = r.pid WHERE r.role_name = 'actor'");

                $stmt->execute();

                echo "<div class='container'>";
                echo "<h1> Actors </h1>";
                echo "<table class='table table-md table-bordered'>";
                echo "<thead class='thead-dark' style='text-align: center'>";

                echo "<tr><th class='col-md-2'>ID</th>
                <th class='col-md-2'>Name</th>
                <th class='col-md-2'>Nationality</th>
                <th class='col-md-2'>Date of birth</th>
                <th class='col-md-2'>Gender</th>
                </tr></thead>";

                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

                foreach(new ActorRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
                    echo $v;
                }
            }
            catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            echo "</table>";
            echo "</div>";
            $conn = null;
        }

        if(isset($_POST['likeMovie'])) 
        {
            $uemail = $_POST['uemail'];
            $mpid = $_POST['mpid'];

            // SQL CONNECTIONS
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "COSI127b";

            try {
                
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // check if user exists
                $stmt1 = $conn->prepare("SELECT email FROM User WHERE email = :uemail");
                $stmt1->bindParam(':uemail', $uemail);
                $stmt1->execute();
                $res1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);

                // check if movie exists
                $stmt2 = $conn->prepare("SELECT mpid FROM Movie WHERE mpid = :mpid");
                $stmt2->bindParam(':mpid', $mpid);
                $stmt2->execute();
                $res2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
                
                echo "<div class='container'>";

                if (empty($res1)) {
                    echo "<p>Please register first!</p>";
                } else if (empty($res2)) {
                    echo "<p>Please enter a valid movie id!</p>";
                } else { // update Likes table
                    $stmt3 = $conn->prepare("INSERT INTO Likes VALUES (:uemail,:mpid)");
                    $stmt3->bindParam(':uemail', $uemail);
                    $stmt3->bindParam(':mpid', $mpid);
                    $stmt3->execute();
                    echo "<p>Successfully liked the movie!</p>";
                }
                
                echo "</div>";

            }
            catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            
            $conn = null;
        }
    
        ?>
</body>
</html>
