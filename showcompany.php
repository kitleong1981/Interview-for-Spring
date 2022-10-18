<?php
$sql="select Id, name, address from company_db order by name ASC";
$datas=get_data($sql);
if (!empty($datas)) {
    echo "<div class='table-responsive'><table class='table table-hover'>\n";
    echo "<thead><tr><td>Company Name</td><td>Address</td><td></td></tr></thead><tbody>\n";
    for ($i=0; $i<count($datas);$i++) {
        foreach ($datas[$i] as $key=>$value) $$key=$value;
        echo "<tr'><td>$name</td><td>$address</td><td><a class='btn btn-sm btn-info' data-bs-toggle='collapse' href='#company_$Id' role='button' aria-expanded='false' aria-controls='company_$Id' title='Show all employees' alt='Show all employees'>+</a></td></a></tr>\n";
        echo "<tr><td colspan='3'><div class='collapse' id='company_$Id'><div class='panel panel-default'>";
        // For now just read all Employee from this company, can be using AJAX in real case
        $sql="select name from employees_db where company=$Id order by name";
        $datas2=get_data($sql);
        if (empty($datas2)) { echo "<div class='panel-body'>Sorry, this company didn't build any employees...</div></div>\n";} else {
            echo "<div class='panel-heading'>Total employees: ". count($datas2). "</div><div class='panel-body'><div class='row'>";
            for ($j=0; $j<count($datas2);$j++) echo "<div class='col-3'>" . $datas2[$j]["name"] . "</div>";
            echo "</div></div></div>\n";
        }
        echo "</div></div></td></tr>";
    }
    echo "</tbody></table></div>";
    echo "<div class='col-4 text-center'><a href='index.php' class='btn btn-success'>Return to homepage</a></div>";
} else {
    echo "<div class='col-md-12'><div class='alert alert-danger' role='alert'>Sorry, you didn't have any company info, please build company basic info first...</div></div>";
    echo "<div class='col-4 text-center'><a href='?func=buildcompany' class='btn btn-info'>Build company info</a></div>";
    echo "<div class='col-4 text-center'><a href='index.php' class='btn btn-success'>Return to homepage</a></div>";
}
?>