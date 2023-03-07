<!DOCTYPE html>
<html>
   <head>
       <title>Pages</title>
</head>
<body>
<h1>Pages:</h1>

<table>
    <tr>
        <th>Id</th>
        <th>title</th>
    </tr>
    <?php
    /** @var array $args */
    /** @var \App\Models\Page $page */
    foreach ($args['collection'] as $page) {
    ?>
    <tr>
        <td><?php echo $page->getId(); ?></td>
        <td><?php echo $page->getTitle(); ?></td>
    </tr>
    <?php
    }
    ?>

</table>

</body>
</html>