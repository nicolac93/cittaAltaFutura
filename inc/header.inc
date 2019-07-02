	<div class="top-container container-fluid d-none d-md-block">
		<div class="row" style="padding-bottom:0px;">
			<div class="col-sm">
			  <span style="font-size:13px;">CST-DiathesisLab - Via Salvecchio 19 | Universita degli Studi di Bergamo</span>
			</div>
			<div class="col-sm float-md-right text-md-right">
              <ul class="list-inline">
                  <li>
                      <a href="https://www.facebook.com/Citt%C3%A0-Alta-Plurale-426485558174998/?modal=admin_todo_tour" target="_blank"><i class="fab fa-facebook-f fa-fw"></i></a>
                      <a href="https://www.instagram.com/cst_diathesislab/" target="_blank"><i class="fab fa-instagram fa-fw"></i></a>
                      <a href="https://twitter.com/DiathesisLab" target="_blank"><i class="fab fa-twitter fa-fw"></i></a>
                      <a href="https://www.youtube.com/channel/UCPTRH-eRdapQYjrnYTwrAtw" target="_blank"><i class="fab fa-youtube fa-fw"></i></a>
                  </li>
              </ul>
			</div>
		</div>
	</div>

	<div class="header" id="myHeader">
        <nav class="navbar sticky-top navbar-expand-lg navbar-light">
          <div class="container">
            <a href="index.php" style="display:contents;"><img class="mainLogo" src="img/logo.png"></a>
            <a class="navbar-brand" href="index.php"><span>Citt&agrave; Alta Plurale</span></a>
            <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
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
	</div>

<script>
window.onscroll = function() {myFunction()};
var header = document.getElementById("myHeader");
var sticky = header.offsetTop;
function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}
</script>
