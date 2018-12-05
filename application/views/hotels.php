
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

            <form class="needs-validation" method="get" action="<?php echo base_url(); ?>hotels">
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom01">Destination</label>
                        <select class="form-control" id="destination" name="destination">
                            <option>Select</option>
                            <?php foreach($hotelcodes as $code): ?>
                                <option value="<?php echo $code['id']; ?>" <?php if(isset($_GET['destination'])){if($code['id'] == $_GET['destination']){ echo "selected";}} ?>><?php echo $code['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom03">Checkin Date</label>
                        <input type="date" class="form-control" id="validationCustom03" name="checkin_date" value="<?php echo (isset($_GET['checkin_date'])) ? $_GET['checkin_date'] : NULL; ?>" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom04">Checkout Date</label>
                        <input type="date" class="form-control" id="validationCustom04" name="checkout_date" value="<?php echo (isset($_GET['checkout_date'])) ? $_GET['checkout_date'] : NULL; ?>" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-2 mb-3">
                        <label for="validationCustom05">No of Rooms</label>
                        <input type="number" class="form-control" id="validationCustom05" name="no_rooms" value="<?php echo (isset($_GET['no_rooms'])) ? $_GET['no_rooms'] : 1; ?>" required>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="validationCustom05">No of People</label>
                        <input type="number" class="form-control" id="validationCustom05" name="no_people" value="<?php echo (isset($_GET['no_people'])) ? $_GET['no_people'] : 2; ?>" required>
                    </div>
                </div>
                <?php if(isset($_GET['fhotelsid'])){ ?>
                    <input type="hidden" name="fhotelsid" value="<?=$_GET['fhotelsid'];?>">
                <?php } ?>
                <button class="btn btn-primary" type="submit">Search Hotels</button>
            </form>

        </div>



        <?php if(isset($hotels)){ ?>

            <div class="col-md-12" style="margin-top: 20px;">

<!--                <ul class="step d-flex flex-nowrap">-->
<!--                    <li class="step-item">-->
<!--                        <a href="#!" class="">Search Hotel</a>-->
<!--                    </li>-->
<!--                    <li class="step-item active">-->
<!--                        <a href="#!" class="">Select Hotel</a>-->
<!--                    </li>-->
<!--                    <li class="step-item">-->
<!--                        <a href="#!" class="">Payment</a>-->
<!--                    </li>-->
<!--                    <li class="step-item">-->
<!--                        <a href="#!" class="">Confirmation</a>-->
<!--                    </li>-->
<!--                </ul>-->


                <h4> Select Hotel</h4>
                <hr>
                <table id="myHotels">
                    <thead>
                    <tr>
                        <td>Hotel ID</td>
                        <td>Name</td>
                        <td>Rating</td>
                        <td>Cost per night</td>
                        <td>#</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($hotels as $hotel): ?>
                        <tr>
                            <td><?php echo $hotel['id'] ?> </td>
                            <td><?php echo $hotel['name'] ?> </td>
                            <td><?php echo $hotel['rating'] ?> </td>
                            <td><?php echo $hotel['cost'] ?> USD</td>
                            <td>
                                <form method="post" action="<?php echo base_url(); ?>bookhotel">
                                    <input type="hidden" name="hotelid" value="<?php echo $hotel['id']; ?>">
                                    <input type="hidden" name="checkin_date" value="<?php echo $_GET['checkin_date']; ?>">
                                    <input type="hidden" name="checkout_date" value="<?php echo $_GET['checkout_date']; ?>">
                                    <input type="hidden" name="no_rooms" value="<?php echo $_GET['no_rooms']; ?>">
                                    <input type="hidden" name="no_people" value="<?php echo $_GET['no_people']; ?>">
                                    <?php if(isset($_GET['fhotelsid'])){ ?>
                                        <input type="hidden" name="fhotelsid" value="<?=$_GET['fhotelsid'];?>">
                                    <?php } ?>
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
                    $('#myHotels').DataTable({
                        "info": false,
                        "lengthChange": false
                    });
                } );
            </script>

        <?php } ?>


    </div>
