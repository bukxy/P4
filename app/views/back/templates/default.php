<!doctype html>
<html lang="en">

        <?php include("header.php"); ?>

  <body>

        <?php include("topMenu.php"); ?>

    <div class="container-fluid">
      <div class="row">

      <?php include("leftMenu.php"); ?>

        <main role="main" class="ml-sm-auto col-lg-10">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2"><?= $titleCat ?></h1>
          </div>

            <?= $content; ?>

        </main>
      </div>
    </div>
  </body>

  <footer>

    <?php include("footer.php"); ?>

  </footer>


</html>
