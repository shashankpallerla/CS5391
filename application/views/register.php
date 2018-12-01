<?php include("nav.php"); ?>

<div class="container">
    <div class="col-6">
    <br>
    <h1>Register</h1>

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

    <?php echo form_open("home/register");?>

     <div class="form-group row">
            <label for="first_name" class="col-4 col-form-label">First Name</label>
            <div class="col-8">
                <input id="first_name" name="first_name" type="text" required="required" class="form-control here">
            </div>
        </div>
        <div class="form-group row">
            <label for="middle_name" class="col-4 col-form-label">Middle Name</label>
            <div class="col-8">
                <input id="middle_name" name="middle_name" type="text" required="required" class="form-control here">
            </div>
        </div>
        <div class="form-group row">
            <label for="last_name" class="col-4 col-form-label">Last Name</label>
            <div class="col-8">
                <input id="last_name" name="last_name" type="text" required="required" class="form-control here">
            </div>
        </div>

        <div class="form-group row">
            <label for="address" class="col-4 col-form-label">Address</label>
            <div class="col-8">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-address-card"></i>
                    </div>
                    <input id="address" name="address" type="text" required="required" class="form-control here">
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="city" class="col-4 col-form-label">City</label>
            <div class="col-8">
                <input id="city" name="city" type="text" required="required" class="form-control here">
            </div>
        </div>
        <div class="form-group row">
            <label for="state" class="col-4 col-form-label">State</label>
            <div class="col-8">
                <input id="state" name="state" type="text" required="required" class="form-control here">
            </div>
        </div>
        <div class="form-group row">
            <label for="country" class="col-4 col-form-label">Country</label>
            <div class="col-8">
                <input id="country" name="country" type="text" required="required" class="form-control here">
            </div>
        </div>
        <div class="form-group row">
            <label for="zipcode" class="col-4 col-form-label">Zipcode</label>
            <div class="col-8">
                <input id="zipcode" name="zipcode" type="text" required="required" class="form-control here">
            </div>
        </div>
        <div class="form-group row">
            <label for="cardno" class="col-4 col-form-label">Credit Card No</label>
            <div class="col-8">
                <input id="cardno" name="cardno" type="text" required="required" class="form-control here">
            </div>
        </div>
        <div class="form-group row">
            <label for="expirymonth" class="col-4 col-form-label">Expiry Month</label>
            <div class="col-8">
                <select id="expirymonth" name="expirymonth" required="required" class="custom-select">
                    <option value="01">01</option>
                    <option value="02">02</option>
                    <option value="03">03</option>
                    <option value="04">04</option>
                    <option value="05">05</option>
                    <option value="06">06</option>
                    <option value="07">07</option>
                    <option value="08">08</option>
                    <option value="09">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="expiryyear" class="col-4 col-form-label">Expiry Year</label>
            <div class="col-8">
                <select id="expiryyear" name="expiryyear" required="required" class="custom-select">
                    <?php for($i = 2018;$i < 2030; $i++){ ?>
                        <option value="<?php echo $i; ?>"><?=$i;?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="cvv" class="col-4 col-form-label">CVV</label>
            <div class="col-8">
                <input id="cvv" name="cvv" type="text" required="required" class="form-control here">
            </div>
        </div>

        <div class="form-group row">
            <label for="username" class="col-4 col-form-label">Username</label>
            <div class="col-8">
                <input id="username" name="username" type="text" required="required" class="form-control here">
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