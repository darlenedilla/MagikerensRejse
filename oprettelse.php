<?php get_header();
/*
Template Name: Oprettelse
*/?>

<section class="mainsection">


<section class="createUserForm">
  <form class="" action="oprettelse.php" method="post">

    <!-- First part of form -->
    <label for="fornavn">Fornavn</label>
    <input type="text" name="fornavn" value="skriv dit navn...">

    <label for="gender">Køn</label>
    <input type="text" name="gender" value="pige/dreng">

    <label for="area">Område</label>
    <input type="text" name="area" value="Hvor er du fra?">

    <label for="age">Alder</label>
    <input type="number" name="age" value="6">

    <label for="tlf">Telefon nummer</label>
    <input type="number" name="tlf" value="45">

    <label for="password">Magisk kodeord</label>
    <input type="text" name="password" value="Vælg .....">

    <!-- second part of form -->


        <label for="mName">Magisk Navn</label>
        <input type="text" name="mName" value="vælg dit magiske navn">

        <label for="house">hus</label>
        <select class="houseDropDown" name="house">
          <option value="ild">Ild</option>
          <option value="jord">Jord</option>
          <option value="luft">Luft</option>
          <option value="vand">Vand</option>
        </select>

        <label for="tlf">Telefon nummer</label>
        <input type="number" name="tlf" value="45">

        <label for="password">Magisk kodeord</label>
        <input type="text" name="password" value="Vælg .....">

    <!-- third part of form -->

  </form>
</section>
</section>

  <img class="mainsectionImg" src="<?php echo get_stylesheet_directory_uri(); ?>/img/login.jpg" alt="background">

</body>
</html>
