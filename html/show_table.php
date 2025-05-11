<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
    <?php foreach ($travels as  $travel) { ?>
        <tr>
            <td><?= $travel['id'] ?></td>
            <td><?= $travel['name'] ?></td>
            <td><?= $travel['email'] ?></td>
        </tr>
    <?php 
    } ?>
</table> 
</body>
</html>
