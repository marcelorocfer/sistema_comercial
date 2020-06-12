<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">                
                <h3>Novo Fornecedor</h3>
                <hr>
                <ol class="breadcrumb">
                    <li><a href="<?= base_url() ?>">Principal</a></li>
                    <li><a href="<?= base_url('fornecedores') ?>">Listar Fornecedores</a></li>
                    <li class="active">Novo Fornecedor</li>
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

                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">   
                        <div class="form-group">
                            <label>Razão Social</label>
                            <input type="text" class="form-control" name="razao" value="<?= set_value('razao') ?>" required>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">   
                        <div class="form-group">
                            <label>Nome Fantasia</label>
                            <input type="text" class="form-control" name="nome_fantasia" value="<?= set_value('nome_fantasia') ?>">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">   
                        <div class="form-group">
                            <label>CNPJ</label>
                            <input type="text" class="form-control" name="cnpj" value="<?= set_value('cnpj') ?>">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">   
                        <div class="form-group">
                            <label>Inscrição Estadual</label>
                            <input type="text" class="form-control" name="ie" value="<?= set_value('ie') ?>">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">   
                        <div class="form-group">
                            <label>Telefone</label>
                            <input type="text" class="form-control" name="telefone" value="<?= set_value('telefone') ?>">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">   
                        <div class="form-group">
                            <label>Celular</label>
                            <input type="text" class="form-control" name="celular" value="<?= set_value('celular') ?>">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">   
                        <div class="form-group">
                            <label>Endereço</label>
                            <input type="text" class="form-control" name="endereco" value="<?= set_value('endereco') ?>">
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
                            <label>Bairro</label>
                            <input type="text" class="form-control" name="bairro" value="<?= set_value('bairro') ?>">
                        </div>
                    </div>                     
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">   
                        <div class="form-group">
                            <label>Complemento</label>
                            <input type="text" class="form-control" name="complemento" value="<?= set_value('complemento') ?>">
                        </div>
                    </div> 
                    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">   
                        <div class="form-group">
                            <label>CEP</label>
                            <input type="text" class="form-control" name="cep" value="<?= set_value('cep') ?>">
                        </div>
                    </div> 
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">   
                        <div class="form-group">
                            <label>E-mail</label>
                            <input type="text" class="form-control" name="email" value="<?= set_value('email') ?>">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">   
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
                    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">   
                        <div class="form-group">
                            <label>Contato</label>
                            <input type="text" class="form-control" name="contato" value="<?= set_value('contato') ?>">
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
                            <button class="btn btn-primary" form="form" type="submit">Cadastrar Fornecedor</button>
                        </div> 
                    </div>                    

                </form>
                
            </div>
        </div>

    </div>
</div>