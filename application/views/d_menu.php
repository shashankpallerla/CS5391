<div class="nav flex-column nav-pills">
    <a class="nav-link <?php if($this->uri->segment('1') == 'dashboard' && $this->uri->segment('2') ==""){ echo "active"; } ?>" id="v-pills-home-tab" href="<?php echo base_url('dashboard'); ?>">Dashboard</a>
    <a class="nav-link <?php if($this->uri->segment('2') == 'flightorders'){ echo "active"; } ?>" id="v-pills-home-tab" href="<?php echo base_url('dashboard'); ?>/flightorders">Flight Orders</a>
    <a class="nav-link <?php if($this->uri->segment('2') == 'hotelorders'){ echo "active"; } ?>" id="v-pills-home-tab" href="<?php echo base_url('dashboard'); ?>/hotelorders">Hotel Orders</a>
    <a class="nav-link <?php if($this->uri->segment('2') == 'update'){ echo "active"; } ?>" id="v-pills-home-tab" href="<?php echo base_url('dashboard'); ?>/update">Update Profile</a>
</div>
