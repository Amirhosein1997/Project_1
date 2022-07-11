<form method="post">
    <div class="form-row col-md-6">
    <div class="col-7">
        <select required name="permition_id" class="form-select" aria-label="Default select example">
    <option selected>نمایش براساس مجوزها</option>
    <?php $permitions=select_permition_name();
    foreach ($permitions as $access):
    ?>

            <option value="<?php echo $access->id; ?>"><?php echo $access->name; ?></option>
    <?php endforeach;?>
</select>
    </div>
        <div class="col-5">
        <button type="submit" name="search_permition" class="btn btn-primary">search</button>
        </div>
    </div>
</form>