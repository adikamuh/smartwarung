<div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
	<div class="container">
	<div class="row no-gutters slider-text align-items-center justify-content-center">
		<div class="col-md-9 ftco-animate text-center">
		<p class="breadcrumbs" style="color: black;"><span class="mr-2" ><a href="<?php echo base_url(); ?>" style="color: black;">Home</a></span> <span style="color: black;">Profile</span></p>
		<h1 class="mb-0 bread" style="color: black;"><?php echo $user['name']; ?></h1>
		</div>
	</div>
	</div>
</div>

    <section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 mb-5 text-center">
                <ul class="product-category">
                    <?php if($this->session->userdata('role') == 0): ?>
                    <li><a class="active" href="<?php echo site_url('profile')?>">Profile</a></li>
                    <li><a href="<?php echo site_url('profile/order') ?>">Pesanan saya</a></li>
                    <?php elseif($this->session->userdata('role') == 1): ?>
                    <li><a class="active" href="<?php echo site_url('profile')?>">Profile</a></li>
                    <li><a href="<?php echo site_url('profile/etalase') ?>">Etalase</a></li>
                    <li><a href="<?php echo site_url('profile/order') ?>">Pesanan masuk</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
        <div class="row">
            <!-- content -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 mb-5 ftco-animate">
                        <?php if($user['photo'] == null): ?>
                        <a href="<?php echo base_url('assets/images/no-photo.png') ?>" class="image-popup"><img src="<?php echo base_url('assets/images/no-photo.png') ?>" class="img-fluid" ></a>
                        <?php else: ?>
                            <a href="<?php $photos = explode(',',$user['photo']); echo base_url('assets/uploads/').$photos[0] ?>" class="image-popup"><img src="<?php $photos = explode(',',$user['photo']); echo base_url('assets/uploads/').$photos[0] ?>" class="img-fluid" ></a>
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-8 product-details pl-md-5 ftco-animate">
                        <h3><?php echo $user['name'] ?></h3>
                        <p>Phone    : <?php echo $user['phone'] ?></p>
                        <p>E-mail   : <?php echo $user['email'] ?></p>
                            <a href="" class="btn-sm btn-warning py-2 px-3">Ubah profile</a>
                            <a href="" class="btn-sm btn-dark py-2 px-3">Ganti password</a>
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