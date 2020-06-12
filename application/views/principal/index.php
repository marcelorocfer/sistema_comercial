<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <b>Total de Vendas (+)</b>
                    </div>
                    <div class="panel-body text-center">
                        <h3><?= formatoMoeda($total_vendas); ?></h3>
                    </div>
                </div>  
            </div>
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <b>Total de Serviços (+)</b>
                    </div>
                    <div class="panel-body text-center">
                        <h3><?= formatoMoeda($total_servicos); ?></h3>
                    </div>
                </div>      
            </div>
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <b>Total a Receber (+)</b>
                    </div>
                    <div class="panel-body text-center">
                        <h3><?= formatoMoeda($total_receber); ?></h3>
                    </div>
                </div> 
            </div>
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <b>Total a Pagar (-)</b>
                    </div>
                    <div class="panel-body text-center">
                        <h3><?= formatoMoeda($total_pagar); ?></h3>
                    </div>
                </div> 
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body text-center">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            <b>Receber Hoje</b>
                        </div>
                        <div class="panel-body text-center">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <td><b>Nome<b></td>
                                        <td><b>Valor</b></td>                                        
                                    </tr>
                                </thead>
                                <?php $total = 0; ?>    
                                <?php foreach ($receber_dia as $rd) : ?>
                                <tbody>
                                    <tr>
                                        <td class="text-left"><?= $rd->nome; ?></td>
                                        <td class="text-right"><?= formatoMoeda($rd->valor); ?></td>
                                    </tr>
                                    <?php $total += $rd->valor ?>
                                </tbody>
                                <?php endforeach; ?>
                                <tr class="success">
                                    <td class="text-right"><b>Total</b></td>
                                    <td class="text-right"><b><?= formatoMoeda($total); ?></b></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            <b>Pagar Hoje</b>
                        </div>
                        <div class="panel-body text-center">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <td><b>Nome</b></td>
                                        <td><b>Valor</b></td>                                        
                                    </tr>
                                </thead>
                                <?php $total = 0; ?>
                                <?php foreach ($pagar_dia as $pd) : ?>
                                <tbody>
                                    <tr>
                                        <td class="text-left"><?= $pd->nome_fantasia .' - '. $pd->razao; ?></td>
                                        <td class="text-right"><?= formatoMoeda($pd->valor); ?></td>
                                    </tr>
                                <?php $total += $pd->valor ?>   
                                </tbody>
                                <?php endforeach; ?>
                                <tr class="success">
                                    <td class="text-right"><b>Total</b></td>
                                    <td class="text-right"><b><?= formatoMoeda($total); ?></b></td>
                                </tr>
                            </table>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->