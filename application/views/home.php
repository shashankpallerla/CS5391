
    <?php include("nav.php"); ?>

    <br>

 <!--   <div class="jumbotron">
        <div class="container">
            <h1 class="display-3">Hello, world!</h1>
            <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
            <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
        </div>
    </div>-->

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
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#deals" role="tab" aria-controls="deals" aria-selected="false">Deals</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="flights" role="tabpanel" aria-labelledby="flights-tab" style="padding-top: 15px;">
                        <form class="needs-validation" method="get" action="<?php echo base_url(); ?>flights">
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom01">Source</label>
                                    <select class="form-control" id="source" name="source">
                                        <option>Select</option>
                                        <?php foreach($codes as $code): ?>
                                            <option value="<?php echo $code['id']; ?>"><?php echo $code['code']; ?> - <?php echo $code['name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom01">Destination</label>
                                    <select class="form-control" id="destination" name="destination">
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
                                    <input type="date" class="form-control" id="validationCustom03" name="dep_date" required>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="validationCustom04">Return Date</label>
                                    <input type="date" class="form-control" id="validationCustom04" name="return_date" required>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label for="validationCustom05">No of Travelers</label>
                                    <input type="number" class="form-control" id="validationCustom05" name="travelers" value="1" required>
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
                                        <input type="date" class="form-control" id="validationCustom03" name="checkin_date" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                        <label for="validationCustom04">Checkout Date</label>
                                        <input type="date" class="form-control" id="validationCustom04" name="checkout_date" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-2 mb-3">
                                    <label for="validationCustom05">No of Rooms</label>
                                    <input type="number" class="form-control" id="validationCustom05" name="no_rooms" value="1" required>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label for="validationCustom05">No of People</label>
                                    <input type="number" class="form-control" id="validationCustom05" name="no_people" value="2" required>
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit">Search Hotels</button>
                        </form>


                    </div>
                    <div class="tab-pane fade" id="deals" role="tabpanel" aria-labelledby="deals-tab" style="padding-top: 15px;">

                    </div>
                </div>
            </div>
        </div>
