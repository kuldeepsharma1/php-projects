<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>KS Finance Calculators</title>
</head>

<body>
    <div class="container">
        <?php session_start(); ?>
        <h2>KS Finance Calculators</h2>

        <div class="calculator">
            <h3>Calculator Selection</h3>
            <form style="padding:42px;" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <label for="calculator">Choose a Calculator:</label>
                <select style="padding:12px;" id="calculator" name="calculator">
                    <option style="padding:12px;" value="simple">Simple Interest Calculator</option>
                    <option style="padding:12px;" value="compound">Compound Interest Calculator</option>
                </select>
                <input type="submit" value="Select">
            </form>
        </div>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $calculator = $_POST["calculator"];

            if ($calculator === "simple") {
                ?>
                <div class="calculator">
                    <h3>Simple Interest Calculator</h3>
                    <form method="POST" action="simple.php">
                        <label for="principal">Principal Amount:</label>
                        <input type="number" id="principal" name="principal" required><br><br>
                        <label for="rate">Interest Rate (%):</label>
                        <input type="number" id="rate" name="rate" required><br><br>
                        <label for="time">Time Period (in years):</label>
                        <input type="number" id="time" name="time" required><br><br>
                        <input type="submit" value="Calculate">
                    </form>

                    <?php

                    if (isset($_SESSION["result"])) {
                        $result = $_SESSION["result"];
                        unset($_SESSION["result"]); // Remove the result from the session
                        echo "<div class='result'>";
                        echo "<h3>Result:</h3>";
                        echo "<p>Principal Amount: " . $result["principal"] . "</p><br>";
                        echo "<p>Annual Interest Rate: " . $result["rate"] . "%</p><br>";
                        echo "<p>Time Period: " . $result["time"] . " years</p><br>";
                        echo "<p>Simple Interest: " . $result["simple_interest"] . "</p>";
                        echo "</div>";
                    }
                    ?>
                </div>

                <?php
            } elseif ($calculator === "compound") {
                ?>
                <div class="calculator">
                    <h3>Compound Interest Calculator</h3>
                    <form method="post" action="result.php">
                        <label for="principal">Principal Amount:</label>
                        <input type="number" id="principal" name="principal" required><br><br>
                        <label for="rate">Annual Interest Rate (%):</label>
                        <input type="number" id="rate" name="rate" required><br><br>
                        <label for="time">Time Period (in years):</label>
                        <input type="number" id="time" name="time" required><br><br>
                        <input type="submit" value="Calculate">
                    </form>
                    <?php

                    if (isset($_SESSION["result"])) {
                        $result = $_SESSION["result"];
                        unset($_SESSION["result"]); // Remove the result from the session
                        echo "<div class='result'>";
                        echo "<h3>Result:</h3>";
                        echo "<p>Principal Amount: " . $result["principal"] . "</p><br>";
                        echo "<p>Annual Interest Rate: " . $result["rate"] . "%</p><br>";
                        echo "<p>Time Period: " . $result["time"] . " years</p><br>";
                        echo "<p>Compound Interest: " . $result["compound_interest"] . "</p>";
                        echo "</div>";
                    }
                    ?>
                </div>
                <?php
            }
        }
        ?>
    </div>


</body>

</html>