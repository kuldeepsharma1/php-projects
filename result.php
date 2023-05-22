<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $principal = $_POST["principal"];
    $rate = $_POST["rate"] / 100;
    $time = $_POST["time"];

    $compound_interest = $principal * (pow(1 + $rate, $time) - 1);
    $compound_interest = round($compound_interest, 2);

    // Prepare the result as an array
    $result = [
        "principal" => $principal,
        "rate" => $_POST["rate"],
        "time" => $time,
        "compound_interest" => $compound_interest
    ];

    // Store the result in a session variable
    session_start();
    $_SESSION["result"] = $result;

    // Redirect back to the previous page
    header("Location: $_SERVER[HTTP_REFERER]");
    exit();
}
?>
