
<?php include("nav.php"); ?>

<br>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h4>Flight Status</h4>
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
            <form method="post" action="<?php echo base_url();?>flightstatus">
                    <div class="form-group row">
                        <label for="flightno" class="col-4 col-form-label">Flight No</label>
                        <div class="col-8">
                            <input id="flightno" name="flightno" type="text" class="form-control here">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="airlinename" class="col-4 col-form-label">Airline Name</label>
                        <div class="col-8">
                            <select name="airlinename" class="form-control here">
                                <option>Select</option>
                                <?php foreach($airlines  as $key => $value): ?>
                                <option value="<?php echo $value['airline']; ?>"><?php echo $value['airline']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="departuredate" class="col-4 col-form-label">Departure Date</label>
                        <div class="col-8">
                            <input id="departuredate" name="departuredate" type="date" class="form-control here">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="offset-4 col-8">
                            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>

            <?php if(isset($flightData)){ ?>
                <div class="col-md-6">
                    <h2><b>Status :</b> <?php echo $flightData->status; ?></h2>
                </div>
            <?php } ?>

        </div>
    </div>
