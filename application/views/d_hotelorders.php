
<?php include("nav.php"); ?>

<div class="container">
    <br>
    <div class="row">
        <div class="col-md-2">
            <?php include("d_menu.php"); ?>
        </div>
        <div class="col-md-10">
            <div class="row">
                <?php if(isset($orders) && count($orders) > 1){ ?>

                    <table id="myFlights">
                        <thead>
                        <tr>
                            <td>Order No</td>
                            <td>Hotel Name</td>
                            <td>Checkin Date</td>
                            <td>Checkout Date</td>
                            <td>No of Rooms</td>
                            <td>No of People</td>
                            <td>Total Amount</td>
                            <td>Status</td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($orders as $order): ?>
                            <tr>
                                <td><?php echo $order['id'] ?> </td>
                                <td><?php echo $order['hotelDetails']['name'] ?> </td>
                                <td><?php echo $order['checkin_date'] ?></td>
                                <td><?php echo $order['checkout_date'] ?> </td>
                                <td><?php echo $order['no_rooms'] ?> </td>
                                <td><?php echo $order['no_people'] ?> </td>
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

                <?php }else{
                    echo "<div style='margin-top: 40px'><h4>No orders to display </h4></div>";
                } ?>
            </div>
        </div>
    </div>
