<?php $ver = 1;?>
<!doctype html>
<html lang="ru" class="h-100">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url('themes/template/assets/css/vendors.css?v='.time())?>">
    <link rel="stylesheet" href="<?php echo base_url('themes/template/assets/css/template.css?v='.time())?>">
    <link href="<?php echo base_url('themes/template/assets/img/favicons/favicon.ico?v='.$ver)?>" rel="shortcut icon" sizes="24x24" />
    <link href="<?php echo base_url('themes/template/assets/img/favicons/apple-touch-icon-57x57.png?v='.$ver)?>" rel="apple-touch-icon" sizes="57x57" />
    <link href="<?php echo base_url('themes/template/assets/img/favicons/apple-touch-icon-72x72.png?v='.$ver)?>" rel="apple-touch-icon" sizes="72x72" />
    <link href="<?php echo base_url('themes/template/assets/img/favicons/apple-touch-icon-114x114.png?v='.$ver)?>" rel="apple-touch-icon" sizes="114x114" />
    <link href="<?php echo base_url('themes/template/assets/img/favicons/apple-touch-icon-144x144.png?v='.$ver)?>" rel="apple-touch-icon" sizes="114x114" />


    <title>Template</title>
</head>
<body class="d-flex flex-column h-100">

<header class="header">
    HEADER
</header>

<div class="main flex-shrink-0">
    <?php if ( !$isMain ) : ?>
        <div class="container">
            <div class="breadcrumbs">
                <?php $last=array_key_last($breadcrumb); foreach ( $breadcrumb as $key => $item ) : ?>
                    <span class="breadcrumbs-item">
                        <?php echo sprintf('%s',$key != $last ? anchor($key,$item, ['class' => 'breadcrumbs-item-link', 'title' => $item]) . svg('arrow-right', 'breadcrumbs-item-icon') : $item)?>
                    </span>
                <?php endforeach;?>
            </div>
        </div>
    <?php endif;?>
    <?php echo $view?>
</div>

<footer class="footer mt-auto">
    FOOTER
</footer>

<?php require_once('theme_svg.php');?>
<script src="<?php echo base_url('themes/template/assets/js/vendors.js?v='.time())?>"></script>
<script src="<?php echo base_url('themes/template/assets/js/app.js?v='.time())?>"></script>
<script src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js" type="text/javascript" async charset="utf-8"></script>
<script src="//yastatic.net/share2/share.js" type="text/javascript" async charset="utf-8"></script>
</body>
</html>