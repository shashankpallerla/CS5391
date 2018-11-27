
<?php include("nav.php"); ?>

<div class="container">
    <br>
    <div class="row">
        <div class="col-md-3">
            <?php include("d_menu.php"); ?>
        </div>
        <div class="col-md-8">
            <div class="row">
                <?php if(isset($orders) && count($orders) > 0){ ?>

                        <table id="myFlights">
                            <thead>
                            <tr>
                                <td>Order No</td>
                                <td>Departure</td>
                                <td>Arrival</td>
                                <td>Airline</td>
                                <td>Amount</td>
                                <td>#</td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($orders as $order): ?>
                                <tr>
                                    <td><?php echo $order['id'] ?> </td>
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


                    <script type="application/javascript">
                        $(document).ready( function () {
                            $('#myFlights').DataTable();
                        } );
                    </script>

                <?php } ?>
            </div>
        </div>
    </div>
