<?php include('header.php'); ?>
<style>
    /* Set background color for the body */
    body {
        background-color: rgba(227, 228, 209, 0.916);
    }
</style>

<body id="class_div">
    <?php include('navbar.php'); ?>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12" id="content">
                <div class="row-fluid">
                    <!-- block -->
                    <div class="block">
                        <div class="navbar navbar-inner block-header">
                            <div id="" class="muted pull-right"><a href="index.php"><i class="icon-arrow-left"></i> Back</a></div>
                        </div>
                        <div class="block-content collapse in">
                            <div class="span12">
                                <?php
                                $mission_query = mysqli_query($conn, "select * from content where title  = 'mission' ") or die(mysqli_error($conn));
                                $mission_row = mysqli_fetch_array($mission_query);
                                echo $mission_row['content'];
                                ?>
                                <hr>
                                <?php
                                // $mission_query = mysqli_query($conn, "select * from content where title  = 'vision' ") or die(mysqli_error($conn));
                                // $mission_row = mysqli_fetch_array($mission_query);
                                // echo $mission_row['content'];
                                ?>
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