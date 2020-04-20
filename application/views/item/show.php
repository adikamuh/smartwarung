<!-- <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span class="mr-2"><a href="index.html">Product</a></span> <span>Product Single</span></p>
                <h1 class="mb-0 bread">Product Single</h1>
            </div>
        </div>
    </div>
</div> -->

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
            </div>
            <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                <h3 class="h3" style="font-weight: bold;"><?php echo $item['name'] ?></h3>
                <!-- <div class="rating d-flex">
                    <p class="text-left mr-4">
                        <a href="#" class="mr-2">5.0</a>
                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                    </p>
                    <p class="text-left mr-4">
                        <a href="#" class="mr-2" style="color: #000;">100 <span style="color: #bbb;">Rating</span></a>
                    </p>
                    <p class="text-left">
                        <a href="#" class="mr-2" style="color: #000;">500 <span style="color: #bbb;">Sold</span></a>
                    </p>
                </div> -->
                <p class="price" ><span style="font-size: 20px;"><?php echo "Rp ".number_format($item['price'], 0, ".", ".") ?></span></p>
                <span class="mr-2 font-weight-bold">Warung:</span><a href="<?php echo site_url('profile/show/').$warung['username'] ?>"><?php echo $warung['name'] ?></a>
                <p><?php echo $item['description'] ?></p>
                <?php if($this->session->userdata('role') == 0): ?>
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
                    <?php elseif($this->session->userdata('role') == 1): ?>
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
</section>

<!-- <section class="ftco-section">
    <div class="container">
            <div class="row justify-content-center mb-3 pb-3">
        <div class="col-md-12 heading-section text-center ftco-animate">
        <span class="subheading">Products</span>
        <h2 class="mb-4">Related Products</h2>
        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
        </div>
    </div>   		
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-3 ftco-animate">
                <div class="product">
                    <a href="#" class="img-prod"><img class="img-fluid" src="images/product-1.jpg" alt="Colorlib Template">
                        <span class="status">30%</span>
                        <div class="overlay"></div>
                    </a>
                    <div class="text py-3 pb-4 px-3 text-center">
                        <h3><a href="#">Bell Pepper</a></h3>
                        <div class="d-flex">
                            <div class="pricing">
                                <p class="price"><span class="mr-2 price-dc">$120.00</span><span class="price-sale">$80.00</span></p>
                            </div>
                        </div>
                        <div class="bottom-area d-flex px-3">
                            <div class="m-auto d-flex">
                                <a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                    <span><i class="ion-ios-menu"></i></span>
                                </a>
                                <a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
                                    <span><i class="ion-ios-cart"></i></span>
                                </a>
                                <a href="#" class="heart d-flex justify-content-center align-items-center ">
                                    <span><i class="ion-ios-heart"></i></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 ftco-animate">
                <div class="product">
                    <a href="#" class="img-prod"><img class="img-fluid" src="images/product-2.jpg" alt="Colorlib Template">
                        <div class="overlay"></div>
                    </a>
                    <div class="text py-3 pb-4 px-3 text-center">
                        <h3><a href="#">Strawberry</a></h3>
                        <div class="d-flex">
                            <div class="pricing">
                                <p class="price"><span>$120.00</span></p>
                            </div>
                        </div>
                        <div class="bottom-area d-flex px-3">
                            <div class="m-auto d-flex">
                                <a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                    <span><i class="ion-ios-menu"></i></span>
                                </a>
                                <a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
                                    <span><i class="ion-ios-cart"></i></span>
                                </a>
                                <a href="#" class="heart d-flex justify-content-center align-items-center ">
                                    <span><i class="ion-ios-heart"></i></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 ftco-animate">
                <div class="product">
                    <a href="#" class="img-prod"><img class="img-fluid" src="images/product-3.jpg" alt="Colorlib Template">
                        <div class="overlay"></div>
                    </a>
                    <div class="text py-3 pb-4 px-3 text-center">
                        <h3><a href="#">Green Beans</a></h3>
                        <div class="d-flex">
                            <div class="pricing">
                                <p class="price"><span>$120.00</span></p>
                            </div>
                        </div>
                        <div class="bottom-area d-flex px-3">
                            <div class="m-auto d-flex">
                                <a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                    <span><i class="ion-ios-menu"></i></span>
                                </a>
                                <a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
                                    <span><i class="ion-ios-cart"></i></span>
                                </a>
                                <a href="#" class="heart d-flex justify-content-center align-items-center ">
                                    <span><i class="ion-ios-heart"></i></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 ftco-animate">
                <div class="product">
                    <a href="#" class="img-prod"><img class="img-fluid" src="images/product-4.jpg" alt="Colorlib Template">
                        <div class="overlay"></div>
                    </a>
                    <div class="text py-3 pb-4 px-3 text-center">
                        <h3><a href="#">Purple Cabbage</a></h3>
                        <div class="d-flex">
                            <div class="pricing">
                                <p class="price"><span>$120.00</span></p>
                            </div>
                        </div>
                        <div class="bottom-area d-flex px-3">
                            <div class="m-auto d-flex">
                                <a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                    <span><i class="ion-ios-menu"></i></span>
                                </a>
                                <a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
                                    <span><i class="ion-ios-cart"></i></span>
                                </a>
                                <a href="#" class="heart d-flex justify-content-center align-items-center ">
                                    <span><i class="ion-ios-heart"></i></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->