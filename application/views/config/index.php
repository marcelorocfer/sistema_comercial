<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                
                <h3>Configuração do Sistema</h3>
                <hr>
                <ol class="breadcrumb">
                    <li><a href="<?= base_url('principal') ?>">Principal</a></li>
                    <li class="active">Configuração</li>
                </ol>

            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <p>
                    <?php erros_validacao(); ?>    
                    <?php get_msg('msgerro'); ?>
                    <?php get_msg('msgsuccess'); ?>                       
                </p>
            </div>
        </div>

        <!-- Formulário de Cadastro -->
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <form id="form_add" name="form_add" action="" class="" method="post">       

                <div>

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#empresa" aria-controls="empresa" role="tab" data-toggle="tab">Dados da Empresa</a>
                    </li>
                    <li role="presentation">
                        <a href="#texto" aria-controls="texto" role="tab" data-toggle="tab">Texto do Sistema</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="empresa">

                        <div class="form-group">
                            <label>Razão Social</label>
                            <input type="text" class="form-control" name="razao" value="<?php echo set_value('razao', $dados->razao) ?>">
                        </div>

                        <div class="form-group">
                            <label>Nome Fantasia</label>
                            <input type="text" class="form-control" name="nome_fantasia" value="<?php echo set_value('nome_fantasia', $dados->nome_fantasia) ?>">
                        </div>

                        <div class="form-group">
                            <label>CNPJ</label>
                            <input type="text" class="form-control" name="cnpj" value="<?php echo set_value('cnpj', $dados->cnpj) ?>">
                        </div>

                        <div class="form-group">
                            <label>IE</label>
                            <input type="text" class="form-control" name="ie" value="<?php echo set_value('ie', $dados->ie) ?>">
                        </div>

                        <div class="form-group">
                            <label>IM</label>
                            <input type="text" class="form-control" name="im" value="<?php echo set_value('im', $dados->im) ?>">
                        </div>

                        <div class="form-group">
                            <label>CEP</label>
                            <input type="text" class="form-control" name="cep" value="<?php echo set_value('cep', $dados->cep) ?>">
                        </div>

                        <div class="form-group">
                            <label>Endereço</label>
                            <input type="text" class="form-control" name="endereco" value="<?php echo set_value('endereco', $dados->endereco) ?>">
                        </div>

                        <div class="form-group">
                            <label>Número</label>
                            <input type="text" class="form-control" name="numero" value="<?php echo set_value('numero', $dados->numero) ?>">
                        </div>

                        <div class="form-group">
                            <label>Bairro</label>
                            <input type="text" class="form-control" name="bairro" value="<?php echo set_value('bairro', $dados->bairro) ?>">
                        </div>

                        <div class="form-group">
                            <label>Complemento</label>
                            <input type="text" class="form-control" name="complemento" value="<?php echo set_value('complemento', $dados->complemento) ?>">
                        </div>

                        <div class="form-group">
                            <label>Cidade</label>
                            <input type="text" class="form-control" name="cidade" value="<?php echo set_value('cidade', $dados->cidade) ?>">
                        </div>

                        <div class="form-group">
                            <label>Estado</label>
                            <input type="text" class="form-control" name="estado" value="<?php echo set_value('estado', $dados->estado) ?>">
                        </div>

                        <div class="form-group">
                            <label>Telefone</label>
                            <input type="text" class="form-control" name="telefone" value="<?php echo set_value('telefone', $dados->telefone) ?>">
                        </div>

                        <div class="form-group">
                            <label>E-mail</label>
                            <input type="text" class="form-control" name="email" value="<?php echo set_value('email', $dados->email) ?>">
                        </div>

                        <div class="form-group">
                            <label>Site</label>
                            <input type="text" class="form-control" name="site" value="<?php echo set_value('site', $dados->site) ?>">
                        </div>

                        <div class="form-group">
                            <label>Logotipo</label>
                            <input type="text" class="form-control" name="logotipo" value="<?php echo set_value('logotipo', $dados->logotipo) ?>">
                        </div>

                    </div>

                    <div role="tabpanel" class="tab-pane" id="texto">
                        <div class="form-group">
                            <label>Texto OS</label>
                            <textarea name="txt_ordem_servico" class="form-control"><?php echo $dados->txt_ordem_servico ?></textarea>
                        </div>

                        <div class="form-group">
                            <label>Texto OS</label>
                            <textarea name="txt_venda" class="form-control"><?php echo $dados->txt_venda ?></textarea>
                        </div>
                    </div>
                </div>
                
                </div>                    

                    <input type="hidden" value="<?= $dados->id_config ?>" name="id_config">

                    <button form="form_add" type="submit" class="btn btn-success">Salvar</button>

                </form>
            </div>
        </div>
    </div>
</div>