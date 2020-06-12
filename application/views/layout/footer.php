</div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?= base_url('js/jquery.js') ?>"></script> 

    
    <script src="<?= base_url('js/jquery-migrate.js') ?>"></script>     

    <!-- Bootstrap Core JavaScript -->
    <script src="<?= base_url('js/bootstrap.min.js') ?>"></script>

    <!-- DataTable -->
    <script src="<?= base_url('jquery/jquery.datatable/js/jquery.dataTables.min.js') ?>" type="text/javascript"></script>
    <script src="<?= base_url('jquery/jquery.datatable/js/datatables_bootstrap.js') ?>" type="text/javascript"></script>  

    <!-- MaskedInput --> 
    <script src="<?= base_url('jquery/jquery.maskedinput/jquery.maskedinput.js') ?>" type="text/javascript"></script>

    <!-- MaskMoney --> 
    <script src="<?= base_url('jquery/jquery.maskMoney/jquery.maskMoney.js') ?>" type="text/javascript"></script>

    <!-- Auto Complete --> 
    <script src="<?= base_url('jquery/jquery.ui/jquery-ui.js') ?>" type="text/javascript"></script>

    <!-- Calculation --> 
    <script src="<?= base_url('jquery/jquery.calculation/jquery.calculation.js') ?>" type="text/javascript"></script>

    <!-- Chart.js -->
    <script src="<?= base_url('jquery/chart_js/Chart.min.js') ?>" type="text/javascript"></script>  

    <!-- main.js -->
    <script src="<?= base_url('js/main.js') ?>" type="text/javascript"></script>

    <!-- JS da Página -->
    <?php 
        if (isset($js)) {
            echo '<script src="'.base_url($js).'" type="text/javascript"></script>';
        }
    ?>

</body>

</html>
