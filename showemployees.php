<?php
$sql="select a.name, b.name as company_name from employees_db a left join company_db b on a.company=b.Id order by b.name, a.name";
$datas=get_data($sql);
if (!empty($datas)) {
    echo "<div class='table-responsive'><table class='table table-hover'>\n";
    echo "<thead><tr><td>Company Name</td><td>Employee Name</td></tr></thead><tbody>\n";
    for ($i=0; $i<count($datas);$i++) {
        foreach ($datas[$i] as $key=>$value) $$key=htmlspecialchars_decode($value);
        echo "<tr'><td>$company_name</td><td>$name</td></a></tr>\n";
    }
    echo "</tbody></table></div>";
    echo "<div class='col-4 text-center'><a href='index.php' class='btn btn-success'>Return to homepage</a></div>";
} else {
    echo "<div class='col-md-12'><div class='alert alert-danger' role='alert'>Sorry, you didn't have any employees_db, please build employees info first...</div></div>";
    echo "<div class='col-4 text-center'><a href='?func=buildemployee' class='btn btn-info'>Build Employee info</a></div>";
    echo "<div class='col-4 text-center'><a href='index.php' class='btn btn-success'>Return to homepage</a></div>";
}
?>