<!DOCTYPE html>
<html>
   <head>
       <title>Pages</title>
</head>
<body>
<h1>Page:</h1>

<?php
/** @var array $args */
/** @var \App\Models\Page $page */
$page = $args['page'];
?>
Id: <?php echo $page->getId(); ?>
<br />
Title: <?php echo $page->getTitle(); ?>

</body>
</html>