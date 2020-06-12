<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">                
                <h3>Nova Venda</h3>
                <hr>
                <ol class="breadcrumb">
                    <li><a href="<?= base_url() ?>">Principal</a></li>
                    <li><a href="<?= base_url('vendas') ?>">Listar Vendas</a></li>
                    <li class="active">Nova Venda</li>
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

                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">   
                        <div class="form-group">
                            <label>Cliente</label>
                            <input type="text" class="form-control" name="cliente" id="cliente" value="<?= set_value('cliente') ?>" required>
                            <input type="hidden" value="" name="id_cliente">
                        </div>
                    </div>
                    
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">   
                        <div class="form-group">
                            <label>Data de Emissão</label>
                            <input type="text" class="form-control" name="data_emissao" value="<?= set_value('data_emissao', dataDia()); ?>">
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">   
                        <div class="form-group">
                            <label>Tipo de Venda</label>
                            <select class="form-control" name="tipo">
                                <option value="1">Venda à Vista</option>
                                <option value="2">Venda à Prazo</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">         
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th class="col-xs-12 col-sm-6 col-md-6 col-lg-6">Produto</th>
                                    <th class="col-xs-12 col-sm-2 col-md-2 col-lg-2">Quantidade</th>
                                    <th class="col-xs-12 col-sm-2 col-md-2 col-lg-2">Valor Unitário</th>
                                    <th class="col-xs-12 col-sm-2 col-md-2 col-lg-2">Valor Total</th>
                                </tr>
                            </thead>

                            <tbody id="lista_produto">
                                <tr class="linhas">
                                    <th></th>
                                    <td>
                                        <input type="hidden" value="" name="id_produto[]">
                                        <input type="text" name="produto[]" id="txtProduto_1" value="" class="form-control" required>
                                    </td>
                                    <td>
                                        <input type="text" name="qtde[]" id="qtde_1"  value="" class="form-control text-center" required >
                                    </td>
                                    <td>
                                        <input type="text" name="valor_unit[]" id="valor_unit_1" style="text-align:right" class="form-control text-right" required>
                                    </td>
                                    <td>
                                        <input type="text" name="valor_total[]" class="form-control text-right" readonly >
                                    </td>
                                </tr>                                
                            </tbody>
                        </table>
                    </div>

                    <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
                        <button type="button" class="btn btn-success" id="add_produto">Adicionar Novo Produto
                        </button>
                    </div>
                    <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">   
                        <div class="form-group">
                            <label>Valor de Entrada</label>
                            <input type="text" class="form-control moeda text-right" name="valor_entrada" value="<?= set_value('valor_entrada') ?>">
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 col-sm-offset-10 col-md-offset-10 col-lg-offset-10">   
                        <div class="form-group">
                            <label>Valor de Desconto</label>
                            <input type="text" class="form-control moeda text-right" name="valor_desconto" value="<?= set_value('valor_desconto') ?>">
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 col-sm-offset-10 col-md-offset-10 col-lg-offset-10">   
                        <div class="form-group">
                            <label>Valor Total</label>
                            <input type="text" class="form-control text-right" name="total_pagar" value="<?= set_value('total_pagar') ?>"  readonly >
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">   
                        <div class="form-group">
                            <label>Forma de Pagamento</label>
                            <select class="form-control" name="id_pagamento">
                                    <option>Selecione...</option>
                                <?php foreach ($formas as $forma) : ?>
                                    <option value="<?= $forma->id_pagamento; ?>"><?= $forma->nome; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>                    

                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">   
                        <div class="form-group">
                            <label>Vendedor</label>
                            <select class="form-control" name="id_vendedor">
                                <?php foreach ($vendedores as $vendedor) : ?>
                                    <option value="<?= $vendedor->id_vendedor; ?>"><?= $vendedor->nome_vendedor; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> 
                        <div class="form-group">
                            <button class="btn btn-primary" form="form" type="submit">Cadastrar Venda</button>
                        </div> 
                    </div>                    

                </form>
                
            </div>
        </div>

    </div>
</div>