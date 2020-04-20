<?php if($this->session->userdata('role') == 0): ?>
<li><a class="active" href="<?php echo site_url('profile')?>">Profile</a></li>
<li><a href="<?php echo site_url('profile/order') ?>">Pesanan saya</a></li>
<?php elseif($this->session->userdata('role') == 1): ?>
<li><a href="<?php echo site_url('profile')?>">Profile</a></li>
<li><a class="active" href="<?php echo site_url('profile/etalase') ?>">Etalase</a></li>
<li><a href="<?php echo site_url('profile/order') ?>">Pesanan masuk</a></li>
<?php elseif($this->session->userdata('role') == 99): ?>
<li><a <?php echo($active == 'index'?'class="active"':'') ?> href="<?php echo site_url('admin')?>">Semua</a></li>
<li><a <?php echo($active == 'warung'?'class="active"':'') ?> href="<?php echo site_url('admin/warung') ?>">Warung</a></li>
<li><a <?php echo($active == 'user'?'class="active"':'') ?> href="<?php echo site_url('admin/user') ?>">User</a></li>
<?php endif; ?>