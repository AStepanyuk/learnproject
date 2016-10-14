<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<?php $main_title = "Портфолио"; ?>
<?php include "partials/_head.html.php" ?>
<body>
<?php include "partials/menu.html.php" ?>
<h1>Портфолио</h1>

<?php foreach ($portfolios as $portfolio) { ?>

    <div class="portItem">
        <h2>
            <?php echo "# ", " ", $portfolio['id'], " ", $portfolio['name'] ?>
        </h2>
        </br>
        <div class="date"> <?php echo $portfolio['date'] ?> </div>
        </br>
        <img src="<?php echo $portfolio['image'] ?>">
        </br>
<!--        <p>-->
<!--            --><?php //echo $portfolio['description'] ?>
<!--        </p>-->
        <a href="<?php echo App::getRouter()->url("page_portfolio_show", ['id'=>$portfolio['id']]) ?>">Подробнее</a>


        <hr>

    </div>

<?php } ?>

<?php echo $footer_text; ?>

</body>
</html>