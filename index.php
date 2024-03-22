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
    <div class="container">
        <h3>Queries</h3>
        <form id="buttonQueries" method="post" action="index.php">
            <div class="input-group mb-3">
                <button class="btn" type="submit" name="query1" id="query1">List All Tables</button>
                &nbsp;&nbsp;&nbsp;
                <button class="btn" type="submit" name="viewAllMovies" id="viewAllMovies">View All Movies</button>
                &nbsp;&nbsp;&nbsp;
                <button class="btn" type="submit" name="viewAllActors" id="viewAllActors">View All Actors</button>
                &nbsp;&nbsp;&nbsp;
                <button class="btn" type="submit" name="query7" id="query7">Youngest and Oldest Awarded Actor</button>
                &nbsp;&nbsp;&nbsp;
                <button class="btn" type="submit" name="query10" id="query10">Top 2 Rated Thriller Movies Shot Exclusively in Boston</button>
                &nbsp;&nbsp;&nbsp;
                <button class="btn" type="submit" name="query12" id="query12">Actors in Both Marvel and Warner Bros Productions</button>
                &nbsp;&nbsp;&nbsp;
                <button class="btn" type="submit" name="query13" id="query13">Motion Pictures with Higher Rating than Average Comedy</button>
                &nbsp;&nbsp;&nbsp;
                <button class="btn" type="submit" name="query14" id="query14">Top 5 Movies with Highest Number of Role Players</button>
                &nbsp;&nbsp;&nbsp;
                <button class="btn" type="submit" name="query15" id="query15">Actors with same birthday</button>
                &nbsp;&nbsp;&nbsp;
            </div>
        </form>
    </div>
    <div class="container">
        <form id="formQueries" method="post" action="index.php">
            <div class="form-group mb-3">
                <!-- <label for="inputParam">Input 1 parameter</label> -->
                <input type="text" class="form-control" placeholder="Enter your parameter" name="inputParam" id="inputParam" required>
                <button class="btn" type="submit" name="query2" id="query2">Search MP by name</button>
                &nbsp;&nbsp;&nbsp;
                <button class="btn" type="submit" name="query3" id="query3">Find Movies liked by user</button>
                &nbsp;&nbsp;&nbsp;
                <button class="btn" type="submit" name="query4" id="query4">Search MP by shooting country</button>
                &nbsp;&nbsp;&nbsp;
                <button class="btn" type="submit" name="query5" id="query5">List Directors of Series by zip</button>
                &nbsp;&nbsp;&nbsp;
                <button class="btn" type="submit" name="query6" id="query6">Find People receiving more than k awards</button>
                &nbsp;&nbsp;&nbsp;
            </div>
        </form>
        <form id="formQueries2" method="post" action="index.php">
            <div class="input-group">
                <!-- <label for="inputParam1">Input 2 parameters</label> -->
                <input type="text" class="form-control" placeholder="Enter parameter X" name="inputParamX" id="inputParamX" required>
                <input type="text" class="form-control" placeholder="Enter parameter Y" name="inputParamY" id="inputParamY" required>
            </div>
            <div class="form-group mb-3">
                <button class="btn" type="submit" name="query8" id="query8">Find USA Producers with boc >= X and budget <= Y</button>
                &nbsp;&nbsp;&nbsp;
                <button class="btn" type="submit" name="query9" id="query9">List People with Multiple Roles in a High-Rating Movie</button>
                &nbsp;&nbsp;&nbsp;
                <button class="btn" type="submit" name="query11" id="query11">Movies with > X Likes by Users < Y Age</button>
                &nbsp;&nbsp;&nbsp;
            </div>
        </form>
    </div>
    <div class="container">
        <form id="usersLikingMovies" method="post" action="index.php">
        <h3>Like movie</h3>
        <div class="input-group mb-3">
            <input type="email" class="form-control" id="uemail" name="uemail" placeholder="Enter your email" required><br>
            <input type="text" class="form-control" id="mpid" name="mpid" placeholder="Enter movie id" required><br>
            <button type="submit" class="btn btn-primary" name="likeMovie" id="likeMovie">Like</button>
        </div>
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

        // View All Movies
        if(isset($_POST['viewAllMovies']))
        {
            echo "<div class='container'>";
            echo "<h2> All Movies </h2>";
            echo "<table class='table table-md table-bordered'>";
            echo "<thead class='thead-dark' style='text-align: center'>";

            echo "<tr><th class='col-md-2'>ID</th>
                <th class='col-md-2'>Name</th>
                <th class='col-md-2'>Rating</th>
                <th class='col-md-2'>Production</th>
                <th class='col-md-2'>Budget</th>
                <th class='col-md-2'>Boxoffice collection</th>
                </tr></thead>";

            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $stmt = $conn->prepare("SELECT mp.id, mp.name, mp.rating, mp.production, mp.budget, Movie.boxoffice_collection
                FROM Movie JOIN MotionPicture mp ON Movie.mpid = mp.id");
                $stmt->execute();

                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

                foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
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
    
        // View All Actors
        if(isset($_POST['viewAllActors']))
        {
            echo "<div class='container'>";
            echo "<h2> All Actors </h2>";
            echo "<table class='table table-md table-bordered'>";
            echo "<thead class='thead-dark' style='text-align: center'>";

            echo "<tr><th class='col-md-2'>ID</th>
                <th class='col-md-2'>Name</th>
                <th class='col-md-2'>Nationality</th>
                <th class='col-md-2'>Date of birth</th>
                <th class='col-md-2'>Gender</th>
                </tr></thead>";

            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $stmt = $conn->prepare("SELECT DISTINCT p.id, p.name, p.nationality, p.dob, p.gender
                FROM People p JOIN Role r ON p.id = r.pid WHERE r.role_name = 'actor'");
                $stmt->execute();

                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

                foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
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

        // Like Movie
        if(isset($_POST['likeMovie'])) 
        {
            $uemail = $_POST['uemail'];
            $mpid = $_POST['mpid'];

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
                    $stmt3 = $conn->prepare("INSERT INTO Likes VALUES (:mpid,:uemail)");
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

        // Query 1: List all the tables in the database.
        if(isset($_POST['query1']))
        {
            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare("show tables;");
                $stmt->execute();
                echo "<div class='container'>";
                echo "<h1> All Tables </h1>";
                echo "<p>";
                $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
                foreach($tables as $table) {
                    echo "$table<br>";
                }
                echo "</p>";
                echo "</div>";
            }
            catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            $conn = null;
        }


        // Query 2: Search Motion Picture by Motion picture name (parameterized). 
        // List the movie name, rating, production and budget.
        if(isset($_POST['query2']))
        {
            $mpName = $_POST["inputParam"]; 

            echo "<div class='container'>";
            echo "<h2> Search Result </h2>";
            echo "<table class='table table-md table-bordered'>";
            echo "<thead class='thead-dark' style='text-align: center'>";
            echo "<tr><th class='col-md-2'>Name</th>
                <th class='col-md-2'>Rating</th>
                <th class='col-md-2'>Production</th>
                <th class='col-md-2'>Budget</th>
                </tr></thead>";

            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $stmt = $conn->prepare("SELECT name, rating, production, budget FROM MotionPicture where name='$mpName'");
                $stmt->execute();

                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

                foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
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
    
        // Query 3: Find the movies that have been liked by a specific user’s email (parameterized). 
        // List the movie name, rating, production and budget.
        if(isset($_POST['query3']))
        {
            $uemail = $_POST["inputParam"]; 

            echo "<div class='container'>";
            echo "<h2> Movies liked by $uemail </h2>";
            echo "<table class='table table-md table-bordered'>";
            echo "<thead class='thead-dark' style='text-align: center'>";
            echo "<tr><th class='col-md-2'>Name</th>
                <th class='col-md-2'>Rating</th>
                <th class='col-md-2'>Production</th>
                <th class='col-md-2'>Budget</th>
                </tr></thead>";

            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $stmt = $conn->prepare("SELECT mp.name, mp.rating, mp.production, mp.budget
                FROM Likes l
                JOIN Movie m ON l.mpid = m.mpid
                JOIN MotionPicture mp ON m.mpid = mp.id
                WHERE l.uemail = '$uemail'
                ");
                $stmt->execute();

                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

                foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
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

        // Query 4: Search motion pictures by their shooting location country (parameterized). 
        // List only the motion picture names without any duplicates.
        if(isset($_POST['query4']))
        {
            $country = $_POST["inputParam"]; 

            echo "<div class='container'>";
            echo "<h2> Motion Pictures shot in $country </h2>";
            echo "<table class='table table-md table-bordered'>";
            echo "<thead class='thead-dark' style='text-align: center'>";
            echo "<tr><th class='col-md-2'>Name</th></tr></thead>";

            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $stmt = $conn->prepare("SELECT DISTINCT mp.name
                FROM MotionPicture mp
                JOIN Location l ON mp.id = l.mpid
                WHERE l.country = '$country'
                ");
                $stmt->execute();

                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

                foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
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

        // Query 5: List all directors who have directed TV series shot in a specific zip code (parameterized). 
        // List the director name and TV series name only without duplicates.
        if(isset($_POST['query5']))
        {
            $zip = $_POST["inputParam"]; 

            echo "<div class='container'>";
            echo "<h2> Directors of TV Series shot in $zip </h2>";
            echo "<table class='table table-md table-bordered'>";
            echo "<thead class='thead-dark' style='text-align: center'>";
            echo "<tr><th class='col-md-2'>Director</th>
                <th class='col-md-2'>TV Series</th>
                </tr></thead>";

            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $stmt = $conn->prepare("SELECT DISTINCT p.name AS director, mp.name AS series
                FROM Role r
                JOIN People p ON r.pid = p.id
                JOIN MotionPicture mp ON r.mpid = mp.id
                JOIN Series s ON mp.id = s.mpid
                JOIN Location l ON r.mpid = l.mpid
                WHERE l.zip = '$zip' AND r.role_name = 'director'
                ");
                $stmt->execute();

                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

                foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
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

        // Query 6: Find the people who have received more than “k” (parameterized) awards for a single motion picture in the same year. 
        // List the person name, motion picture name, award year and award count.
        if(isset($_POST['query6']))
        {
            $k = $_POST["inputParam"]; 

            echo "<div class='container'>";
            echo "<h2> People receiving more than $k awards</h2>";
            echo "<table class='table table-md table-bordered'>";
            echo "<thead class='thead-dark' style='text-align: center'>";
            echo "<tr><th class='col-md-2'>Person</th>
                <th class='col-md-2'>Motion Picture</th>
                <th class='col-md-2'>Award Year</th>
                <th class='col-md-2'>Award Count</th>
                </tr></thead>";

            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $stmt = $conn->prepare("SELECT p.name AS person, mp.name AS motion_picture, a.award_year, COUNT(a.award_name) AS award_count
                FROM Award a
                JOIN People p ON a.pid = p.id
                JOIN MotionPicture mp ON a.mpid = mp.id
                GROUP BY a.mpid, a.award_year
                HAVING award_count > $k
                ");
                $stmt->execute();

                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

                foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
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

        // Query 7: Find the youngest and oldest actors to win at least one award. 
        // List the actor names and their age (at the time they received the award). 
        // The age should be computed from the person’s date of birth to the award winning year only. 
        // In case of a tie, list all of them.
        if(isset($_POST['query7']))
        {
            echo "<div class='container'>";
            echo "<h2> Youngest and Oldest Awarded Actor </h2>";
            echo "<table class='table table-md table-bordered'>";
            echo "<thead class='thead-dark' style='text-align: center'>";
            echo "<tr><th class='col-md-2'>Name</th>
                <th class='col-md-2'>Age</th>
                </tr></thead>";

            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $stmt = $conn->prepare("SELECT DISTINCT p.name, YEAR(a.award_year) - YEAR(p.dob) AS age
                FROM People p
                JOIN Award a ON p.id = a.pid
                AND YEAR(a.award_year) - YEAR(p.dob) IN (
                    SELECT MAX(YEAR(a.award_year) - YEAR(p.dob)) AS max_age
                    FROM People p JOIN Award a ON p.id = a.pid WHERE a.award_name = 'Best Actor'
                    UNION 
                    SELECT MIN(YEAR(a.award_year) - YEAR(p.dob)) AS min_age
                    FROM People p JOIN Award a ON p.id = a.pid WHERE a.award_name = 'Best Actor'
                )
                ");
                $stmt->execute();

                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

                foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
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

        // Query 8: Find the American Producers who had a box office collection of more than or equal to “X” (parameterized) with a budget less than or equal to “Y” (parameterized). 
        // List the producer name, movie name, box office collection and budget.
        if(isset($_POST['query8']))
        {
            $X = $_POST["inputParamX"]; 
            $Y = $_POST["inputParamY"];

            echo "<div class='container'>";
            echo "<h2> American Producers with >= $X boc and <= $Y budget </h2>";
            echo "<table class='table table-md table-bordered'>";
            echo "<thead class='thead-dark' style='text-align: center'>";
            echo "<tr><th class='col-md-2'>Producer</th>
                <th class='col-md-2'>Movie</th>
                <th class='col-md-2'>Box office collection</th>
                <th class='col-md-2'>Budget</th>
                </tr></thead>";

            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $stmt = $conn->prepare("SELECT p.name AS producer, mp.name AS movie, m.boxoffice_collection, mp.budget
                FROM Role r
                JOIN People p ON r.pid = p.id
                JOIN MotionPicture mp ON r.mpid = mp.id
                JOIN Movie m ON r.mpid = m.mpid
                WHERE r.role_name = 'producer' AND p.nationality = 'USA' AND m.boxoffice_collection >= $X AND mp.budget <= $Y
                ");
                $stmt->execute();

                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

                foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
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

        //Query 9: List the people who have played multiple roles in a motion picture where the rating is more
        //than “X” (parameterized). List the person’s name, motion picture name and count of number
        // of roles for that particular motion picture.

        if(isset($_POST['query9']))
        {
            $X = $_POST["inputParamX"]; // This is a placeholder for the actual input name for parameter X

            echo "<div class='container'>";
            echo "<h2> People with multiple roles in movies rated over $X </h2>";
            echo "<table class='table table-md table-bordered'>";
            echo "<thead class='thead-dark' style='text-align: center'>";
            echo "<tr><th class='col-md-4'>Person</th>
                    <th class='col-md-4'>Movie</th>
                    <th class='col-md-4'>Number of Roles</th>
                  </tr></thead>";
        
            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
                $stmt = $conn->prepare("SELECT p.name AS person, mp.name AS movie, COUNT(r.role_name) AS num_roles
                    FROM People p
                    JOIN Role r ON p.id = r.pid
                    JOIN MotionPicture mp ON r.mpid = mp.id
                    WHERE mp.rating > :X
                    GROUP BY p.id, mp.id
                    HAVING COUNT(r.role_name) > 1
                ");
                $stmt->bindParam(':X', $X);
                $stmt->execute();
        
                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        
                foreach (new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k => $v) {
                    echo $v;
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            echo "</table>";
            echo "</div>";
            $conn = null;
        }

        //Query 10: Find the top 2 rates thriller movies (genre is thriller) that were shot exclusively in Boston.
        //This means that the movie cannot have any other shooting location. List the movie names and their ratings.

        if(isset($_POST['query10']))
        {
            // $genre = $_POST["inputGenre"];
            // $city = $_POST["inputCity"];

            echo "<div class='container'>";
            echo "<h2> Top 2 rated thriller movies shot exclusively in Boston </h2>";
            echo "<table class='table table-md table-bordered'>";
            echo "<thead class='thead-dark' style='text-align: center'>";
            echo "<tr><th class='col-md-6'>Movie</th>
                    <th class='col-md-6'>Rating</th>
                </tr></thead>";

            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $stmt = $conn->prepare("SELECT mp.name AS movie, mp.rating
                    FROM MotionPicture mp
                    JOIN Genre g ON mp.id = g.mpid
                    JOIN Location l ON mp.id = l.mpid
                    WHERE g.genre_name = 'Thriller' AND l.city = 'Boston'
                    GROUP BY mp.id
                    HAVING COUNT(l.city) = 1
                    ORDER BY mp.rating DESC
                    LIMIT 2
                ");
                // $stmt->bindParam(':genre', 'Thriller');
                // $stmt->bindParam(':city', 'Boston');
                $stmt->execute();

                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

                foreach (new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k => $v) {
                    echo $v;
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            echo "</table>";
            echo "</div>";
            $conn = null;
        }
        //Query 11: Find all the movies with more than “X” (parameterized) likes by users of age less than “Y” 
        //(parameterized). List the movie names and the number of likes by those age-group users.

        if(isset($_POST['query11']))
        {
            $X = $_POST["inputParamX"]; // Number of likes
            $Y = $_POST["inputParamY"]; // Age threshold
        
            echo "<div class='container'>";
            echo "<h2> Movies with more than $X likes by users under age $Y </h2>";
            echo "<table class='table table-md table-bordered'>";
            echo "<thead class='thead-dark' style='text-align: center'>";
            echo "<tr><th>Movie</th><th>Number of Likes</th></tr></thead>";
        
            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
                $stmt = $conn->prepare("SELECT m.name, COUNT(l.uemail) AS likes_count
                    FROM Movie m
                    JOIN Likes l ON m.mpid = l.mpid
                    JOIN User u ON l.uemail = u.email
                    WHERE u.age < :Y
                    GROUP BY m.name
                    HAVING COUNT(l.uemail) > :X");
                $stmt->bindParam(':X', $X, PDO::PARAM_INT);
                $stmt->bindParam(':Y', $Y, PDO::PARAM_INT);
                $stmt->execute();
        
                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        
                foreach (new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k => $v) {
                    echo $v;
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            echo "</table>";
            echo "</div>";
            $conn = null;
        }
        //Query 12: Find the actors who have played a role in both “Marvel” and “Warner Bros” productions.
        //List the actor names and the corresponding motion picture names.

        if(isset($_POST['query12']))
        {
            echo "<div class='container'>";
            echo "<h2> Actors who played roles in both Marvel and Warner Bros productions </h2>";
            echo "<table class='table table-md table-bordered'>";
            echo "<thead class='thead-dark' style='text-align: center'>";
            echo "<tr><th>Actor</th><th>Motion Picture</th></tr></thead>";
        
            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
                $stmt = $conn->prepare("
                    SELECT DISTINCT p.name AS actor, mp.name AS motion_picture
                    FROM People p
                    JOIN Role r ON p.id = r.pid
                    JOIN MotionPicture mp ON r.mpid = mp.id
                    WHERE p.id IN (
                        SELECT pid
                        FROM Role
                        JOIN MotionPicture ON Role.mpid = MotionPicture.id
                        WHERE production IN ('Marvel', 'Warner Bros')
                        GROUP BY pid
                        HAVING COUNT(DISTINCT production) > 1
                    )
                ");
                $stmt->execute();
        
                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        
                foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
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

        //Query 13: Find the motion pictures that have a higher rating than the average rating of all comedy
        //(genre) motion pictures. Show the names and ratings in descending order of ratings.

        if(isset($_POST['query13']))
        {
            echo "<div class='container'>";
            echo "<h2> Motion pictures with a higher rating than the average rating of all comedy movies </h2>";
            echo "<table class='table table-md table-bordered'>";
            echo "<thead class='thead-dark' style='text-align: center'>";
            echo "<tr><th>Movie</th><th>Rating</th></tr></thead>";
        
            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
                $stmt = $conn->prepare("SELECT mp.name, mp.rating
                    FROM MotionPicture mp
                    WHERE mp.rating > (
                        SELECT AVG(mp2.rating)
                        FROM MotionPicture mp2
                        JOIN Genre g ON mp2.id = g.mpid
                        WHERE g.genre_name = 'Comedy'
                    )
                    ORDER BY mp.rating DESC");
                $stmt->execute();
        
                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        
                foreach (new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k => $v) {
                    echo $v;
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            echo "</table>";
            echo "</div>";
            $conn = null;
        }

        //Query 14: Find the top 5 movies with the highest number of people playing a role in that movie. Show
        //the movie name, people count and role count for the movies.

        if(isset($_POST['query14']))
        {
            echo "<div class='container'>";
            echo "<h2> Top 5 movies with the highest number of role players </h2>";
            echo "<table class='table table-md table-bordered'>";
            echo "<thead class='thead-dark' style='text-align: center'>";
            echo "<tr><th>Movie</th><th>People Count</th><th>Role Count</th></tr></thead>";
        
            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
                $stmt = $conn->prepare("
                    SELECT mp.name AS movie, COUNT(DISTINCT p.id) AS people_count, COUNT(r.role_name) AS role_count
                    FROM MotionPicture mp
                    JOIN Role r ON mp.id = r.mpid
                    JOIN People p ON r.pid = p.id
                    GROUP BY mp.id
                    ORDER BY people_count DESC, role_count DESC
                    LIMIT 5
                ");
                $stmt->execute();
        
                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        
                foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
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

        // Query 15: Find actors who share the same birthday. List the actor names (actor 1, actor 2) and their common birthday.
        if(isset($_POST['query15']))
        {
            echo "<div class='container'>";
            echo "<h2> Actors who share the same birthday </h2>";
            echo "<table class='table table-md table-bordered'>";
            echo "<thead class='thead-dark' style='text-align: center'>";
            echo "<tr><th class='col-md-2'>Actor1</th>
                <th class='col-md-2'>Actor2</th>
                <th class='col-md-2'>Birthday</th>
                </tr></thead>";

            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $stmt = $conn->prepare("SELECT DISTINCT p1.name AS actor1, p2.name AS actor2, p1.dob AS birthday
                FROM People p1
                JOIN People p2 ON p1.dob = p2.dob AND p1.id < p2.id
                JOIN Role r1 ON p1.id = r1.pid
                JOIN Role r2 ON p2.id = r2.pid
                WHERE r1.role_name = 'actor' AND r2.role_name = 'actor' AND r1.pid < r2.pid
                ");
                $stmt->execute();

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


        ?>
</body>
</html>
