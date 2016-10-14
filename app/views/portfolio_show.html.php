<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<?php $main_title = "Портфолио"; ?>
<?php include "partials/_head.html.php" ?>
<body>
<?php include "partials/menu.html.php" ?>
<h1>Портфолио</h1>

<?php if ($portfolio) {?>

    <div class="portItem portLarge">
        <h2>
            <?php echo "# ", " ", $portfolio['id'], " ", $portfolio['name'] ?>
        </h2>
        </br>
        <div class="date"> <?php echo $portfolio['date'] ?> </div>
        </br>
        <img src="<?php echo $portfolio['image'] ?>">
        </br>
        <p>
            <?php echo $portfolio['description'] ?>
        </p>


    </div>
<?php } else { ?>
Такой страницы не существует
<?php } ?>

<?php echo $footer_text; ?>

</body>
</html>