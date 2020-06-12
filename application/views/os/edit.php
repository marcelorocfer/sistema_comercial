<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <h3>Nova Ordem de serviço</h3>
                <hr>
                <ol class="breadcrumb">
                    <li><a href="<?= base_url() ?>">Principal</a></li>
                    <li><a href="<?= base_url('os') ?>">Listar Ordens de Serviços</a></li>
                    <li class="active">Nova Ordem de serviço</li>
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
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label>Cliente</label>
                                <input type="text" class="form-control" name="cliente" id="cliente" value="<?= set_value('cliente', $dados->nome) ?>" placeholder="Nome cliente" required>
                                <input type="hidden" value="<?= $dados->id_cliente ?>" name="id_cliente">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                            <div class="form-group">
                                <label>Data de Emissão</label>
                                <input type="text" class="form-control" name="data_emissao" value="<?= set_value('data_emissao', formataDataView($dados->data_emissao)) ?>" placeholder="Data de emissão" required>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option value="1" <?= ($dados->status == 1 ? 'selected=""' : '') ?>>Aberta</option>
                                    <option value="2" <?= ($dados->status == 2 ? 'selected=""' : '') ?>>Finalizada</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label>Equipamento</label>
                                <input type="text" class="form-control" name="equipamento" value="<?= set_value('equipamento', $dados->equipamento) ?>" placeholder="Equipamento" required>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label>Marca</label>
                                <input type="text" class="form-control" name="marca" value="<?= set_value('marca', $dados->marca) ?>" placeholder="Marca">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label>Modelo</label>
                                <input type="text" class="form-control" name="modelo" value="<?= set_value('modelo', $dados->modelo) ?>" placeholder="Modelo">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label>Acessórios</label>
                                <textarea name="acessorios" class="form-control" rows="6"><?= set_value('acessorios', $dados->acessorios) ?></textarea>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label>Defeito</label>
                                <textarea name="defeito" class="form-control" rows="6"><?= set_value('defeito', $dados->defeito) ?></textarea>
                            </div>
                        </div>
                    </div>

                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th class="col-xs-12 col-sm-6 col-md-6 col-lg-6">Serviço</th>
                            <th class="col-xs-12 col-sm-2 col-md-2 col-lg-2">Quant</th>
                            <th class="col-xs-12 col-sm-2 col-md-2 col-lg-2">Valor unitário</th>
                            <th class="col-xs-12 col-sm-2 col-md-2 col-lg-2">Valor total</th>
                        </tr>
                        </thead>

                        <tbody id="lista_servico">
                        <?php foreach ($servicos as $servico) : ?>
                            <tr class="linhas">
                                <th></th>
                                <td>
                                    <input type="hidden" value="<?= $servico->id_servico ?>" name="id_servico[]">
                                    <input type="text" name="servico[]" id="txtServico_1" value="<?= $servico->nome_servico ?>" class="form-control" />
                                </td>
                                <td>
                                    <input type="text" name="qtde[]" id="qtde_1" value="<?= $servico->quantidade ?>" class="form-control text-center" readonly/>
                                </td>
                                <td>
                                    <input type="text" name="valor_unit[]" id="valor_unit_1" style="text-align:right" class="form-control text-right moeda" value="<?= $servico->valor_servico ?>" />
                                </td>
                                <td>
                                    <input type="text" name="valor_total[]" class="form-control text-right" readonly />
                                </td>
                            </tr>
                        <?php endforeach ?>
                        </tbody>

                    </table>


                    <div class="row">
                        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
                            <button type="button" class="btn btn-success" id="add_servico">Adicionar Novo Serviço</button>
                        </div>
                        <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                            Valor entrada
                        </div>
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                            <input type="text" class="form-control moeda text-right" name="valor_entrada" value="<?= set_value('valor_entrada', $dados->valor_entrada) ?>" placeholder="0.00">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">

                        </div>
                        <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                            Valor desconto
                        </div>
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                            <input type="text" class="form-control moeda text-right" name="valor_desconto" value="<?= set_value('valor_desconto', $dados->valor_desconto) ?>" placeholder="0.00" >
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">

                        </div>
                        <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                            VALOR A PAGAR
                        </div>
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                            <input type="text" class="form-control text-right" name="total_pagar" value="<?= set_value('total_pagar') ?>" placeholder="0.00" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                            <div class="form-group">
                                <label>Forma de Pagamento</label>
                                <select name="id_pagamento" class="form-control">

                                    <?php foreach ($formas as $forma) : ?>
                                        <option value="<?= $forma->id_pagamento; ?>" <?= ($dados->id_pagamento == $forma->id_pagamento ? 'selected=""' : ''); ?>><?= $forma->nome; ?>
                                    <?php endforeach ?>

                                </select>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="id_ordem" value="<?= $dados->id_ordem ?>">

                    <div class="form-group">
                        <button class="btn btn-primary" form="form" type="submit">Atualizar Ordem de Serviço</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>