<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">                
                <h3>Editar Conta a Pagar</h3>
                <hr>
                <ol class="breadcrumb">
                    <li><a href="<?= base_url() ?>">Principal</a></li>
                    <li><a href="<?= base_url('contas_pagar') ?>">Listar Contas a Pagar</a></li>
                    <li class="active">Editar Conta a Pagar</li>
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
                            <label>Nome do Fornecedor</label>
                            <select name="id_fornecedor" class="form-control">
                                <?php $fornecedores = $this->sistema_model->GetAll('fornecedores'); ?>
                                    <?php foreach ($fornecedores as $fornecedor) : ?>
                                        <option value="<?= $fornecedor->id_fornecedor ?>" <?= ($fornecedor->id_fornecedor == $dados->id_fornecedor) ? 'selected=""' : '' ?>"><?= $fornecedor->razao ?></option>
                                    <?php endforeach; ?>                                
                            </select>
                        </div>
                    </div>      

                    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">   
                        <div class="form-group">
                            <label>Vencimento</label>
                            <input type="text" class="form-control" name="vencimento" value="<?= set_value('vencimento', formataDataView($dados->vencimento)) ?>">
                        </div>
                    </div>         

                    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">   
                        <div class="form-group">
                            <label>Valor</label>
                            <input type="text" class="form-control dinheiro" name="valor" value="<?= set_value('valor', $dados->valor) ?>">
                        </div>
                    </div>    

                    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">   
                        <div class="form-group pf">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="1" <?= ($dados->status == 1 ? 'selected=""' : '') ?>>A pagar</option>
                                <option value="0" <?= ($dados->status == 0 ? 'selected=""' : '') ?>>Quitado</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> 
                        <div class="form-group">
                        <input type="hidden" name="id_conta" value="<?= $dados->id_conta ?>">
                            <button class="btn btn-primary" form="form" type="submit">Atualizar Nova Conta a Pagar</button>
                        </div> 
                    </div>                    

                </form>
                
            </div>
        </div>

    </div>
</div>