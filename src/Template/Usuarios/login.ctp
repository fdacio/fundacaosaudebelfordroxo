<div class="container">
    <div class="form-signin box">
        <div class="box-danger">
            <?= $this->Form->create('usuarios', ['id' => 'frmLogin']) ?>
            <div class="form-row">
                <div class="col-md-12">
                    <h3 class="form-signin-heading text-center">Fundação Saúde - Belford Roxo</h3>
                    <br>
                    <br>
                </div>
            </div>
            <?= $this->Flash->render() ?>
            <div class="form-row">
                <div class="col-md-12">
                    <?= $this->Form->control('email', ['type' => 'text', 'label' => false, 'placeholder' => 'e-Mail', 'class' => 'form-control', 'id' => 'email']) ?>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12">
                    <?= $this->Form->control('senha', ['type' => 'password', 'label' => false, 'placeholder' => 'Senha', 'class' => 'form-control']) ?>
                </div>
            </div>
            <br>
            <!--
            <div class="form-group btn-block">
                <div class="captcha">
                    <div class="g-recaptcha" data-sitekey="<?= $captchaChaveSite ?>"></div>
                </div>
            </div>
            -->
            <div class="form-group">
                <?= $this->Form->button('Entrar', ['class' => ['btn btn-block']]); ?>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>