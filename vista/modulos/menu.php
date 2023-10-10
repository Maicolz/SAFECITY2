<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link collapsed" href="index.php?pagina=home">
      <i class="bi bi-house-door-fill"></i>
      <span>Home</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="index.php?pagina=misReportes">
      <i class="bi bi-bar-chart-fill"></i>
      <span>Mis Reportes</span>
    </a>
  </li><!-- End Dashboard Nav -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="index.php?pagina=reportar">
      <i class="bi bi-grid"></i>
      <span>Reportar</span>
    </a>

  <li class="nav-item">
    <a class="nav-link collapsed" href="index.php?pagina=faq123">
      <i class="bi bi-question-circle"></i>
      <span>F.A.Q</span>
    </a>
  </li><!-- End F.A.Q Page Nav -->



  <li class="nav-item">
    <a class="nav-link collapsed" href="vista/paginas/login.php">
      <i class="bi bi-box-arrow-in-right"></i>
      <span>Log out</span>
    </a>
  </li><!-- End Login Page Nav -->





</ul>

</aside><!-- End Sidebar-->

<main id="main" class="main">

    <div class="pagetitle">
    <?php

if(isset($_GET["pagina"])){
    if($_GET["pagina"]== "home" ||
    $_GET["pagina"]=="misReportes" |
    $_GET["pagina"]=="reportar"){
      include "vista/paginas/".$_GET["pagina"].".php";
}
}
 ?>


 
    </div><!-- End Page Title -->


  </main><!-- End #main -->