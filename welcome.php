<?php
session_start();

//if (!isset($_SESSION["username"])) {
    //header("Location: login.php");
    //exit;
//}

if (isset($_COOKIE["page_background_color"]) && isset($_COOKIE["font_color"])) {
    $page_background_color = $_COOKIE["page_background_color"];
    $font_color = $_COOKIE["font_color"];
} else {
    $page_background_color = "#FFFFFF";
    $font_color = "#000000";
}
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            background-color: <?php echo $page_background_color; ?>;
            color: <?php echo $font_color; ?>;
        }
    </style>
</head>
<body>

<h2>Welcome <?php echo htmlspecialchars($_SESSION["username"]); ?>!</h2>

<p>Click on the button below to change the colors of this page:</p>

<button onclick="changeColors()">Change Colors</button>

<script>
    function changeColors() {
        let newPageBackgroundColor = prompt("Enter a new page background color:");
        let newFontColor = prompt("Enter a new font color:");

        if (newPageBackgroundColor && newFontColor) {
            document.cookie = "page_background_color=" + newPageBackgroundColor + ";path=/";
            document.cookie = "font_color=" + newFontColor + ";path=/";

            location.reload();
        }
    }
</script>

<p><a href="logout.php">Logout</a></p>

</body>
</html>