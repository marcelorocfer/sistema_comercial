<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                <h3>Relatório de Contas a Pagar</h3>
                <hr>
                <ol class="breadcrumb">
                    <li><a href="<?= base_url('principal') ?>">Principal</a></li>
                    <li><a href="<?= base_url('contas_pagar') ?>">Contas a Pagar</a></li>
                    <li class="active">Relatório de Contas a Pagar</li>
                </ol>

            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <?php
                    get_msg('msgsuccess');
                    get_msg('msgerro');
                    erros_validacao();
                ?>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <form id="form" name="form" method="POST">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <select name="tipo_conta" class="form-control">
                                <option value="">Selecione uma Opção</option>
                                <option value="1">Vencidas</option>
                                <option value="2">A Vencer</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="data_inicial">Data Inicial</label>
                            <input type="text" class="form-control formato_data" name="data_inicial" id="data_inicial">
                        </div>
                    </div>
                    
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="data_final">Data Final</label>
                            <input type="text" class="form-control formato_data" name="data_final" id="data_final">
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            <button class="btn btn-primary" form="form" type="submit">Gerar Relatório</button>
                        </div>
                    </div>
                </div>
            </form>
            </div>
        </div>

        

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->