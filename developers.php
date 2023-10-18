<?php include('header.php'); ?>
<style>
    /* Set background color for the body */
    body {
        background-color: rgba(227, 228, 209, 0.916);
    }

    /* Apply white font color to all <p> and <h> tags */
    p,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        color: #eee;
    }

    /* Style the container */
    .container-fluid {
        padding: 10px;
    }

    /* Style the card */
    .card {
        /* background-color: #333; */
        color: white;
        border: none;
        margin-top: 20px;
        margin-left: 60px;
    }

    /* Style the card header */
    .card-header {
        background-color: #000;
        border-bottom: none;
    }

    /* Style the back button */
    .card-header a {
        color: white;
        padding: 70px
    }

    /* Style the card body */
    .card-body {
        padding: 20px;
    }

    /* Center the image */
    .img-fluid {
        display: block;
        margin: 0 auto;
    }

    /* Add spacing between content */
    hr {
        margin: 15px 0;
    }

    /* Center text within the card */
    .text-center {
        text-align: center;
    }

    /* Style the card title */
    .card-title {
        font-size: 30px;
        font-weight: bold;
        margin-bottom: 5px;
        padding: 10px;
        text-align: center;
    }
</style>

<body id="class_div">
    <?php include('navbar.php'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12" id="content">
                <div class="row">
                    <!-- block -->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="float-right">
                                    <a href="index.php"><i class="fas fa-arrow-left"></i> Back</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <h3 class="card-title">Developers</h3>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3">
                                        <center>
                                            <img id="developers" src="admin/images/peaceToMe.jpg" class="img-fluid rounded-circle">
                                            <hr>
                                            <p>Name: David Mwelwa</p>
                                            <p>Email: davidgarciajr955@gmail.com</p>
                                            <p>Position: June Web Developer</p>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /block -->
                </div>
            </div>
        </div>
        <?php include('footer.php'); ?>
    </div>
    <?php include('script.php'); ?>
</body>

</html>