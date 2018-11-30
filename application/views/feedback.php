
<?php include("nav.php"); ?>

<br>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h4>Feedback</h4>
            <?php if(strlen($this->session->flashdata('errors')) > 0) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $this->session->flashdata('errors'); ?>
                </div>
            <?php } ?>

            <?php if(strlen($this->session->flashdata('messages')) > 0) { ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $this->session->flashdata('messages'); ?>
                </div>
            <?php } ?>
            <form method="post" action="<?php echo base_url();?>feedback">
                <div class="form-group row">
                    <label for="rating" class="col-4 col-form-label">Rating</label>
                    <div class="col-8">
                        <select id="rating" name="rating" required="required" class="custom-select">
                            <option value="1">1 - Lowest</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10 - Highest</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="comments" class="col-4 col-form-label">Comments</label>
                    <div class="col-8">
                        <textarea id="comments" name="comments" cols="40" rows="6" class="form-control"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="offset-4 col-8">
                        <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
