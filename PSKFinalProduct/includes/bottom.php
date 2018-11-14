<footer>
    
    <?php
    if($_SESSION["Privilege"] == "developer" || $_SESSION["Privilege"] == "superadmin" || $_SESSION["Privilege"] == "admin")
    {
        echo '<p align="center"><a href="' . ADMIN_PATH . 'dashboard.php">Go To Admin Dashboard</a></p>';
    }

    ?>
    <div class="links">
        <h3>Follow Us:</h3><br>
        <p class="btmLink"><a href="https://www.facebook.com/popsmartkids/" class="fa fa-facebook"></a></p>
        <p class="btmLink"><a href="https://twitter.com/popsmartkids" class="fa fa-twitter"></a></p>
        <p class="btmLink"><a href="https://www.linkedin.com/in/priyankaraha/" class="fa fa-linkedin"></a></p>
    </div>

    <div class="policies">
        <p><a href="index.php">Home</a></p>
        <p><a href="contactUs.php">Contact Us</a></p>
        <p><a href="privacy.php">Privacy Policy</a></p>
        <p><a href="termsOfUse.php">Terms of Use</a></p>
        <p><a href="api.php">API</a></p>
    </div>
</footer>
<script>
    /* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */
    function myFunction() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
            x.className += " responsive";
        } else {
            x.className = "topnav";
        }
    }
</script>
<?=$loadfoot;?>
</body>
</html>