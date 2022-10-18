<style>.form-group {padding:10px;}</style>
<div class='col-12'>
    <form action="save_company.php" method="post">
        <div class="form-group">
            <label for="company_name">Company Name</label>
            <input type="text" class="form-control" name="company_name" id="company_name" placeholder="Please enter your company name" maxlength="200" required>
        </div>

        <div class="form-group">
            <label for="company_address">Company Address</label>
            <input type="text" class="form-control" name="company_address" id="company_address" placeholder="Please enter your company address" maxlength="255" required>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>&nbsp;
        <a href='index.php' class="btn btn-danger">Cancel</a>
    </form>
</div>
