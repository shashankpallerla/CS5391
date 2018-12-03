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

             <div class="col-md-7">
                 <form method="post" action="<?php echo base_url(); ?>payment">

                 <h4>Personal Details</h4>

                 <div class="form-row">
                     <div class="col-md-6">
                         <div class="form-group">
                             <label for="exampleFormControlInput1">First Name</label>
                             <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="First Name" value="<?php echo $userData->first_name;?>">
                         </div>
                     </div>

                     <div class="col-md-6">
                         <div class="form-group">
                             <label for="exampleFormControlInput1">Middle Name</label>
                             <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Middle Name (If any)" value="<?php echo $userData->middle_name;?>">
                         </div>
                     </div>

                     <div class="col-md-6">
                         <div class="form-group">
                             <label for="exampleFormControlInput1">Last Name</label>
                             <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Last Name" value="<?php echo $userData->last_name;?>">
                         </div>
                     </div>

                 </div>
                     <h4>Payment Details</h4>

                     <div class="form-row">
                         <div class="col-md-6">
                             <div class="form-group">
                                 <label for="exampleFormControlInput1">Credit Card No</label>
                                 <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Credit Card No" value="<?php echo $userData->cardno;?>">
                             </div>
                         </div>

                         <div class="col-md-2">
                             <div class="form-group">
                                 <label for="exampleFormControlInput1">CVV</label>
                                 <input type="number" class="form-control" id="exampleFormControlInput1" value="<?php echo $userData->cvv;?>">
                             </div>
                         </div>
                     </div>

                     <div class="form-row">
                         <div class="col-md-3">
                             <div class="form-group">
                                 <label for="exampleFormControlInput1">Expiry Month</label>
                                 <select name="cardmonth" class="custom-select">
                                     <?php for($i = 01;$i < 12; $i++){ ?>
                                         <option value="<?php echo $i; ?>" <?php if($userData->expmonth == $i){ echo "selected";} ?>><?=$i;?></option>
                                     <?php } ?>
                                 </select>
                             </div>
                         </div>
                         <div class="col-md-3">
                             <div class="form-group">
                                 <label for="exampleFormControlInput1">Expiry Year</label>
                                 <select name="cardyear" class="custom-select">
                                     <?php for($i = 2018;$i < 2030; $i++){ ?>
                                         <option value="<?php echo $i; ?>" <?php if($userData->expyear == $i){ echo "selected";} ?>><?=$i;?></option>
                                     <?php } ?>
                                 </select>
                             </div>
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
             <div class="col-md-5">
                     <h4>Payment Summary</h4>

                     <div class="table-responsive">
                         <table class="table" >
                             <tr class="table-light">
                                 <th scope="row" style="width: 30%">Total Miles</th>
                                 <td><?php echo $totalMiles; ?></td>
                             </tr>
                             <tr class="table-light">
                                 <th scope="row">Amount</th>
                                 <td><?php echo $amount; ?> USD</td>
                             </tr>
                             <tr class="table-light">
                                 <th scope="row">Fee</th>
                                 <td><?php echo $fee; ?> USD</td>
                             </tr>
                             <tr class="table-info">
                                 <th scope="row">Total Amount</th>
                                 <td><?php echo $amount; ?> USD</td>
                             </tr>
                         </table>
                     </div>

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
                            <b>Checkout Date: </b><?php echo $orderDetails['checkout_date']; ?> <br>
                            <b>No of Rooms: </b><?php echo $orderDetails['no_rooms']; ?> <br>
                            <b>No of People: </b><?php echo $orderDetails['no_people']; ?> <br>

                        </p>
                    </div>
                </div>
            </div>


            <div class="col-md-12" style="margin-top:20px;">
                <form method="post" action="<?php echo base_url(); ?>payment">
                <div class="row">

                    <div class="col-md-7">

                        <h4>Personal Details</h4>

                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">First Name</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="First Name" value="<?php echo $userData->first_name;?>">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Middle Name</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Middle Name (If any)" value="<?php echo $userData->middle_name;?>">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Last Name</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Last Name" value="<?php echo $userData->last_name;?>">
                                </div>
                            </div>

                        </div>

                        <h4>Payment Details</h4>

                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Credit Card No</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Credit Card No" value="<?php echo $userData->cardno;?>">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">CVV</label>
                                    <input type="number" class="form-control" id="exampleFormControlInput1" value="<?php echo $userData->cvv;?>">
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Expiry Month</label>
                                    <select name="cardmonth" class="custom-select">
                                        <?php for($i = 01;$i < 12; $i++){ ?>
                                            <option value="<?php echo $i; ?>" <?php if($userData->expmonth == $i){ echo "selected";} ?>><?=$i;?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Expiry Year</label>
                                    <select name="cardyear" class="custom-select">
                                        <?php for($i = 2018;$i < 2030; $i++){ ?>
                                            <option value="<?php echo $i; ?>" <?php if($userData->expyear == $i){ echo "selected";} ?>><?=$i;?></option>
                                        <?php } ?>
                                    </select>
                                </div>
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
                    <div class="col-md-5">
                        <h4>Payment Summary</h4>

                        <div class="table-responsive">
                            <table class="table" >
                                <tr class="table-light">
                                    <th scope="row">Amount</th>
                                    <td><?php echo $orderDetails['amount']; ?> USD</td>
                                </tr>
                                <tr class="table-light">
                                    <th scope="row">Fee</th>
                                    <td><?php echo $orderDetails['fee']; ?> USD</td>
                                </tr>
                                <tr class="table-info">
                                    <th scope="row">Total Amount</th>
                                    <td><?php echo $orderDetails['totalamount']; ?> USD</td>
                                </tr>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

        </div>


        <?php }else if($type == 'fhotel') {?>

        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Hotel Details</h5>
                            <p class="card-text">
                                <b>Hotel Name: </b><?php echo $hotelDetails['name']; ?> <br>
                                <b>Hotel No: </b><?php echo $orderDetails['id']; ?> <br>
                                <b>Rating: </b><?php echo $hotelDetails['rating']; ?> Stars <br>
                                <b>Address: </b><?php echo $hotelDetails['address']; ?> <br>
                                <b>Checkin Date: </b><?php echo $orderDetails['checkin_date']; ?> <br>
                                <b>Checkout Date: </b><?php echo $orderDetails['checkout_date']; ?> <br>
                                <b>No of Rooms: </b><?php echo $orderDetails['no_rooms']; ?> <br>
                                <b>No of People: </b><?php echo $orderDetails['no_people']; ?> <br>

                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
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
                <div class="col-sm-4">
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

                        <div class="col-md-7">
                            <form method="post" action="<?php echo base_url(); ?>payment">
                            <h4>Personal Details</h4>

                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">First Name</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="First Name" value="<?php echo $userData->first_name;?>">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Middle Name</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Middle Name (If any)" value="<?php echo $userData->middle_name;?>">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Last Name</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Last Name" value="<?php echo $userData->last_name;?>">
                                    </div>
                                </div>


                            </div>

                            <h4>Payment Details</h4>

                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Credit Card No</label>
                                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Credit Card No" value="<?php echo $userData->cardno;?>">
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">CVV</label>
                                            <input type="number" class="form-control" id="exampleFormControlInput1" value="<?php echo $userData->cvv;?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Expiry Month</label>
                                            <select name="cardmonth" class="custom-select">
                                                <?php for($i = 01;$i < 12; $i++){ ?>
                                                    <option value="<?php echo $i; ?>" <?php if($userData->expmonth == $i){ echo "selected";} ?>><?=$i;?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Expiry Year</label>
                                            <select name="cardyear" class="custom-select">
                                                <?php for($i = 2018;$i < 2030; $i++){ ?>
                                                    <option value="<?php echo $i; ?>" <?php if($userData->expyear == $i){ echo "selected";} ?>><?=$i;?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <input name="forderId" type="hidden" value="<?php echo $forderId; ?>">
                                <input name="horderId" type="hidden" value="<?php echo $horderId; ?>">
                                <input name="type" type="hidden" value="<?php echo $type; ?>">

                                <input type="submit" class="btn btn-success" name="success" value="Confirm Order">

                                <?php if($userData->miles >= INTERNATIONAL_MILEAGE_REDEEM && $type == 'flight'){ ?>

                                    <input type="submit" class="btn btn-success" name="redeem" value="Redeem Mileage">

                                <?php } ?>
                            </form>

                        </div>
                        <div class="col-md-5">
                            <h4>Payment Summary</h4>

                            <div class="table-responsive">
                                <table class="table" >
                                    <tr class="table-light">
                                        <th scope="row" style="width: 30%">Amount</th>
                                        <td><?php echo $total; ?> USD</td>
                                    </tr>
                                    <tr class="table-light">
                                        <th scope="row">Discount</th>
                                        <td><?php echo $discount; ?> USD <br>(20% for booking flight + hotel) </td>
                                    </tr>
                                    <tr class="table-light">
                                        <th scope="row">Sub Total</th>
                                        <td><?php echo $totalAfterDiscount; ?> USD</td>
                                    </tr>
                                    <tr class="table-light">
                                        <th scope="row">Fee</th>
                                        <td><?php echo $fee; ?> USD</td>
                                    </tr>
                                    <tr class="table-info">
                                        <th scope="row">Total Amount</th>
                                        <td><?php echo $amount; ?> USD</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        <?php } ?>



