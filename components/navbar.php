<nav>
  <?php
  // var_dump($_SESSION)
  ?>
  <i class="bi bi-list" id="menu-button"></i>

  <ul style="left:-100%;">
    <li><a href="/">Accueil</a></li>

    <li>
      <a href="<?= isset($_SESSION) && isset($_SESSION['id']) ? "./profil" : "./login" ?>">
        <?= isset($_SESSION) && isset($_SESSION['id']) ? "Profil" : "Se connecter" ?>
      </a>
    </li>

    <?=
    isset($_SESSION) && isset($_SESSION['id']) ?
      "<li><a href='./routes/logout.php'>Se deconnecter</a></li>" : ""
    ?>
  </ul>
</nav>



<script src="/scripts/navbar.js"></script>