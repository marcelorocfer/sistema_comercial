<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">                
                <h3>Nova Conta a Pagar</h3>
                <hr>
                <ol class="breadcrumb">
                    <li><a href="<?= base_url() ?>">Principal</a></li>
                    <li><a href="<?= base_url('contas_pagar') ?>">Listar Contas a Pagar</a></li>
                    <li class="active">Nova Conta a Pagar</li>
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
                                <?php 

                                    $fornecedores = $this->sistema_model->GetAll('fornecedores');
                                    foreach ($fornecedores as $fornecedor) 
                                    {
                                        echo '<option value="'.$fornecedor->id_fornecedor.'">'.$fornecedor->razao.'</option>';
                                    }

                                ?>                                
                            </select>
                        </div>
                    </div>      

                    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">   
                        <div class="form-group">
                            <label>Vencimento</label>
                            <input type="text" class="form-control" name="vencimento" value="<?= set_value('vencimento') ?>">
                        </div>
                    </div>         

                    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">   
                        <div class="form-group">
                            <label>Valor</label>
                            <input type="text" class="form-control dinheiro" name="valor" value="<?= set_value('valor') ?>">
                        </div>
                    </div>    

                    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">   
                        <div class="form-group pf">
                            <label>Status</label>
                            <select name="status" class="form-control">                                
                                <option value="1">A Pagar</option>
                                <option value="0">Quitado</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> 
                        <div class="form-group">
                            <button class="btn btn-primary" form="form" type="submit">Cadastrar Nova Conta a Pagar</button>
                        </div> 
                    </div>                    

                </form>
                
            </div>
        </div>

    </div>
</div>