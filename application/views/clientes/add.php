<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">                
                <h3>Novo Cliente</h3>
                <hr>
                <ol class="breadcrumb">
                    <li><a href="<?= base_url() ?>">Principal</a></li>
                    <li><a href="<?= base_url('clientes') ?>">Listar Clientes</a></li>
                    <li class="active">Novo Cliente</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">  
                <?php erros_validacao(); ?>
                <?php get_msg('msgerro'); ?>
                <?php get_msg('msgsuccess'); ?>
                    
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">   

                <form class="" id="form" name="form" method="POST">

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">   
                        <div class="form-group">
                            <label>Pessoa Física
                                <input type="radio" class="form-control" name="tipo" id="pf" checked="checked" value="1">
                            </label>
                            <label>Pessoa Jurídica
                                <input type="radio" class="form-control" name="tipo" id="pj" value="2">
                            </label>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">   
                        <div class="form-group">
                            <label>Nome Completo</label>
                            <input type="text" class="form-control" name="nome" value="<?= set_value('nome') ?>" required>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">   
                        <div class="form-group">
                            <label>Data de Nascimento</label>
                            <input type="text" class="form-control" name="data_nascimento" value="<?= set_value('data_nascimento') ?>">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">   
                        <div class="form-group">
                            <label class="pf">CPF</label>
                            <label class="pj">CNPJ</label>
                            <input type="text" class="form-control" name="cpf_cnpj" value="<?= set_value('cpf_cnpj') ?>">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">   
                        <div class="form-group">
                            <label>E-mail</label>
                            <input type="text" class="form-control" name="email" value="<?= set_value('email') ?>">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">   
                        <div class="form-group">
                            <label>CEP</label>
                            <input type="text" class="form-control" name="cep" value="<?= set_value('cep') ?>">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">   
                        <div class="form-group">
                            <label class="pf">RG</label>
                            <label class="pj">IE</label>
                            <input type="text" class="form-control" name="rg_ie" value="<?= set_value('rg_ie') ?>">
                        </div>
                    </div>                        
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">   
                        <div class="form-group">
                            <label>Endereço</label>
                            <input type="text" class="form-control" name="endereco" value="<?= set_value('endereco') ?>">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">   
                        <div class="form-group">
                            <label>Bairro</label>
                            <input type="text" class="form-control" name="bairro" value="<?= set_value('bairro') ?>">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">   
                        <div class="form-group">
                            <label>Número</label>
                            <input type="text" class="form-control" name="numero" value="<?= set_value('numero') ?>">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">   
                        <div class="form-group">
                            <label>Complemento</label>
                            <input type="text" class="form-control" name="complemento" value="<?= set_value('complemento') ?>">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">   
                        <div class="form-group">
                            <label>Telefone</label>
                            <input type="text" class="form-control" name="telefone" value="<?= set_value('telefone') ?>">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">   
                        <div class="form-group">
                            <label>Cidade</label>
                            <input type="text" class="form-control" name="cidade" value="<?= set_value('cidade') ?>">
                        </div>
                    </div>                        
                    <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1">   
                        <div class="form-group">
                            <label>Estado</label>
                            <input type="text" class="form-control" name="estado" value="<?= set_value('estado') ?>">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">   
                        <div class="form-group pf">
                            <label>Nome do Pai</label>
                            <input type="text" class="form-control" name="nome_pai" value="<?= set_value('nome_pai') ?>">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">   
                        <div class="form-group pf">
                            <label>Nome da Mãe</label>
                            <input type="text" class="form-control" name="nome_mae" value="<?= set_value('nome_mae') ?>">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">   
                        <div class="form-group pf">
                            <label>Observação</label>
                            <textarea name="obs" class="form-control"><?= set_value('obs') ?></textarea>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">   
                        <div class="form-group pf">
                            <label>Status</label>
                            <select name="ativo" class="form-control">
                                <option value="1">Ativo</option>
                                <option value="2">Inativo</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> 
                        <div class="form-group">
                            <button class="btn btn-primary" form="form" type="submit">Cadastrar Cliente</button>
                        </div> 
                    </div>                    

                </form>
                
            </div>
        </div>

    </div>
</div>