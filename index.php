<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <title>index</title>
    <link rel="stylesheet" href="dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700" />
    <link rel="stylesheet" href="dist/css/Header-Blue.css" />
    <link rel="stylesheet" href="dist/css/Header-Dark.css" />
    <link rel="stylesheet" href="dist/css/Footer-Clean.css" />
    <link rel="stylesheet" href="dist/css/styles.css" />
</head>

<body style="background-color: rgb(219,220,231);font-size: 14px;">
    <header></header>
    <div>
        <div class="header-blue" style="height: 70px;">
            <nav class="navbar navbar-light navbar-expand-md navigation-clean-search">
                <div class="container-fluid"><a class="navbar-brand" href="#">Prime Number</a></div>
            </nav>
        </div>
    </div>
    <section class="col-lg-8 offset-lg-2">
        <div style="padding: 15px;padding-top: 50px;">
            <div class="card">
                <div class="card-body" style="width: 500;">
                    <div class="row">
                        <h1 class="card-title" style="margin-bottom: 50px;">Enter the number</h1>
                    </div>
                    <form id="numberForm" class="form-group row" action="index.php" method="post">

                        <div class="form-group">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label class="col-form-label form-control">Number :</label></div>
                                    <div class="col-lg-8"><input type="number" class="border rounded form-control " name="primenumber" placeholder="enter the number" min="1" required style="padding: 0px;padding-left: 8px;margin-left: 0px;width: 250px;" /></div>
                                </div>
                                <button class="btn btn-primary border rounded" type="submit" style="margin-top: 30px;margin-left: 200px;font-style: normal;">Test</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section class="col-lg-8 offset-lg-2">
        <!-- METHOD I -->
        <?php
        $test = True;
        $count = 1;
        $factor = array();

        if (isset($_POST['primenumber'])) {
            $n = $_POST['primenumber'];
            for ($i = 2; $i < $n; $i++) {
                $count = $count + 1;
                if (($n % $i) == 0) {
                    $factor[] = $i;
                    $test = False;
                }
            }

            if ($test == True) {
                $factor[] = $n;
                $k = "";
                foreach ($factor as $key => $value) {
                    $k = $k . '' . $value . " | ";
                }
                $status = "" . $n . " is <strong> Prime Number </strong> and Factors are -> " . $k;
            } else {
                $factor[] = $n;
                $k = "";
                foreach ($factor as $key => $value) {
                    $k = $k . '' . $value . " | ";
                }
                $status = "" . $n . " is composite Number and Factors are -> " . $k;
            }
        }
        ?>
        <!-- METHOD II -->
        <?php
        $i = 2;
        $count2 = 0;
        $countnotprime = 0;

        if (isset($_POST['primenumber'])) {
            $n = $_POST['primenumber'];
            $x = $n;
            $b = sqrt($n);
            while ($x > 1 && $i <= $b) {
                $count2 = $count2 + 1;

                while (($x % $i) == 0) {
                    //echo $i;

                    $x = $x / $i;
                    $b = sqrt($x);
                    $countnotprime = $countnotprime + 1;

                    //echo (", ");
                }

                $i = $i + 1;
            }

            if ($countnotprime == 0) {
                //echo ($n);
                //echo ("Number of iteration: ");
                //echo $count2;
                $c = $count2;
            }else {

                if ($x > 1) {
                    echo $x;
                    echo ("<br>");
                }

                echo ($n);
                $countnotprime = $countnotprime + 1;
                $c = $countnotprime;
                echo ("Number of iteration: ");
                echo ($countnotprime);
            }
        }
        
        ?>

        <div class="alert alert-info" role="alert">
            <h4 class="alert-heading">Prime Number</h4>
            <hr>
            <p>Please give a number --> <?php if (isset($_POST['primenumber'])) {
                                            echo $n;
                                        } ?>
                <br />
                <?php if (isset($_POST['primenumber'])) {
                    echo $status;
                } ?><br />
                With 1st method number of iteration is : <?php if (isset($_POST['primenumber'])) { echo $count;} ?><br />
                With 2nd method number of iteration is : <?php if (isset($_POST['primenumber'])) { echo $c;} ?>
            </p>
        </div>
    </section>
    <div class="footer-clean" style="height: 72px;margin-top:90px;padding-top: 10px;padding-bottom: 10px;">
        <footer>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7 offset-lg-3 item social" style="padding: auto;padding-left: 0px;margin: auto;">
                        <p class="copyright" style="width: 500px;height: 25px;font-size: 14px;">GABRIEL KALALA 21811863 - Cyprus International University © 2020</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>