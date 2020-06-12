<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">                
                <h3>Nova Ordem de Serviço</h3>
                <hr>
                <ol class="breadcrumb">
                    <li><a href="<?= base_url() ?>">Principal</a></li>
                    <li><a href="<?= base_url('os') ?>">Listar Ordens de Serviços</a></li>
                    <li class="active">Nova Ordem de Serviço</li>
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
                                <input type="text" class="form-control" name="cliente" id="cliente" value="<?= set_value('cliente') ?>" placeholder="Nome cliente" required>
                                <input type="hidden" value="" name="id_cliente">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                            <div class="form-group">
                                <label>Data de emissão</label>
                                <input type="text" class="form-control" name="data_emissao" value="<?= set_value('data_emissao', dataDia()) ?>" placeholder="Data de emissão" required>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option value="1">Aberta</option>
                                    <option value="2">Finalizada</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label>Equipamento</label>
                                <input type="text" class="form-control" name="equipamento" value="<?= set_value('equipamento') ?>" placeholder="Equipamento" required>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label>Marca</label>
                                <input type="text" class="form-control" name="marca" value="<?= set_value('marca') ?>" placeholder="Marca">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label>Modelo</label>
                                <input type="text" class="form-control" name="modelo" value="<?= set_value('modelo') ?>" placeholder="Modelo">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label>Acessórios</label>
                                <textarea name="acessorios" class="form-control" rows="6"><?= set_value('acessorios') ?></textarea>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label>Defeito</label>
                                <textarea name="defeito" class="form-control" rows="6"><?= set_value('defeito') ?></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary" form="form" type="submit">Cadastrar Ordem de Serviço</button>
                    </div>

                </form>

            </div>
        </div>

    </div>
</div>