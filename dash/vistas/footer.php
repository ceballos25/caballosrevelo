</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Comfirmación</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">¿Estás segur@ de abandonar la sesión? </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="../salir.php">Sí, salir</a>
            </div>
        </div>
    </div>
</div>

<!-- variable a js con php -->
<script>
    // Pasar datos de PHP a JavaScript
    var ciudadesConMasVentas = <?php echo json_encode($ciudadesConMasVentas); ?>;

    // Pasar datos de PHP a JavaScript
    var ventasPorTipo = <?php echo json_encode($ventasPorTipo); ?>;
</script>
<!-- Bootstrap core JavaScript-->
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript
    <script src="../footer.php"></script> -->

<!-- Custom scripts for all pages-->
<script src="../j/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="../vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="../js/demo/chart-area-demo.js"></script>
<script src="../js/demo/chart-pie-demo.js"></script>
<script src="../js/demo/chart-bar-demo.js"></script>

<!-- Page level plugins -->
<script src="../vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="../js/demo/datatables-demo.js"></script>

<!-- script del main -->
<script src="../js/main.js"></script>
<script src="../../js/forzar-venta.js"></script>

<!-- script departamentos -->
<script src="../../js/departamentos.js"></script>

</body>

</html>