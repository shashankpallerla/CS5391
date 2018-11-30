
<?php include("nav.php"); ?>

<div class="container">
    <br>
    <div class="row">
        <div class="col-md-3">
            <?php include("d_menu.php"); ?>
        </div>
        <div class="col-md-9">
            <div class="row">
                <?php if(isset($orders) && count($orders) > 0){ ?>

                        <table id="myFlights">
                            <thead>
                            <tr>
                                <td>Order No</td>
                                <td>Departure Flight</td>
                                <td>Arrival Flight</td>
                                <td>Miles</td>
                                <td>Amount</td>
                                <td>Status</td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($orders as $order): ?>
                                <tr>
                                    <td><?php echo $order['id'] ?> </td>
                                    <td><?php echo $order['departure_flight_details']['source']->code; ?> --> <?php echo $order['departure_flight_details']['destination']->code; ?>
                                     (<?php echo $order['departure_flight_details']['airline']; ?>)</td>
                                    <td><?php echo $order['return_flight_details']['source']->code; ?> --> <?php echo $order['return_flight_details']['destination']->code; ?>
                                        (<?php echo $order['return_flight_details']['airline']; ?>) </td>
                                    <td><?php echo $order['totalmiles'] ?> </td>
                                    <td><?php echo $order['totalamount'] ?> USD</td>
                                    <td><?php echo $order['status'] ?> </td>
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
