<!doctype html>
<html lang="en">
<?php $main_title = "Главная"; ?>
<?php include "partials/_head.html.php" ?>
<body>
<?php include "partials/menu.html.php" ?>
<h1>Main page</h1>

<a href="<?php echo $path("page_about", ['from' => 'main']) ?>">Тут вы можете почитать о нас</a>

<?php echo $footer_text; ?>

</body>
</html>