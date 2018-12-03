
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



        <?php if(isset($hotels)){ ?>

            <div class="col-md-12" style="margin-top: 20px;">

                <ul class="step d-flex flex-nowrap">
                    <li class="step-item">
                        <a href="#!" class="">Search Hotel</a>
                    </li>
                    <li class="step-item active">
                        <a href="#!" class="">Select Hotel</a>
                    </li>
                    <li class="step-item">
                        <a href="#!" class="">Payment</a>
                    </li>
                    <li class="step-item">
                        <a href="#!" class="">Confirmation</a>
                    </li>
                </ul>


                <h4> Select Hotel</h4>
                <br>
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
                    $('#myHotels').DataTable();
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
