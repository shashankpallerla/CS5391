
<?php include("nav.php"); ?>

<br>

<div class="container">
    <div class="row">
        <div class="col-md-12">

            <?php if(isset($errors) && strlen($errors) > 0) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $errors; ?>
                </div>
            <?php } ?>


            <form class="needs-validation" method="get" action="<?php echo base_url(); ?>flights">
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom01">Source</label>
                        <select class="form-control" id="source" name="source">
                            <option>Select</option>
                            <?php foreach($codes as $code): ?>
                                <option value="<?php echo $code['id']; ?>" <?php if(isset($_GET['source']) && $_GET['source'] == $code['id']){ echo 'selected'; } ?>><?php echo $code['code']; ?> - <?php echo $code['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom01">Destination</label>
                        <select class="form-control" id="destination" name="destination">
                            <option>Select</option>
                            <?php foreach($codes as $code): ?>
                                <option value="<?php echo $code['id']; ?>" <?php if(isset($_GET['destination']) && $_GET['destination'] == $code['id']){ echo 'selected'; } ?>><?php echo $code['code']; ?> - <?php echo $code['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label for="validationCustom03">Departure Date</label>
                        <input type="date" class="form-control" id="dep_date" name="dep_date" value="<?php if(isset($_GET['dep_date'])) echo $_GET['dep_date']; ?>" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationCustom04">Return Date</label>
                        <input type="date" class="form-control" id="return_date" name="return_date" value="<?php if(isset($_GET['return_date'])) echo $_GET['return_date']; ?>" required>
                    </div>
                    <?php if(isset($_GET['fhotels'])){ ?>
                    <div class="col-md-2 mb-3">
                        <label for="validationCustom04">Hotel Destination</label>
                        <select class="form-control" id="destination_hotel" name="destination_hotel">
                            <option>Select</option>
                            <?php foreach($hotelcodes as $code): ?>
                                <option value="<?php echo $code['id']; ?>" <?php if($_GET['destination_hotel'] == $code['id']) echo "selected"; ?>><?php echo $code['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <?php } ?>

                    <div class="col-md-2 mb-3">
                        <label for="validationCustom05">No of Travelers</label>
                        <input type="number" class="form-control" id="travelers" name="travelers" value="<?php if(isset($_GET['travelers'])) echo $_GET['travelers']; ?>" required>
                    </div>

                    <?php if(isset($_GET['fhotels'])){ ?>
                    <div class="col-md-2 mb-3">
                        <label for="validationCustom05">No of Rooms</label>
                        <input type="number" class="form-control" id="no_rooms" name="no_rooms" value="<?php if(isset($_GET['no_rooms'])) echo $_GET['no_rooms']; ?>" required>
                    </div>
                    <?php } ?>

                </div>
                <input hidden name="type" value="dep">
                <?php if(isset($_GET['fhotels'])){ ?>
                    <input hidden name="fhotels" value="true">
                <?php } ?>
                <button class="btn btn-primary" type="submit"> <?php if(isset($_GET['fhotels'])){ echo "Search Flight + Hotel"; } else echo "Search Flights";?></button>
            </form>

        </div>


        <?php if(isset($flights)){ ?>

<!--            <ul class="step d-flex flex-nowrap" style="margin-top: 40px;margin-bottom: 40px;">-->
<!--                <li class="step-item">-->
<!--                    <a href="#!" class="">Search Flight</a>-->
<!--                </li>-->
<!--                <li class="step-item active">-->
<!--                    <a href="#!" class="">Select Departure Flight</a>-->
<!--                </li>-->
<!--                <li class="step-item">-->
<!--                    <a href="#!" class="">Select Return Flight</a>-->
<!--                </li>-->
<!--                <li class="step-item">-->
<!--                    <a href="#!" class="">Payment</a>-->
<!--                </li>-->
<!--                <li class="step-item">-->
<!--                    <a href="#!" class="">Confirmation</a>-->
<!--                </li>-->
<!--            </ul>-->

        <div class="col-md-12" style="margin-top: 20px;">
            <h4> Select <?php if($_GET['type'] == 'dep') echo "Departure"; else echo "Return"; ?> Flight</h4>
            <hr>
            <table id="myFlights">
                <thead>
                <tr>
                    <td>Flight No</td>
                    <td>Departure</td>
                    <td>Arrival</td>
                    <td>Airline</td>
                    <?php if($_GET['type'] == 'dep'){ ?> <td>Amount</td> <?php } ?>
                    <td>#</td>
                </tr>
                </thead>
                <tbody>
                <?php foreach($flights as $flight): ?>
                    <tr>
                        <td><?php echo $flight['id'] ?> </td>
                        <td><?php echo $flight['departure'] ?> </td>
                        <td><?php echo $flight['arrival'] ?> </td>
                        <td><?php echo $flight['airline'] ?> </td>
                        <?php if($_GET['type'] == 'dep'){ ?>  <td><?php echo $flight['twoway'] ?> USD</td> <?php } ?>
                        <td>

                            <form method="post" action="<?php echo base_url(); ?>bookflight">
                                <input type="hidden" name="source" value="<?php echo $_GET['source']; ?>">
                                <input type="hidden" name="destination" value="<?php echo $_GET['destination']; ?>">
                                <input type="hidden" name="dep_date" value="<?php echo $_GET['dep_date']; ?>">
                                <input type="hidden" name="return_date" value="<?php echo $_GET['return_date']; ?>">
                                <input type="hidden" name="travelers" value="<?php echo $_GET['travelers']; ?>">
                                <input type="hidden" name="type" value="<?php echo $_GET['type']; ?>">
                                <?php if($_GET['type'] == 'dep'){ ?>
                                    <input type="hidden" name="departure_flight" value="<?php echo $flight['id']; ?>">
                                <?php }else{ ?>
                                    <input type="hidden" name="return_flight" value="<?php echo $flight['id']; ?>">
                                <?php } ?>
                                <?php if(isset($_GET['fhotels'])){ ?>
                                    <input hidden name="destination_hotel" value="<?php echo $_GET['destination_hotel']; ?>">
                                    <input hidden name="no_rooms" value="<?php echo $_GET['no_rooms']; ?>">
                                    <input hidden name="fhotels" value="true">
                                <?php } ?>
                                <input hidden name="currenturl" value="<?php echo current_url(); ?>?<?php echo http_build_query($_GET); ?>">
                                <input type="submit" value="Select" class="btn btn-success">
                            </form>


                        </td>
                    </tr>

                <? endforeach; ?>

                </tbody>

            </table>

        </div>

        <script type="application/javascript">
            $(document).ready( function () {
                $('#myFlights').DataTable({
                    "info": false,
                    "lengthChange": false
                });

            } );
        </script>

        <?php } ?>


        <script type="application/javascript">
            $(document).ready( function () {
                $('#source').change(function () {
                    var value = $('#source').val();
                    console.log(value);

                    $('#destination option').each(function(key,val){
                        if(key == value){
                            $("#destination option[value='"+value+"']").remove();
                        }
                    });
                });
            } );
        </script>


    </div>
