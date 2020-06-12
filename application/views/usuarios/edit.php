<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                
                <h3>Alterar Usuários</h3>
                <hr>
                <ol class="breadcrumb">
                    <li><a href="<?= base_url('principal') ?>">Principal</a></li>
                    <li><a href="<?= base_url('usuarios') ?>">Usuários Cadastrados</a></li>
                    <li class="active">Alterar Usuários</li>
                </ol>

            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <p>
                    <?php erros_validacao(); ?>                        
                </p>
            </div>
        </div>

        <!-- Formulário de Cadastro -->
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <form id="form_add" name="form_add" action="" class="" method="post">

                    <?php if ($this->session->user_id == 1) : ?>
                        <div class="form-group">
                            <label for="tipoUsuario">Tipo de Usuário</label>
                            <select class="form-control" name="tipo_usuario" id="tipoUsuario">
                                <option value="1" <?= $group == 1 ? 'selected' : '' ?>>Administrador</option>
                                <option value="2" <?= $group == 2 ? 'selected' : '' ?>>Vendedor</option>
                            </select>
                        </div>
                    <?php endif; ?>

                    <div class="form-group">
                        <label for="nomeUsuario">Nome</label>
                        <input type="text" class="form-control" name="nome_usuario" id="nomeUsuario" value="<?= $user->username ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control" name="email_usuario" id="email" value="<?= $user->email ?>">
                    </div>

                    <div class="form-group">
                        <label for="senha">Senha</label>
                        <input type="password" class="form-control" name="senha_usuario" id="senha">
                    </div>

                    <div class="form-group">
                        <label for="senha2">Confirmar Senha</label>
                        <input type="password" class="form-control" name="senha_usuario2" id="senha2">
                    </div>

                    <input type="hidden" value="<?= $user->id ?>" name="id_usuario">

                    <button form="form_add" type="submit" class="btn btn-success">Atualizar Usuário</button>

                </form>
            </div>
        </div>

    </div>
</div>