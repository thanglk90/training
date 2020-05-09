<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php echo $this->title; ?>
    <?php echo $this->_fileCss; ?>
    <?php echo $this->_fileJs; ?>
</head>
<body>
    <div class="site-wrapper">
        <!-- Start - Header -->
            <?php require_once 'block/header.php'; ?>
        <!-- End - Header -->
        

        <!-- Start - Register & Login Modal -->

        <?php //require_once 'block/modal.php'; ?>

        <!-- End - Register & Login Modal -->

        <!-- Start - Header -->
        <?php require_once 'block/site-body.php'; ?>
        <!-- End - Header -->

        <div class="site-footer"></div>
        
    </div>
</body>
</html>

