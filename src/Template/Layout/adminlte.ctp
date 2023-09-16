<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <?php
        $controller = $this->request->getParam('controller');
        $action = $this->request->getParam('action');
        $this->assign('title', $controller. ' - '.$action) ?>
        <title><?= 'Fundação Saúde - Belford Roxo' ?></title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <?= $this->Html->meta('icon') ?>
        
        <?= $this->fetch('meta') ?>
        <?= $this->Html->css('bootstrap.min.css'); ?>  
        <?= $this->Html->css('TwitterBootstrap.AdminLTE.min.css'); ?>
        <?= $this->Html->css('TwitterBootstrap.skins/skin-blue.min.css'); ?> 
        <?= $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css') ?>
        <?= $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css') ?>
        <?= $this->Html->css('custom.css'); ?>
        <?= $this->fetch('css') ?>

    </head>

    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

            <!-- Main Header -->
            <header class="main-header">
                <?php
                $element = ROOT . DS . 'src' . DS . 'Template' . DS . 'Element' . DS . 'adminlte' . DS . 'header.ctp';
                if (file_exists($element)) {
                    ob_start();
                    include $element;
                    echo ob_get_clean();
                } else {
                    echo $this->element('adminlte/header');
                }
                ?>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <?php
                $element = ROOT . DS . 'src' . DS . 'Template' . DS . 'Element' . DS . 'adminlte' . DS . 'sidebar.ctp';
                if (file_exists($element)) {
                    ob_start();
                    include $element;
                    echo ob_get_clean();
                } else {
                    echo $this->element('adminlte/sidebar');
                }
                ?>
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <?php
                $element = ROOT . DS . 'src' . DS . 'Template' . DS . 'Element' . DS . 'adminlte' . DS . 'content.ctp';
                if (file_exists($element)) {
                    ob_start();
                    include $element;
                    echo ob_get_clean();
                } else {
                    echo $this->element('adminlte/content');
                }
                ?>
            </div>
            <!-- /.content-wrapper -->

            <!-- Main Footer -->
            <footer class="main-footer">
                <?php
                $element = ROOT . DS . 'src' . DS . 'Template' . DS . 'Element' . DS . 'adminlte' . DS . 'footer.ctp';
                if (file_exists($element)) {
                    ob_start();
                    include $element;
                    echo ob_get_clean();
                } else {
                    echo $this->element('adminlte/footer');
                }
                ?>
            </footer>
        </div>
        <!-- ./wrapper -->
        <?php
        $controller = $this->request->getParam('controller');
        $controller = strtolower($controller);
        ?>
        <?= $this->Html->script('jquery.min.js'); ?>
        <?= $this->Html->script('bootstrap.min.js'); ?>
        <?= $this->Html->script('jquery-ui/jquery-ui.js'); ?>
        <?= $this->Html->script('jquery.maskmoney.min'); ?>
        <?= $this->Html->script('TwitterBootstrap.app.min.js'); ?>
        <?= $this->Html->script('jquery-maskedinput.js') ?>
        <?= $this->Html->script('mascaras.js') ?>
        <?= $this->Html->script('controllers/'.$controller.'.js') ?>

        <?= $this->fetch('script') ?>
    </body>
</html>
