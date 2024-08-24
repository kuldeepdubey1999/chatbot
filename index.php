<?php
// session_start(); // Start the session at the beginning of the script
session_start();
if(isset($_SESSION["userName"]) && isset($_SESSION["phone"])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChatBot</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>ChatBot</h1>
    <div class="chat">
        <h2>Welcome to <span><?php echo htmlspecialchars($_SESSION["userName"]); ?></span></h2>
        <div class="msg">
            <!-- Message content will go here -->
        </div>
        <div class="input_msg">
            <input type="text" placeholder="Write Input message here" id="input_msg">
            <button onclick="update()">Send</button>
        </div>
    </div>
</body>
<script src="script.js"></script>
</html>
<?php
} else {
    header("Location: login.php");   
    // exit(); // Make sure the script stops after redirection
}
?>
