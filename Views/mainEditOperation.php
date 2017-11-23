<?php
/**
 * @var \App\Data\OperationDTO $data[0]
 * @var \App\Data\ReasonDTO[]  $data[1]
 */
?>

<div class="col-sm-6">
    <h3>Edit operation</h3>
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
                    <?php foreach ($data[1] as $reason): ?>
                        <option value="<?php echo $reason->getId() ?>"><?php echo $reason->getName()?></option>
                    <?php endforeach;?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="sum" class="col-sm-3 control-label">Sum: </label>
            <div class="col-sm-6">
                <input type="text" name="sum" value="<?php echo $data[0]->getSum(); ?>" class="form-control" required="required">
            </div>
        </div>

        <div class="form-group">
            <label for="notes" class="col-sm-3 control-label">Notes: </label>
            <div class="col-sm-6">
                <input type="text" name="notes" value="<?php echo $data[0]->getNotes(); ?>" class="form-control" required="required">
            </div>
        </div>

        <div class="form-group">
            <label for="forDate" class="col-sm-3 control-label">For date: </label>
            <div class="col-sm-6">
                <input type="date" name="for_date" value="<?php ?>" class="form-control" required="required">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-6">
                <input type="submit" name="update" value="Update" class=" btn btn-primary form-control">
            </div>
        </div>

    </form>
</div>