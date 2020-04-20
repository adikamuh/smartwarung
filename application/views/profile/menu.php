<?php if($user['role'] == 0): ?>
    <li><a <?php echo($active == 'index'?'class="active"':'') ?> href="<?php echo site_url('profile')?>">Profile</a></li>
    <?php if($this->session->userdata('username')==$user['username']): ?>
    <li><a <?php echo($active == 'order'?'class="active"':'') ?> href="<?php echo site_url('profile/order') ?>">Pesanan saya</a></li>
    <?php endif; ?>
<?php elseif($user['role'] == 1): ?>
    <li><a <?php echo($active == 'index'?'class="active"':'') ?> href="<?php echo site_url('profile')?>">Profile</a></li>
    <li><a <?php echo($active == 'etalase'?'class="active"':'') ?> href="<?php echo site_url('profile/etalase/').$user['username'] ?>">Etalase</a></li>
    <?php  if($this->session->userdata('username') == $user['username']): ?>
    <li><a <?php echo($active == 'order'?'class="active"':'') ?> href="<?php echo site_url('profile/order') ?>">Pesanan masuk</a></li>
    <?php endif ?>
<?php endif; ?>