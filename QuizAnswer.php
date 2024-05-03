<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <script src="bar.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="c++.css">
</head>

<body>
    <div class="topbar">
        <div aria-label="breadcrumb">
            <ol class="breadcrumb" style="background:linear-gradient(to right,rgb(33, 28, 144),rgb(222, 222, 222))">
                <li class="breadcrumb-item"  ><a href="dashboard.php" style="color:rgb(252, 252, 252);">Dashboard</a></li>
                <li class="breadcrumb-item"  ><a href="c++.php" style="color:rgb(252, 252, 252);">Your Course</a></li>
                <li class="breadcrumb-item active" aria-current="page" style="color:white;">Your Quiz</li>
            </ol>
        </div>
    </div>
    <div class="accordion" id="accordionExample" >
	<!-- Détails chapitre 1 -->
        <div class="card" style="height: 90vh;">
            <div class="card-header" id="headingOne">
                <h1 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" >
                        <br> 
                        <h1> Quiz</h1>
                    </button>
                </h1>
            </div>
            <div style="margin-left: 5rem;">
                <?php
                    include("admin/db/dbConnection.php");  
                    // Sélectionner toutes les questions de la base de données
                    $sql = "SELECT * FROM questions";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        // Afficher chaque question
                        while($row = $result->fetch_assoc()) {
                            $course_id = $row['course_id'];
                            // Convertir la chaîne JSON de choix en tableau PHP
                            $choices_array = json_decode($row["choices"]);
                            echo "<br><h2 style='display: inline-block; margin-right: 10px;'>Question:</h2><p style='display: inline-block; font-size: 22px;'>" . $row["question"] . "</p><br><br>";
                            echo "<form method='post' action=''>";
                            // Afficher chaque choix comme une option de formulaire radio
                            foreach ($choices_array as $key => $choice) {
                                echo "<div style='font-size: 19px;'>";
                                echo "<label><input type='radio' name='answer[" . $row["quiz_id"] . "]' value='" . $key . "'>" . $choice . "</label><br>";
                                echo "</div>";
                            }
                            echo "</p>";
                        }
                        echo 
                        "<div>
                            <div class='row'>
                                <div class='col'>
                                    <button type='submit' class='btn btn-info' id='submit_answers' name='submit_answers' style='margin-left: 30rem;'>check</button><br>
                                </div>   
                            </div>
                        </div>";
                        echo "</form>";
                    } 
                    else {
                        echo "<p>Aucune question trouvée.</p>";
                    }
                    // Vérifier si le formulaire a été soumis avec les réponses
                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit_answers"])) {
                        // Récupérer les réponses de l'étudiant
                        $answers = $_POST["answer"];
                        // Vérifier chaque réponse
                        foreach ($answers as $question_id => $choice_key) {
                            // Sélectionner la question correspondante de la base de données
                            $sql = "SELECT * FROM questions WHERE quiz_id = " . $question_id;
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                // Vérifier si la réponse est correcte en comparant avec le choix correct de la question
                                if ($choice_key == $row["correct_choice"]) {
                                    echo "<br><br><p style='display: inline-block; font-size:20px'>Votre réponse à la question \"" . $row["question"] . "\" est </p> <p style='display: inline-block; font-size:20px; color: rgb(0, 150, 0);'> correcte !</p>";
                                } 
                                else {
                                    echo "<br><br><p style='display: inline-block; font-size:20px'>Votre réponse à la question \"" . $row["question"] . "\"est</p> <p style='display: inline-block; color:red; font-size:20px'>  incorrecte.</p> <p style='display: inline-block; font-size:20px;'> La réponse correcte est the number  <p style='display: inline-block; font-size:24px color: rgb(0, 150, 0);'>\" "  .$row["correct_choice"]+1 . " \".</p>";
                                }
                            } 
                        }  
                    }
                    $conn->close();
                ?>
            </div>
            <nav>
                <ul>
                    <li>
                        <a href="a" id="logo" class="b">
                            <i class="fas fa-book" class="book"></i>easylearn
                        </a>
                    </li>
                    <li>
                        <a href="#" class="b">
                            <i class="fas fa-home"></i>
                            <span class="nav-item">Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="b">
                            <i class="fas fa-user"></i>
                            <span class="nav-item">Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="b">
                            <i class="fas fa-wallet"></i>
                            <span class="nav-item">wallet</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="b">
                            <i class="fas fa-tasks"></i>
                            <span class="nav-item">Task</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="b">
                            <i class="fas fa-cog"></i>
                            <span class="nav-item">Setting</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="b">
                            <i class="fas fa-question-circle"></i>
                            <span class="nav-item">Help</span>
                        </a>
                    </li>
                    <li>
                        <a href="a" class="b" id="logout">
                            <i class="fas fa-sign-out-alt"></i>
                            <span class="nav-item">Log out</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</body>
</html>