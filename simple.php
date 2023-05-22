<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form inputs
    $principal = $_POST["principal"];
    $rate = $_POST["rate"];
    $time = $_POST["time"];

    // Calculate simple interest
    $interest = ($principal * $rate * $time) / 100;
    $result = [
        "principal" => $principal,
        "rate" => $_POST["rate"],
        "time" => $time,
        "simple_interest" => $interest
    ];
    // Display the result
    // Store the result in a session variable
    session_start();
    $_SESSION["result"] = $result;

    // Redirect back to the previous page
    header("Location: $_SERVER[HTTP_REFERER]");
    exit();
}
?>