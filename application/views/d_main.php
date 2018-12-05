
<?php include("nav.php"); ?>

<div class="container">
    <br>
    <!-- Example row of columns -->
    <div class="row">

        <div class="col-md-2">
            <?php include("d_menu.php"); ?>
        </div>
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-4">
                    <div class="card-counter success">
                        <i class="fa fa-code-fork"></i>
                        <span class="count-numbers"><?=$user->miles; ?></span>
                        <span class="count-name">Miles Accumulated</span>
                    </div>
                </div>

            </div>
        </div>
    </div>
