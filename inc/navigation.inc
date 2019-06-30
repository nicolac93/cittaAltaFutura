




    <!-- Navigation -->
        <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
          <div class="container">
            <img src="img/logo.png" style="height:auto;width:2%;opacity:1;margin:2px">
            <a class="navbar-brand" href="index.php">Home</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                  <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="partecipa.php">Partecipa</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="progetto.php">Il Progetto</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="stats.php">Statistiche</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="calendario.php">Calendario</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="team.php">Team</a>
                </li>
                <li class="nav-item" id="login">
                  <a class="nav-link" href="login.php"> Login</a>
                </li>
                <li class="nav-item" id="logout">
                  <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </li>
                <li class="nav-item" id="user">
                  <span class="nav-link"><strong><?php echo $_SESSION['login_user_name'];?></strong></span>
                </li>
              </ul>
            </div>
          </div>
        </nav>


