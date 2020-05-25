<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <title>ERATOSTHENES</title>
    <link rel="stylesheet" href="dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700" />
    <link rel="stylesheet" href="dist/css/Header-Blue.css" />
    <link rel="stylesheet" href="dist/css/Header-Dark.css" />
    <link rel="stylesheet" href="dist/css/Footer-Clean.css" />
    <link rel="stylesheet" href="dist/css/styles.css" />
</head>

<body style="background-color: rgb(219,220,231);font-size: 14px;">
    <div>
        <div class="header-blue" style="height: 70px;">
            <nav class="navbar navbar-light navbar-expand-md navigation-clean-search">
                <div class="container-fluid"><a class="navbar-brand" href="#">Eratosthenes</a></div>
            </nav>
        </div>
    </div>
    <section class="col-lg-8 offset-lg-2">
        <div style="padding: 15px;padding-top: 50px;">
            <div class="card">
                <div class="card-body" style="width: 500;">
                    <div class="row">
                        <h1 class="card-title" style="margin-bottom: 50px;">Eratosthenes / Show Prime number</h1>
                    </div>
                    <form id="numberForm" class="form-group row" action="index.php" method="post">

                        <div class="form-group">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-4"><label class="col-form-label form-control">Max Number :</label></div>
                                    <div class="col-lg-8"><input type="number" class="border rounded form-control " name="maxnumber" placeholder="enter the number" min="1" required style="padding: 0px;padding-left: 8px;margin-left: 0px;width: 250px;" /></div>
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
        <?php
        if(isset($_POST['maxnumber'])){
            $m = $_POST['maxnumber'];
            $primenumber = array();
            $start = 2;
            $c = 0;
            $count = 0;
            
            for ($i = 0; $i < $m - 1; $i++) {
                $primenumber[$i] = $start;
                $start++;
            }
            $k="";
            if($m<2){ 
        ?>
                <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading">ERROR</h4>
                    <hr>
                    <p>The max number must be greater than 2 (max number > 2 ).</p>
                </div>
        <?php        
            }else{
                while (!empty($primenumber)) {
                    $d = $primenumber[$c];
                    $dernier = sizeof($primenumber) - 1;

                    if (($d^2) > $primenumber[$dernier]) {
                        $count = $count + (sizeof($primenumber));
                        for ($i = 0; $i < sizeof($primenumber); $i++) {
                            $k .= $primenumber[$i].' | ';
                        }
                        break;
                    } else {
                        $k .= $primenumber[$c].' | ';
                        $count = $count + 1;
                        for ($i = 0; $i < sizeof($primenumber); $i++) {
                            if (($primenumber[$i] % $d) == 0) {

                                unset($primenumber[$i]);
                                $primenumber = array_values($primenumber);
                            }
                        }
                    }
                }
            }
            //var_dump($primenumber);
        }
        ?>

        <div class="alert alert-info" role="alert">
            <h4 class="alert-heading">Prime Number</h4>
            <hr>
            <p>
                <?php
                if (isset($_POST['maxnumber'])) {
                    echo $k;
                }
                ?>
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