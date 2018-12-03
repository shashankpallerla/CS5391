<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="#">TravelWire</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item <?php if($this->uri->segment('1') == ''){ echo "active"; } ?>">
                <a class="nav-link" href="<?php echo base_url(); ?>">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item <?php if($this->uri->segment('1') == 'flights'){ echo "active"; } ?>">
                <a class="nav-link" href="<?php echo base_url(); ?>flights">Flights</a>
            </li>
            <li class="nav-item <?php if($this->uri->segment('1') == 'hotels'){ echo "active"; } ?>">
                <a class="nav-link" href="<?php echo base_url(); ?>hotels">Hotels</a>
            </li>
<!--            <li class="nav-item <?php if($this->uri->segment('1') == 'deals'){ echo "active"; } ?>">-->
<!--                <a class="nav-link" href="--><?php //echo base_url(); ?><!--deals">Deals</a>-->
<!--            </li>-->
            <li class="nav-item <?php if($this->uri->segment('1') == 'feedback'){ echo "active"; } ?>">
                <a class="nav-link" href="<?php echo base_url(); ?>feedback">Feedback</a>
            </li>
            <li class="nav-item <?php if($this->uri->segment('1') == 'flightstatus'){ echo "active"; } ?>">
                <a class="nav-link" href="<?php echo base_url(); ?>flightstatus">Check Flight status</a>
            </li>
<!--            <li class="nav-item">-->
<!--                <a class="nav-link" href="--><?php //echo base_url(); ?><!--contact">Contact Us</a>-->
<!--            </li>-->
            <?php if($this->ion_auth->logged_in() == FALSE){ ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url(); ?>register">Register</a>
            </li>
            <?php } ?>
        </ul>
        <?php if($this->ion_auth->logged_in() == FALSE){ ?>
        <form class="form-inline my-2 my-lg-0" method="POST" action="<?php echo base_url();?>login">
            <input class="form-control mr-sm-2" type="text" placeholder="Username" aria-label="Username" name="username">
            <input class="form-control mr-sm-2" type="password" placeholder="Password" aria-label="Password" name="password">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Login</button>
        </form>
        <?php }else{ ?>
            <a href="<?php echo base_url(); ?>dashboard" ><input type="button" class="btn mr-sm-2" value="Dashboard"></a>
            <a href="<?php echo base_url(); ?>logout" ><input type="button" class="btn" value="Logout"></a>
        <?php } ?>

    </div>
</nav>