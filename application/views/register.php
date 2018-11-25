<?php include("nav.php"); ?>

<div class="container">
    <div class="col-6">
    <br>
    <h1>Register</h1>

        <?php if(strlen($this->session->flashdata('message')) > 0) { ?>
            <?php echo $this->session->flashdata('message'); ?>
        <?php } ?>

    <?php echo form_open("home/register");?>

     <div class="form-group row">
            <label for="first_name" class="col-4 col-form-label">First Name</label>
            <div class="col-8">
                <input id="first_name" name="first_name" type="text" required="required" class="form-control here">
            </div>
        </div>
        <div class="form-group row">
            <label for="last_name" class="col-4 col-form-label">Last Name</label>
            <div class="col-8">
                <input id="last_name" name="last_name" type="text" required="required" class="form-control here">
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-4 col-form-label">Email</label>
            <div class="col-8">
                <input id="email" name="email" type="text" required="required" class="form-control here">
            </div>
        </div>
        <div class="form-group row">
            <label for="password" class="col-4 col-form-label">Password</label>
            <div class="col-8">
                <input id="password" name="password" type="password" required="required" class="form-control here">
            </div>
        </div>
        <div class="form-group row">
            <label for="cpassword" class="col-4 col-form-label">Confirm Password</label>
            <div class="col-8">
                <input id="cpassword" name="cpassword" type="password" required="required" class="form-control here">
            </div>
        </div>
        <div class="form-group row">
            <div class="offset-4 col-8">
                <button name="submit" type="submit" class="btn btn-primary">Register</button>
            </div>
        </div>

    <?php echo form_close();?>

    </div>