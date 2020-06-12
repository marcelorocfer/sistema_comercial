<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">                
                <h3>Nova Conta a Receber</h3>
                <hr>
                <ol class="breadcrumb">
                    <li><a href="<?= base_url() ?>">Principal</a></li>
                    <li><a href="<?= base_url('contas_receber') ?>">Listar Contas a Receber</a></li>
                    <li class="active">Nova Conta a Receber</li>
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
                            <label>Nome do Cliente</label>
                            <select name="id_cliente" class="form-control">
                                <?php $clientes = $this->sistema_model->GetAll('clientes'); ?>
                                    <?php foreach ($clientes as $cliente) : ?>
                                        <option value="<?= $cliente->id_cliente ?>" <?= ($cliente->id_cliente == $dados->id_cliente) ? 'selected=""' : '' ?>"><?= $cliente->nome ?></option>
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
                                <option value="0" <?= ($dados->status == 0 ? 'selected=""' : '') ?>>Quitado</option>
                                <option value="1" <?= ($dados->status == 1 ? 'selected=""' : '') ?>>A receber</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> 
                        <div class="form-group">
                        <input type="hidden" name="id_receber" value="<?= $dados->id_receber ?>">
                            <button class="btn btn-primary" form="form" type="submit">Atualizar Conta a Receber</button>
                        </div> 
                    </div>                    

                </form>
                
            </div>
        </div>

    </div>
</div>