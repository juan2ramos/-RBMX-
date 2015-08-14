<?php $this->load->helper('form'); ?>
<?php $this->load->helper('url'); ?>
<?php $this->load->helper('html'); ?>
<!DOCTYPE html>
<html lang="es">
<head>

    <title><?php echo $title; ?></title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="author" content=""/>
    <meta name="contact" content=""/>
    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1"/>

    <!-- Estilos -->
    <?php echo link_tag('assets/css/normalize.css'); ?>
    <?php echo link_tag('assets/css/style.css'); ?>

</head>
<body>
<figure class="logo">
    <?php echo img(['src' => 'assets/images/logo.png']) ?>
</figure>
<?php $this->load->view($view); ?>

<!-- JavaScript -->
<script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/main.js"></script>
</body>
</html>