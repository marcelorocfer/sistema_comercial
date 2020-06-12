<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">                
                <h3>Editar Serviço</h3>
                <hr>
                <ol class="breadcrumb">
                    <li><a href="<?= base_url() ?>">Principal</a></li>
                    <li><a href="<?= base_url('servicos') ?>">Listar Serviços</a></li>
                    <li class="active">Editar Serviço</li>
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

                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">   
                        <div class="form-group">
                            <label>Nome do Serviço</label>
                            <input type="text" class="form-control" name="nome_servico" value="<?= set_value('nome_servico', $dados->nome_servico) ?>" required>
                        </div>
                    </div>                    
                    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">   
                        <div class="form-group">
                            <label>Valor do Serviço</label>
                            <input type="text" class="form-control dinheiro" name="valor_servico" value="<?= set_value('valor_servico', $dados->valor_servico) ?>">
                        </div>
                    </div>                    
                    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">   
                        <div class="form-group">
                            <label>Status</label>
                            <select name="ativo" class="form-control">
                                <option value="1" <?= ($dados->ativo == 1 ? 'selected=""' : '') ?>>Ativo</option>
                                <option value="2" <?= ($dados->ativo == 2 ? 'selected=""' : '') ?>>Inativo</option>
                            </select>
                        </div>
                    </div>

                    <input type="hidden" name="id_servico" value="<?= $dados->id_servico ?>">

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> 
                        <div class="form-group">
                            <button class="btn btn-primary" form="form" type="submit">Atualizar Serviço</button>
                        </div> 
                    </div>                    

                </form>
                
            </div>
        </div>

    </div>
</div>