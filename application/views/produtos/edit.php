<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">                
                <h3>Editar Produto</h3>
                <hr>
                <ol class="breadcrumb">
                    <li><a href="<?= base_url() ?>">Principal</a></li>
                    <li><a href="<?= base_url('produtos') ?>">Listar Produtos</a></li>
                    <li class="active">Editar Produto</li>
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
                            <label>Nome do Produto</label>
                            <input type="text" class="form-control" name="nome" value="<?= set_value('nome', $dados->nome) ?>" required>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">   
                        <div class="form-group">
                            <label>Código de Barras</label>
                            <input type="text" class="form-control" name="codigo_barras" value="<?= set_value('codigo_barras', $dados->codigo_barras) ?>">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">   
                        <div class="form-group">
                            <label>Unidade</label>
                            <input type="text" class="form-control" name="unidade" value="<?= set_value('unidade', $dados->codigo_barras) ?>">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">   
                        <div class="form-group">
                            <label>NCM</label>
                            <input type="text" class="form-control" name="ncm" value="<?= set_value('ncm', $dados->ncm) ?>">
                        </div>
                    </div>                       
                    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">   
                        <div class="form-group">
                            <label>Preço de Custo</label>
                            <input type="text" class="form-control dinheiro" name="preco_custo" value="<?= set_value('preco_custo', $dados->preco_custo) ?>">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">   
                        <div class="form-group">
                            <label>Preço de Venda</label>
                            <input type="text" class="form-control dinheiro" name="preco_venda" value="<?= set_value('preco_venda', $dados->preco_venda) ?>">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">   
                        <div class="form-group">
                            <label>Estoque Mínimo</label>
                            <input type="text" class="form-control" name="estoque_minimo" value="<?= set_value('estoque_minimo', $dados->estoque_minimo) ?>">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">   
                        <div class="form-group">
                            <label>Quantidade em Estoque</label>
                            <input type="text" class="form-control" name="quantidade_estoque" value="<?= set_value('quantidade_estoque', $dados->quantidade_estoque) ?>">
                        </div>
                    </div>   
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">   
                        <div class="form-group pf">
                            <label>Categoria</label>
                            <select name="id_categoria" class="form-control">
                                <?php foreach ($categorias as $row) : ?>
                                    <option value="<?= $row->id_categoria ?>" <?= ($row->id_categoria == $dados->id_categoria ? 'selected=""' : '') ?>><?= $row->categoria ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div> 
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">   
                        <div class="form-group pf">
                            <label>Marca</label>
                            <select name="id_marca" class="form-control">
                                <?php foreach ($marcas as $row) : ?>
                                    <option value="<?= $row->id_marca ?>" <?= ($row->id_marca == $dados->id_marca ? 'selected=""' : '') ?>><?= $row->marca ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>                 
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">   
                        <div class="form-group pf">
                            <label>Fornecedor</label>
                            <select name="id_fornecedor" class="form-control">
                                <?php foreach ($fornecedores as $row) : ?>
                                    <option value="<?= $row->id_fornecedor ?>" <?= ($row->id_fornecedor == $dados->id_fornecedor ? 'selected=""' : '') ?>><?= $row->nome_fantasia ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">   
                        <div class="form-group pf">
                            <label>Status</label>
                            <select name="ativo" class="form-control">
                                <option value="1" <?= ($dados->ativo == 1 ? 'selected=""' : '') ?>>Ativo</option>
                                <option value="2" <?= ($dados->ativo == 2 ? 'selected=""' : '') ?>>Inativo</option>
                            </select>
                        </div>
                    </div>

                    <input type="hidden" name="id" value="<?= $dados->id_produto ?>">

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> 
                        <div class="form-group">
                            <button class="btn btn-primary" form="form" type="submit">Editar Produto</button>
                        </div> 
                    </div>                    

                </form>
                
            </div>
        </div>

    </div>
</div>