<div class="container_in">
    <div class="content_dinamic">
        <div class="tickets_div">
            <?php echo $_GET['mail']; ?>

            <?php if ($row_DatosInvoice > 0) { // Show if recordset not empty ?>
                <?php do { ?>
            <div class="table_invoice_lista">
                <div class="lined1_invoice_lista">
                    <h3><?php echo eventName($row_DatosInvoice['id_event']); ?></h3>
                </div>
                <div class="lined2_invoice_lista">
                    <?php echo month(billingMonth($row_DatosInvoice['order_number'], $row_DatosInvoice['id_event'])); ?> 
                </div>
                <div class="lined3_invoice_lista">
                    <?php echo $row_DatosInvoice['order_number']; ?> 
                </div>
                <div class="lined4_invoice_lista">
                    <?php echo totalIncome($row_DatosInvoice['order_number'], $row_DatosInvoice['id_event']); ?> / <?php echo FeesIncome($row_DatosInvoice['order_number'], $row_DatosInvoice['id_event']); ?>
                </div>
                <div class="lined5_invoice_lista">
                    <?php echo actInact($row_DatosInvoice['status']); ?> 
                </div>
            </div>
            <?php } while ($row_DatosInvoice = mysqli_fetch_assoc($DatosInvoice)); 
                 } ?>
        </div>
    </div>
</div>