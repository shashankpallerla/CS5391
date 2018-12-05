<?php include("nav.php"); ?>

<div class="container" style="margin-top: 3%">
    <h3>Register</h3>
    <hr>
    <div class="row">

    <div class="col-md-6">

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

        <div class="form-row">
            <div class="col-md-12">
            <h5>Personal Details</h5>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input id="first_name" name="first_name" type="text" required="required" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="middle_name" >Middle Name</label>
                    <input id="middle_name" name="middle_name" type="text" class="form-control" placeholder="if any">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="last_name" >Last Name</label>
                    <input id="last_name" name="last_name" type="text" required="required" class="form-control">
                </div>
            </div>

            <div class="col-md-8">
                <div class="form-group">
                    <label for="address" >Address</label>
                    <input id="address" name="address" type="text" required="required" class="form-control">
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="city" >City</label>
                    <input id="city" name="city" type="text" required="required" class="form-control">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="state" >State</label>
                    <input id="state" name="state" type="text" required="required" class="form-control">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="state" >Country</label>
                    <input id="country" name="country" type="text" required="required" class="form-control">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="zipcode" >Zipcode</label>
                    <input id="zipcode" name="zipcode" type="text" required="required" class="form-control">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="Username" >Username</label>
                    <input id="Username" name="username" type="text" required="required" class="form-control here">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="email" >Email</label>
                    <input id="email" name="email" type="text" required="required" class="form-control here">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="password" >Password</label>
                    <input id="password" name="password" type="password" required="required" class="form-control here">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="cpassword" >Confirm Password</label>
                    <input id="cpassword" name="cpassword" type="password" required="required" class="form-control here">
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
       <div class="form-row">
           <div class="col-md-12">
               <h5>Card Information</h5>
           </div>
           <div class="col-md-6">
               <div class="form-group">
                   <label for="state" >Credit Card No</label>
                   <input id="cardno" name="cardno" type="text" required="required" class="form-control">
               </div>
           </div>

           <div class="col-md-6">
               <div class="form-group">
                   <label for="expirymonth" >Expiry Month</label>
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

           <div class="col-md-6">
               <div class="form-group">
                   <label for="expiryyear" >Expiry Year</label>
                   <select id="expiryyear" name="expiryyear" required="required" class="custom-select">
                       <?php for($i = 2018;$i < 2030; $i++){ ?>
                           <option value="<?php echo $i; ?>"><?=$i;?></option>
                       <?php } ?>
                   </select>
               </div>
           </div>

           <div class="col-md-6">
               <div class="form-group">
                   <label for="cvv" >CVV</label>
                   <input id="cvv" name="cvv" type="text" required="required" class="form-control here">
               </div>
           </div>

           <div class="col-md-6">
               <div class="form-group">
                   <button name="submit" type="submit" class="btn btn-primary">Register</button>
               </div>
           </div>

       </div>

    </div>






    <?php echo form_close();?>

    </div>