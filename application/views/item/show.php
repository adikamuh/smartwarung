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
        <div class="row">
            <div class="col-lg-6 mb-5 ftco-animate">
                <div class="owl-carousel" >
                    <?php $photos = explode(',',$item['photo']);foreach($photos as $photo): ?>
                    <div class="item" width="480px" height="480px" >
                        <a href="<?php echo base_url('assets/uploads/').$photo ?>" class="image-popup"><img style="width: auto; height:500px;" src="<?php echo base_url('assets/uploads/').$photo ?>" class=""></a>
                    </div>
                    <?php endforeach;?>
                </div>
                <?php if($this->session->userdata('username')==$item['username']): ?>
                <a class="btn btn-sm btn-primary py-2 px-5 text-white" style="margin-left: 34%" data-toggle="modal" data-target="#modal-photo">Ganti foto</a>
                <?php endif; ?>
            </div>
            <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                <h3 class="h3" style="font-weight: bold;"><?php echo $item['name'] ?></h3>

                
                <p class="price" ><span style="font-size: 20px;"><?php echo "Rp ".number_format($item['price'], 0, ".", ".") ?></span></p>
                <div class="rating d-flex">
                    <span class="mr-2 font-weight-bold">Rating</span>
                    <p class="text-left mr-4">
                        <a href="#" class="mr-2"><?php echo round($rating['rating'],1) ?></a>
                        <a href="#"><span class="ion-ios-star"></span></a>
                    </p>
                </div>
                <span class="mr-2 font-weight-bold">Warung:</span><a href="<?php echo site_url('profile/show/').$warung['username'] ?>"><?php echo $warung['name'] ?></a>
                <br><br><span class="font-weight-bold">Deskripsi</span>
                <p><?php echo $item['description'] ?></p>
                <?php if($this->session->userdata('role') == null): ?>
                <div class="row mt-4">
                    <div class="w-100"></div>
                    <div class="input-group col-md-7 mb-3">
                        <form id="target" action="<?php echo site_url('cart/store/').$item['id'] ?>" class="billing-form" method="post" >
                        <div class="w-100"></div>
                        <div class="form-row">

                            <div class="col-md-3">
                                <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
                            </div>
                            <div class="col-md-7 ml-3 my-auto">
                                <input type="submit" class="btn btn-black py-2 px-3" data-toggle="tooltip" data-placement="top" title="Anda harus login terlebih dahulu" value="Add to cart"></input>
                            </div>
                            
                        </div>
                        <div class="w-100"></div>
                        </form>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-md-12">
                        <p style="color: #000;"><span id="stock"><?php echo $item['stock'] ?></span> Stocks available</p>
                    </div>
                </div>
                <?php elseif($this->session->userdata('role') == 0): ?>
                    <div class="row mt-4">
                        <div class="w-100"></div>
                        <div class="input-group col-md-7 mb-3">
                            <form id="target" action="<?php echo site_url('cart/store/').$item['id'] ?>" class="billing-form" method="post" >
                            <div class="w-100"></div>
                            <div class="form-row">

                                <div class="col-md-3">
                                    <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
                                </div>
                                <div class="col-md-3 ml-3 my-auto">
                                    <input type="submit" class="btn btn-black py-2 px-3" value="Add to cart">
                                </div>
                                
                            </div>
                            <div class="w-100"></div>
                            </form>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-12">
                            <p style="color: #000;"><span id="stock"><?php echo $item['stock'] ?></span> Stocks available</p>
                        </div>
                    </div>
                    <!-- <p><a href="cart.html" class="btn btn-black py-3 px-5">Add to Cart</a></p> -->
                    <?php elseif($this->session->userdata('username') == $item['username']): ?>
                    <div class="row mt-4">
                        <div class="w-100"></div>
                        <div class="col-md-12">
                            <p style="color: #000;"><?php echo $item['stock'] ?> Stocks available</p>
                        </div>
                    </div>
                    <div class="row">
                        <p><a href="<?php echo site_url('item/edit/').$item['id'] ?>" class="btn btn-warning py-2 px-5">Edit</a></p>
                        <p class="ml-3"><a href="<?php echo site_url('item/delete/').$item['id'] ?>" onclick="return confirm('Apakah Anda yakin akan menghapus?');" class="btn btn-danger py-2 px-5">Hapus</a></p>

                    </div>

                    <?php endif;?>
            </div>
        </div>
    </div>
    <hr class="col-md-8">
    <div class="container">
        <div class="offset-md-2 col-md-8">
            <div class="pt-5 mt-3">
                <h4 class="mb-5">Ulasan</h4>
                <ul class="comment-list">
                    <?php if($reviews==null): ?>
                        <h6>Belum ada ulasan.</h6>
                    <?php endif ?>
                    <?php foreach($reviews as $review): ?>
                    <li class="comment">
                        <h6 class="text-dark"><?php echo $review['name'] ?></h6>
                        <p><?php echo $review['review'] ?></p>
                    </li>
                    <?php endforeach ?>
                </ul>
            </div>
        </div>
    </div>
</section>
<?php if($this->session->userdata('username')==$item['username']): ?>
    <!-- Modal -->
    <div class="modal fade" id="modal-photo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Foto Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-sm-12 ftco-animate">
                            <form method="POST" action="<?php echo site_url('item/change_photo/').$item['id'] ?>" enctype="multipart/form-data">
                                <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="photo">Upload foto</label>
                                    <input type="file" required class="form-control" name="files[]" multiple placeholder="Choose photos">
                                    <?php echo form_error('file', '<small class="text-danger error">', '</small>'); ?>
                                </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn px-3 btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" class="btn px-3 btn-primary" value="Ganti Foto">
                </form>
            </div>
            </div>
        </div>
        </div>
    <!-- endmodal -->
<?php endif; ?>