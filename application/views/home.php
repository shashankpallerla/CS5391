
    <?php include("nav.php"); ?>

    <br>

    <div class="jumbotron">
        <div class="container">
            <h1 class="display-3">TravelWire</h1>
            <p>A travel website</p>
<!--            <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>-->
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#flights" role="tab" aria-controls="flights" aria-selected="true">Flights Search</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#hotels" role="tab" aria-controls="hotels" aria-selected="false">Hotels Search</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="hotelsflight-tab" data-toggle="tab" href="#fhotels" role="tab" aria-controls="fhotels" aria-selected="false">Flight + Hotel Search</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#deals" role="tab" aria-controls="deals" aria-selected="false">Deals</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="flights" role="tabpanel" aria-labelledby="flights-tab" style="padding-top: 15px;">
                        <form class="needs-validation" method="get" action="<?php echo base_url(); ?>flights">
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom01">Source</label>
                                    <select class="form-control" id="source1" name="source">
                                        <option>Select</option>
                                        <?php foreach($codes as $code): ?>
                                            <option value="<?php echo $code['id']; ?>"><?php echo $code['code']; ?> - <?php echo $code['name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom01">Destination</label>
                                    <select class="form-control" id="destination1" name="destination">
                                        <option>Select</option>
                                        <?php foreach($codes as $code): ?>
                                            <option value="<?php echo $code['id']; ?>"><?php echo $code['code']; ?> - <?php echo $code['name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-3 mb-3">
                                    <label for="validationCustom03">Departure Date</label>
                                    <input type="date" class="form-control" id="dep_date" name="dep_date" required>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="validationCustom04">Return Date</label>
                                    <input type="date" class="form-control" id="return_date" name="return_date" required>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label for="validationCustom05">No of Travelers</label>
                                    <input type="number" class="form-control" id="travelers" name="travelers" value="1" required>
                                </div>
                            </div>
                            <input type="hidden" name="type" value="dep">
                            <button class="btn btn-primary" type="submit">Search Flights</button>
                        </form>

                    </div>
                    <div class="tab-pane fade" id="hotels" role="tabpanel" aria-labelledby="hotels-tab" style="padding-top: 15px;">

                        <!--Hotels-->
                        <form class="needs-validation" method="get" action="<?php echo base_url(); ?>hotels">
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom01">Destination</label>
                                    <select class="form-control" id="destination" name="destination">
                                        <option>Select</option>
                                        <?php foreach($hotelcodes as $code): ?>
                                            <option value="<?php echo $code['id']; ?>"><?php echo $code['name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                        <label for="validationCustom03">Checkin Date</label>
                                        <input type="date" class="form-control" id="checkin_date" name="checkin_date" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                        <label for="validationCustom04">Checkout Date</label>
                                        <input type="date" class="form-control" id="checkout_date" name="checkout_date" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-2 mb-3">
                                    <label for="validationCustom05">No of Rooms</label>
                                    <input type="number" class="form-control" id="no_rooms" name="no_rooms" value="1" required>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label for="validationCustom05">No of People</label>
                                    <input type="number" class="form-control" id="no_people" name="no_people" value="2" required>
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit">Search Hotels</button>
                        </form>


                    </div>
                    <div class="tab-pane fade" id="fhotels" role="tabpanel" aria-labelledby="fhotels-tab" style="padding-top: 15px;">
                        <form class="needs-validation" method="get" action="<?php echo base_url(); ?>flights">
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom01">Source</label>
                                    <select class="form-control" id="source2" name="source">
                                        <option>Select</option>
                                        <?php foreach($codes as $code): ?>
                                            <option value="<?php echo $code['id']; ?>"><?php echo $code['code']; ?> - <?php echo $code['name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom01">Destination</label>
                                    <select class="form-control" id="destination2" name="destination">
                                        <option>Select</option>
                                        <?php foreach($codes as $code): ?>
                                            <option value="<?php echo $code['id']; ?>"><?php echo $code['code']; ?> - <?php echo $code['name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-3 mb-3">
                                    <label for="validationCustom03">Departure Date</label>
                                    <input type="date" class="form-control" id="dep_date" name="dep_date" required>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="validationCustom04">Return Date</label>
                                    <input type="date" class="form-control" id="return_date" name="return_date" required>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label for="validationCustom04">Hotel Destination</label>
                                    <select class="form-control" id="destination_hotel" name="destination_hotel">
                                        <option>Select</option>
                                        <?php foreach($hotelcodes as $code): ?>
                                            <option value="<?php echo $code['id']; ?>"><?php echo $code['name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label for="validationCustom05">No of Travelers</label>
                                    <input type="number" class="form-control" id="travelers" name="travelers" value="1" required>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label for="validationCustom05">No of Rooms</label>
                                    <input type="number" class="form-control" id="no_rooms" name="no_rooms" value="1" required>
                                </div>
                            </div>
                            <input type="hidden" name="type" value="dep">
                            <input type="hidden" name="fhotels" value="true">
                            <button class="btn btn-primary" type="submit">Search Flight + Hotel</button>
                        </form>

                    </div>

                    <div class="tab-pane fade" id="deals" role="tabpanel" aria-labelledby="deals-tab" style="padding-top: 15px;">
                        <form class="needs-validation" method="get" action="<?php echo base_url(); ?>deals">
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom01">Source</label>
                                    <select class="form-control" id="source3" name="source">
                                        <option>Select</option>
                                        <?php foreach($hotelcodes as $code): ?>
                                            <option value="<?php echo $code['id']; ?>"><?php echo $code['name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom01">Destination</label>
                                    <select class="form-control" id="destination3" name="destination">
                                        <option>Select</option>
                                        <?php foreach($hotelcodes as $code): ?>
                                            <option value="<?php echo $code['id']; ?>"><?php echo $code['name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-3 mb-3">
                                    <label for="validationCustom03">Price Range</label>
                                    <select class="form-control" id="price_range" name="price_range">
                                        <option>0 to 100 USD</option>
                                        <option>100 to 500 USD</option>
                                        <option>500 to 1000 USD</option>
                                        <option>1000 and more</option>
                                    </select>
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit">Search Deals</button>
                        </form>
                    </div>

                    <script type="text/javascript">
                        $(document).ready(function(){
                            $('#source1').change(function () {
                                var value = $('#source1').val();

                                $('#destination1 option').each(function(key,val){
                                    if(key == value){
                                        $("#destination1 option[value='"+value+"']").remove();
                                    }
                                });
                            });

                            $('#source2').change(function () {
                                var value = $('#source2').val();

                                $('#destination2 option').each(function(key,val){
                                    if(key == value){
                                        $("#destination2 option[value='"+value+"']").remove();
                                    }
                                });
                            });


                            $('#source3').change(function () {
                                var value = $('#source3').val();

                                $('#destination3 option').each(function(key,val){
                                    if(key == value){
                                        $("#destination3 option[value='"+value+"']").remove();
                                    }
                                });
                            });

                        });
                    </script>

                </div>
            </div>
        </div>
