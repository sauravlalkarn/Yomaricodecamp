<?php
include "loggedheader.php";
?>

    <div class="loginform" style="width:900px;height:auto;position:relative;top:350px;left:400px;">
        <form class="form-signin" role="form" action="search.php" method="get">
            <input type="text" name ="query" class="form-control" placeholder="Search Articles" style="width:600px;height:auto;" required autofocus><br>
            <button class="btn btn-primary" type="submit" style="position:relative;left:250px;">Search</button>
        </form>
    </div>
