<?php
include "conf.php";
$func=$_GET['func'];
$company_id=(int)$_GET['company_id'];
?>

<html>
    <head>
        <title>Spring Systems Full Stack Challenge</title>
        <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css' integrity='sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi' crossorigin='anonymous'>
        <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js' integrity='sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk' crossorigin='anonymous'></script>
        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
            .jumbotron {
                padding-top: 30px;
                padding-bottom: 30px;
                margin-bottom: 30px;
                color: inherit;
                background-color: #eee;
            }
        </style>
    </head>
    <body>
        <div class='jumbotron'>
            <div class='container'>
                <h1>Welcome!</h1>
                <p>Hi, I'm Chon Kit Leong and this code page is for the Spring Systems Full Stack Challenge.</p>
            </div>
        </div>

        <div class='container'>
            <div class='row'>
            <?php
                if ($_SESSION["error"]!="") {
                    echo "<div class='col-md-12'><div class='alert alert-success' role='alert'>" . $_SESSION["error"] . "</div></div>";
                    unset($_SESSION["error"]);
                }
                switch ($func) {
                    case "show":
                        include "showcompany.php";
                    break;
                    case "showemployees":
                        include "showemployees.php";
                    break;
                    break;
                    case "buildcompany":
                        include "buildcompany.php";
                    break;
                    case "buildemployee":
                        if ($company_id!=0) {
                            include "buildemployee.php";
                        } else {
                            $sql="select Id, name from company_db order by name ASC";
                            $datas=get_data($sql);
                            if (!empty($datas)) {
                                for ($i=0; $i<count($datas);$i++) {
                                    foreach ($datas[$i] as $key=>$value) $$key=$value;
                                    echo "<div class='col-4 text-center'><a href='?func=buildemployee&company_id=$Id' class='btn btn-primary'>Build employee info for company [ $name ]</a></div>";
                                }
                            } else {
                                echo "<div class='col-md-12'><div class='alert alert-danger' role='alert'>Sorry, you didn't have any company info, please build company basic info first...</div></div>";
                                echo "<div class='col-4 text-center'><a href='?func=buildcompany' class='btn btn-info'>Build company info</a></div>";
                                echo "<div class='col-4 text-center'><a href='index.php' class='btn btn-success'>Return to homepage</a></div>";
                            }
                        }
                    break;
                    default:
                        include "basic_btn.php";
                    break;
                }
            ?>
            </div>
        </div>
    </body>
</html>