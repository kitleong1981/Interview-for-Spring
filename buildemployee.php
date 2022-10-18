<style>.form-group {padding:10px;}</style>
<?php
if ($company_id!=0) {
    $sql="select name from company_db where Id=$company_id";
    $datas=get_data($sql);
    $name=$datas[0]["name"];
    echo "<div class='col-12'><h2>Building Employee for Company [ $name ] ... </h2>";
} else {echo "Company Id error, please try again"; die();}
?>

<div class='col-12'>
    <form action="save_employee.php" method="post">
        <input type="hidden" name="company_id" value="<?=$company_id?>">
        <div class="form-group">
            <label for="employee_name">Employee Name</label>
            <input type="text" class="form-control" name="employee_name" id="employee_name" placeholder="Please enter your Employee name" maxlength="200" required>
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" name="continue_build" id="continue_build" value="1" checked>
            <label class="form-check-label" for="continue_build">Continue build Employee after saving...</label>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>&nbsp;
        <a href='index.php' class="btn btn-danger">Cancel</a>
    </form>
</div>
