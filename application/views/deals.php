
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
                            <?php foreach($codes as $code): ?>
                                <option value="<?php echo $code['id']; ?>" <?php if(isset($_GET['source']) && $_GET['source'] == $code['id']){ echo 'selected'; } ?>><?php echo $code['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom01">Destination</label>
                        <select class="form-control" id="destination3" name="destination">
                            <option>Select</option>
                            <?php foreach($codes as $code): ?>
                                <option value="<?php echo $code['id']; ?>" <?php if(isset($_GET['destination']) && $_GET['destination'] == $code['id']){ echo 'selected'; } ?>><?php echo $code['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label for="validationCustom03">Price Range</label>
                        <select class="form-control" id="price_range" name="price_range">
                            <option value="1" <?php if(isset($_GET['price_range']) && $_GET['price_range'] == 1){ echo 'selected'; } ?>>0 to 100 USD</option>
                            <option value="2" <?php if(isset($_GET['price_range']) && $_GET['price_range'] == 2){ echo 'selected'; } ?>>100 to 500 USD</option>
                            <option value="3" <?php if(isset($_GET['price_range']) && $_GET['price_range'] == 3){ echo 'selected'; } ?>>500 to 1000 USD</option>
                            <option value="4" <?php if(isset($_GET['price_range']) && $_GET['price_range'] == 4){ echo 'selected'; } ?>>1000 and more</option>
                        </select>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Search Deals</button>
            </form>

        </div>



        <?php if(isset($deals)){ ?>

            <div class="col-md-12" style="margin-top: 20px;">

                <h4>Select Deal</h4>
                <hr>
                <table id="myHotels">
                    <thead>
                    <tr>
                        <td>Deal</td>
                        <td>Description</td>
                        <td>Cost</td>
                        <td>#</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($deals as $deal): ?>
                        <tr>
                            <td><?php echo $deal['name'] ?> </td>
                            <td><b>Departure Flight:</b> <br>
                                Departure: <?php echo $deal['depDetails']['departure'] ?><br>
                                Arrival: <?php echo $deal['depDetails']['arrival'] ?><br>
                                Airline: <?php echo $deal['depDetails']['airline'] ?><br>
                                <b>Return Flight:</b> <br>
                                Departure: <?php echo $deal['retDetails']['departure'] ?><br>
                                Arrival: <?php echo $deal['retDetails']['arrival'] ?><br>
                                Airline: <?php echo $deal['retDetails']['airline'] ?><br>
                            </td>
                            <td><strike><?php echo $deal['cost']+$deal['discount']; ?> </strike>  <?php echo $deal['cost'] ?> USD</td>
                            <td>
                                <form method="post" action="<?php echo base_url(); ?>bookdeal">
                                    <input type="hidden" name="dep_flight" value="<?php echo $deal['dep_flight']; ?>">
                                    <input type="hidden" name="ret_flight" value="<?php echo $deal['ret_flight']; ?>">
                                    <input type="hidden" name="amount" value="<?php echo $deal['cost']; ?>">
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
