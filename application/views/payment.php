<?php include("nav.php"); ?>

<br>

<?php if($type == 'flight'){ ?>
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Departure Flight</h5>
                    <p class="card-text">
                        <b>Flight No: </b><?php echo $depFlight['id']; ?> <br>
                       <b> Source: </b><?php echo $depFlight['source']->name; ?> <br>
                        <b>Destination: </b><?php echo $depFlight['destination']->name; ?> <br>
                        <b>Departure Timing: </b><?php echo $depFlight['departure']; ?> <br>
                        <b>Arrival Timing: </b><?php echo $depFlight['arrival']; ?> <br>
                        <b>Airline: </b><?php echo $depFlight['airline']; ?> <br>
                        <b>Miles: </b><?php echo $depFlight['miles']; ?> <br>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Return Flight</h5>
                    <p class="card-text">
                        <b>Flight No: </b><?php echo $retFlight['id']; ?> <br>
                        <b> Source: </b><?php echo $retFlight['source']->name; ?> <br>
                        <b>Destination: </b><?php echo $retFlight['destination']->name; ?> <br>
                        <b>Departure Timing: </b><?php echo $retFlight['departure']; ?> <br>
                        <b>Arrival Timing: </b><?php echo $retFlight['arrival']; ?> <br>
                        <b>Airline: </b><?php echo $retFlight['airline']; ?> <br>
                        <b>Miles: </b><?php echo $retFlight['miles']; ?> <br>
                    </p>
                </div>
        </div>
    </div>

     <div class="col-md-12" style="margin-top:20px;">

         <div class="row">
             <div class="col-md-12">
                 <h4>Payment Details</h4>

                 First Name: <?php echo $userData->first_name; ?> <br>
                 Last Name: <?php echo $userData->last_name; ?> <br>
                 Email : <?php echo $userData->email; ?> <br>

                 Total Amount : <?php echo $total; ?> USD (Inclusive of 15% taxes and fees) <br>
                 Total Miles to be accumulated: <?php echo $totalMiles; ?> <br><br>
             </div>
             <div class="col-md-12">

                 <form method="post" action="<?php echo base_url(); ?>payment">
                     <div class="col-md-6">
                         <div class="form-group">
                             <label for="exampleFormControlInput1">Credit Card No</label>
                             <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Credit Card No" value="<?php echo $userData->cardno;?>">
                         </div>
                     </div>
                     <div class="col-md-2">
                         <div class="form-group">
                             <label for="exampleFormControlInput1">Expiry Month</label>
                             <select name="cardmonth" class="custom-select">
                                 <?php for($i = 01;$i < 12; $i++){ ?>
                                     <option value="<?php echo $i; ?>" <?php if($userData->expmonth == $i){ echo "selected";} ?>><?=$i;?></option>
                                 <?php } ?>
                             </select>
                         </div>
                     </div>
                     <div class="col-md-2">
                         <div class="form-group">
                             <label for="exampleFormControlInput1">Expiry Year</label>
                             <select name="cardyear" class="custom-select">
                                 <?php for($i = 2018;$i < 2030; $i++){ ?>
                                     <option value="<?php echo $i; ?>" <?php if($userData->expyear == $i){ echo "selected";} ?>><?=$i;?></option>
                                 <?php } ?>
                             </select>
                         </div>
                     </div>
                     <div class="col-md-2">
                         <div class="form-group">
                             <label for="exampleFormControlInput1">CVV</label>
                             <input type="number" class="form-control" id="exampleFormControlInput1" value="<?php echo $userData->cvv;?>">
                         </div>
                     </div>
                        <input name="orderId" type="hidden" value="<?php echo $orderId; ?>">
                        <input name="type" type="hidden" value="<?php echo $type; ?>">

                     <input type="submit" class="btn btn-success" name="success" value="Confirm Order">

                     <?php if($userData->miles >= INTERNATIONAL_MILEAGE_REDEEM){ ?>

                     <input type="submit" class="btn btn-success" name="redeem" value="Redeem Mileage">

                     <?php } ?>
                 </form>

             </div>
         </div>
     </div>

    </div>

    <?php } else if($type == 'hotel'){ ?>

    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Hotel Details</h5>
                        <p class="card-text">
                            <b>Hotel Name: </b><?php echo $hotelDetails['name']; ?> <br>
                            <b>Hotel No: </b><?php echo $orderDetails['id']; ?> <br>
                            <b>Rating: </b><?php echo $hotelDetails['rating']; ?> Stars <br>
                            <b>Address: </b><?php echo $hotelDetails['address']; ?> <br>
                            <b>Checkin Date: </b><?php echo $orderDetails['checkin_date']; ?> <br>
                            <b>Checkout Date: </b><?php echo $orderDetails['checkin_date']; ?> <br>
                            <b>No of Rooms: </b><?php echo $orderDetails['no_rooms']; ?> <br>
                            <b>No of People: </b><?php echo $orderDetails['no_people']; ?> <br>

                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-12" style="margin-top:20px;">

                <div class="row">
                    <div class="col-md-12">
                        <h4>Payment Details</h4>

                        First Name: <?php echo $userData->first_name; ?> <br>
                        Last Name: <?php echo $userData->last_name; ?> <br>
                        Email : <?php echo $userData->email; ?> <br>

                        Amount : <?php echo $orderDetails['amount']; ?> USD <br>
                        Fee : <?php echo $orderDetails['fee']; ?> USD <br>
                        Total Amount : <?php echo $orderDetails['totalamount']; ?> USD <br><br>

                    </div>
                    <div class="col-md-12">

                        <form method="post" action="<?php echo base_url(); ?>payment">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Credit Card No</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Credit Card No" value="<?php echo $userData->cardno;?>">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Expiry Month</label>
                                    <select name="cardmonth" class="custom-select">
                                        <?php for($i = 01;$i < 12; $i++){ ?>
                                            <option value="<?php echo $i; ?>" <?php if($userData->expmonth == $i){ echo "selected";} ?>><?=$i;?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Expiry Year</label>
                                    <select name="cardyear" class="custom-select">
                                        <?php for($i = 2018;$i < 2030; $i++){ ?>
                                            <option value="<?php echo $i; ?>" <?php if($userData->expyear == $i){ echo "selected";} ?>><?=$i;?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">CVV</label>
                                    <input type="number" class="form-control" id="exampleFormControlInput1" value="<?php echo $userData->cvv;?>">
                                </div>
                            </div>
                            <input name="orderId" type="hidden" value="<?php echo $orderId; ?>">
                            <input name="type" type="hidden" value="<?php echo $type; ?>">

                            <input type="submit" class="btn btn-success" name="success" value="Confirm Order">

                            <?php if($userData->miles >= INTERNATIONAL_MILEAGE_REDEEM && $type == 'flight'){ ?>

                                <input type="submit" class="btn btn-success" name="redeem" value="Redeem Mileage">

                            <?php } ?>
                        </form>

                    </div>
                </div>
            </div>

        </div>


        <?php } ?>



