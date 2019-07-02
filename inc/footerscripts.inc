
        <!-- Bootstrap core JavaScript -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="js/main.js"></script>
        <!--<script src="https://vjs.zencdn.net/7.5.5/video.js"></script>-->
		<!-- If you'd like to support IE8 (for Video.js versions prior to v7) -->
		<script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>        
        <script>
            var login = document.getElementById("login");
            var logout = document.getElementById("logout");
            var user = document.getElementById("user");
            console.log("session: <?php echo $_SESSION['login_user_name'];?>");
            if("<?php echo $_SESSION['login_user_name'];?>" == ""){
                login.style.display = "inline-block";
                logout.style.display = "none";
                user.style.display = "none";
            }else{
                login.style.display = "none";
                logout.style.display = "inline-block";
                user.style.display = "inline-block";
            }
        </script>
