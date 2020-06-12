<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                
                <h3>Produtos Cadastrados</h3>
                <hr>
                <ol class="breadcrumb">
                    <li><a href="principal">Principal</a></li>
                    <li class="active">Produtos Cadastrados</li>
                </ol>

            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <?php 
                    get_msg('msgsuccess');
                    get_msg('msgerro'); 
                ?>
            </div>
        </div>

        <div class="row margin-bottom10">            
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-right">
                <a href="<?= base_url('relatorios/lista_conferencia') ?>" title="Conferência de Produtos" class="btn btn-primary">
                    Conferência
                </a>
                <a href="<?= base_url('relatorios/lista_lucro') ?>" title="Relatório dos Lucros Obtidos" class="btn btn-primary">
                    Lucros
                </a>
                <a href="<?= base_url('relatorios/listar_produtos') ?>" title="Gerar Lista de Produtos" class="btn btn-primary">
                    Relatório
                </a>
                <a href="<?= base_url('produtos/add') ?>" title="Criar Novo Produto" class="btn btn-success">
                    <i class="fa fa-plus-square" aria-hidden="true"></i>
                </a>
            </div>                
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                    <table class="table table-bordered table-striped" id="datatable">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>Estoque</th>
                                <th class="text-center">Preço de Venda</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                        <?php foreach ($produtos as $produto) : ?>


                            <tr>
                                <td><?= $produto->id_produto ?></td>
                                <td><?= $produto->nome ?></td>
                                <td><?= $produto->quantidade_estoque ?></td>
                                <td class="text-center"><?= formatoMoeda($produto->preco_venda) ?></td>     
                                <td class="text-center"><?= ($produto->ativo == 1 ? '<a href="produtos/status/'.$produto->id_produto.'" title="Inativar Produto" class="btn btn-success btn-xs">Ativo</a>' : '<a href="produtos/status/'.$produto->id_produto.'" title="Ativar Produto" class="btn btn-danger btn-xs">Inativo') ?></td>                           
                                <td class="text-center"><a href="<?= base_url("produtos/edit/$produto->id_produto") ?>" title="Editar Produto" class="btn btn-primary"><i class="fa fa-pencil-square" aria-hidden="true"></i></a> <a href="<?= base_url("produtos/del/$produto->id_produto") ?>" title="Excluir Produto" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></a></td>
                            </tr>
                        
                        <?php endforeach; ?>

                        </tbody>

                        

                    </table>
                    
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->