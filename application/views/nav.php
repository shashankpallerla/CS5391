<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="#">TravelWire</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Flights</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Hotels</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Deals</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Feedback</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Contact Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url(); ?>register">Register</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Email" aria-label="Email">
            <input class="form-control mr-sm-2" type="password" placeholder="Password" aria-label="Password">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Login</button>
        </form>
    </div>
</nav>