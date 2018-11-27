
<?php include("nav.php"); ?>

<br>

<div class="container">
    <div class="row">
        <div class="col-md-12">

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
                        <input type="date" class="form-control" id="validationCustom03" name="dep_date" value="<?php if(isset($_GET['dep_date'])) echo $_GET['dep_date']; ?>" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationCustom04">Return Date</label>
                        <input type="date" class="form-control" id="validationCustom04" name="return_date" value="<?php if(isset($_GET['return_date'])) echo $_GET['return_date']; ?>" required>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="validationCustom05">No of Travelers</label>
                        <input type="number" class="form-control" id="validationCustom05" name="travelers" value="<?php if(isset($_GET['travelers'])) echo $_GET['travelers']; ?>" required>
                    </div>
                </div>
                <input hidden name="type" value="dep">
                <button class="btn btn-primary" type="submit">Search Flights</button>
            </form>

        </div>


        <?php if(isset($flights)){ ?>

        <div class="col-md-12" style="margin-top: 20px;">
            <h4> Select <?php if($_GET['type'] == 'dep') echo "Departure"; else echo "Return"; ?> Flight</h4>
            <br>
            <table id="myFlights">
                <thead>
                <tr>
                    <td>Flight No</td>
                    <td>Departure</td>
                    <td>Arrival</td>
                    <td>Airline</td>
                    <td>Amount</td>
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
                        <td><?php echo $flight['twoway'] ?> USD</td>
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
                $('#myFlights').DataTable();
            } );
        </script>

        <?php } ?>


    </div>
