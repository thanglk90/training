<?php
    echo "<span style='color: blue; font-size: 15px;'>" . __FILE__ . "</span>";
    $render = '<div style="margin: 150px; color: red; text-align: center; font-size: 50px;">Render Index view file success</div>';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php echo $this->title; ?>
</head>
<body>
    <div style="width: 100%; height: 300px;">
        <?php echo '<pre>';  ?>
        <?php print_r($this); ?>
        <?php echo '<pre>'; ?>
    </div>
</body>
</html>