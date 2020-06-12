<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">                
                <h3>Novo Usuário</h3>
                <hr>
                <ol class="breadcrumb">
                    <li><a href="<?= base_url('principal') ?>">Principal</a></li>
                    <li><a href="<?= base_url('usuarios') ?>">Usuários Cadastrados</a></li>
                    <li class="active">Novo Usuário</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <p><?php erros_validacao(); ?></p>
            </div>
        </div>

        <!-- Formulário de Cadastro -->
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <form id="form_add" name="form_add" action="" class="" method="post">

                    <div class="form-group">
                        <label for="tipoUsuario">Tipo de Usuário</label>
                        <select class="form-control" name="tipo_usuario" id="tipoUsuario">
                            <option value="1">Administrador</option>
                            <option value="2">Vendedor</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="nomeUsuario">Nome</label>
                        <input type="text" class="form-control" name="nome_usuario" id="nomeUsuario">
                    </div>
                    
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control" name="email_usuario" id="email">
                    </div>

                    <div class="form-group">
                        <label for="senha">Senha</label>
                        <input type="password" class="form-control" name="senha_usuario" id="senha">
                    </div>

                    <div class="form-group">
                        <label for="senha2">Confirmar Senha</label>
                        <input type="password" class="form-control" name="senha_usuario2" id="senha2">
                    </div>

                    <button form="form_add" type="submit" class="btn btn-success">Cadastrar Usuário</button>

                </form>
            </div>
        </div>

    </div>
</div>