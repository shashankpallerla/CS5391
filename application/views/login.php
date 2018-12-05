<?php include("nav.php"); ?>

<div class="container">
    <div class="col-6">
        <br>
        <h1>Login</h1>

        <?php if(strlen($this->session->flashdata('errors')) > 0) { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $this->session->flashdata('errors'); ?>
            </div>
        <?php } ?>

        <?php if(strlen($this->session->flashdata('messages')) > 0) { ?>
            <div class="alert alert-success" role="alert">
                <?php echo $this->session->flashdata('messages'); ?>
            </div>
        <?php } ?>

        <?php echo form_open("home/login");?>

        <div class="form-group row">
            <label for="email" class="col-4 col-form-label">Username</label>
            <div class="col-8">
                <input id="username" name="username" type="text" required="required" class="form-control here">
            </div>
        </div>
        <div class="form-group row">
            <label for="password" class="col-4 col-form-label">Password</label>
            <div class="col-8">
                <input id="password" name="password" type="password" required="required" class="form-control here">
            </div>
        </div>

        <?php if(isset($_GET['ref'])){ ?>
        <input type="hidden" name="ref" value="<?php echo $_GET['ref']; ?>">
        <?php } ?>
        <div class="form-group row">
            <div class="offset-4 col-8">
                <button name="submit" type="submit" class="btn btn-primary">Login</button>
            </div>
        </div>

        <?php echo form_close();?>

    </div>