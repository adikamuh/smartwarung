<div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
	<div class="container">
	<div class="row no-gutters slider-text align-items-center justify-content-center">
		<div class="col-md-9 ftco-animate text-center">
		<p class="breadcrumbs" style="color: black;"><span class="mr-2" ><a href="<?php echo base_url(); ?>" style="color: black;">Home</a></span> <span style="color: black;">Profile</span></p>
		<h1 class="mb-0 bread" style="color: black;"><?php echo $user['name'] ?></h1>
		</div>
	</div>
	</div>
</div>

    <section class="ftco-section">
    <div class="container">
        <?php if($this->session->flashdata('errors') != ''): ?>
        <div class="alert alert-danger text-center" role="alert">
          <?php echo $this->session->flashdata('errors'); ?>
        </div>
        <?php endif; ?>
        <?php if($this->session->flashdata('success')!= ''): ?>
        <div class="alert alert-success text-center" role="alert">
          <?php echo $this->session->flashdata('success') ?>
        </div>
        <?php endif; ?>
        <div class="row justify-content-center">
            <div class="col-md-10 mb-5 text-center">
                <ul class="product-category">
                <?php include APPPATH.'views/profile/menu.php'; ?>
                </ul>
            </div>
        </div>
        <div class="row">
            <!-- content -->
            <div class="container">
                <?php $i=0;foreach($invoices as $invoice): ?>
                <div class="row mb-5">
                    <div class="col-md-12">
                        <div class="info bg-light p-4">
                            <div class="row pl-4 mb-2">
                                <h5>Invoice id: <span class="text-success"><?php echo $invoice['invoice_id'] ?></span></h5>
                            </div>
                            <div class="row pl-4 text-center">
                                <div class="col-sm-4 pt-3">
                                    <a href="" class="py-auto"><?php echo $invoice['warung_name'] ?></a>
                                </div>
                                <div class="col-sm-4" style="border-left-style:solid;">
                                    <span>Total: <br> <span class="text-danger "><?php echo "Rp ".number_format($invoice['total'], 0, ".", ".") ?></span></span>
                                </div>
                                <div class="col-sm-4" style="border-left-style:solid;">
                                    <span>Status: <br> 
                                    <?php if($invoice['invoice_status'] == "Menunggu proses penjual"): ?>
                                        <span class="text-warning"><?php echo $invoice['invoice_status'] ?></span>
                                    <?php elseif($invoice['invoice_status'] == "Sedang dikirim"): ?>
                                        <span class="text-info"><?php echo $invoice['invoice_status'] ?></span>
                                    <?php elseif($invoice['invoice_status'] == "Sudah diterima"): ?>
                                        <span class="text-success"><?php echo $invoice['invoice_status'] ?></span>
                                    <?php elseif($invoice['invoice_status'] == "Dibatalkan"): ?>
                                        <span class="text-danger"><?php echo $invoice['invoice_status'] ?></span>
                                    <?php endif; ?>
                                    </span>
                                    
                                </div>
                            </div>
                            <div class="row mt-4" >
                                <div class="offset-sm-8 col-sm-4">
                                    <button class="btn btn-sm btn-primary px-4 float-right" data-toggle="modal" data-target="#modal" onclick="get_details('<?php echo $invoice['invoice_id'] ?>')">Detail belanja</button>
                                    <!-- <input type="text" id="details" value="<?php echo $invoice['invoice_id'] ?>" hidden> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Detail belanja</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="content">
                        </div>
                        <div class="modal-footer" id="footer">
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- endcontent -->
        </div>
        <div class="row mt-5">
        <div class="col text-center">
        <div class="block-27">
        </div>
        </div>
    </div>
    </div>
</section>