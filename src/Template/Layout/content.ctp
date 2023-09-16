<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?= 'Fundação Saúde - Belford Roxo' ?></title>
<meta
	content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
    <?= $this->fetch('meta') ?>

    <?= $this->Html->css('bootstrap4.min.css'); ?>
    <?= $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'); ?>
    <?= $this->Html->css('jquery-ui/jquery-ui.css') ?>
  
    <?= $this->Html->css('signin.css') ?>
    <?= $this->Html->css('custom.css') ?>
    <?= $this->fetch('css') ?>
    
    <?= $this->Html->script('jquery.js'); ?>
    <?= $this->Html->script('jquery-ui/jquery-ui.js'); ?>
    <?= $this->Html->script('jquery-maskedinput.js') ?>
    <?= $this->Html->script('jquery.maskmoney.min.js') ?>
    <?= $this->Html->script('bootstrap.js'); ?>
    <?= $this->Html->script('TwitterBootstrap.app.min.js') ?>
    <?= $this->Html->script('https://www.google.com/recaptcha/api.js') ?>
    <?= $this->Html->script('mascaras.js') ?>
    <?= $this->Html->script('controllers/'. strtolower($nome_controller).'.js');?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <div>
		<div id="content">
			<?= $this->fetch('content') ?>
        </div>
	</div>
</body>
</html>