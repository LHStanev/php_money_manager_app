<?php
/**
 * @var \App\Data\ReasonDTO[] $data
 */
?>

<div class="col-sm-6">
    <h3>Add new operation</h3>
    <?php if(isset($_SESSION['error'])) {echo '<p id="error">' . $_SESSION['error'] . '</p>';} ?>
    <form method="POST">

        <div class="form-group">
            <label for="type" class="col-sm-3 control-label">Type: </label>
            <div class="col-sm-6">
                <select name="type" class="form-control">
                    <option value="I">Income</option>
                    <option value="O">Cost</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="reason" class="col-sm-3 control-label">Reason: </label>
            <div class="col-sm-6">
                <select name="reason_id" class="form-control">
                    <?php foreach ($data as $reason): ?>
                    <option value="<?php echo $reason->getId() ?>"><?php echo $reason->getName()?></option>
                    <?php endforeach;?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="sum" class="col-sm-3 control-label">Sum: </label>
            <div class="col-sm-6">
                <input type="text" name="sum" class="form-control" required="required">
            </div>
        </div>

        <div class="form-group">
            <label for="notes" class="col-sm-3 control-label">Notes: </label>
            <div class="col-sm-6">
                <input type="text" name="notes" class="form-control" required="required">
            </div>
        </div>

        <div class="form-group">
            <label for="forDate" class="col-sm-3 control-label">For date: </label>
            <div class="col-sm-6">
                <input type="date" name="forDate" class="form-control" required="required">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-6">
                <input type="submit" name="add" value="Add" class=" btn btn-primary form-control">
            </div>
        </div>

    </form>
</div>