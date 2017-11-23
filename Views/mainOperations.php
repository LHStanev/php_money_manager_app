<?php
/**
 * @var /App/Data/OperationDTO[] $data
 */
?>
<div class="col-sm-6">
    <form method="POST">
        <input id="logoutBtn" class="btn btn-primary" type="submit" value="logout" name="logout">
    </form>
    <h3>Your operations</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Date</th>
                <th>Type</th>
                <th>Reason</th>
                <th>Sum</th>
                <th>Notes</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <?php foreach ($data as $operation): ?>
        <tr>
            <td><?php echo $operation->getForDate();  ?></td>
            <td><?php echo $operation->getType();  ?></td>
            <td><?php echo $operation->getReasonId();  ?></td>
            <td><?php echo $operation->getSum();  ?></td>
            <td><?php echo $operation->getNotes();  ?></td>
            <td><a href="delete_operation.php?id=<?php echo $operation->getId(); ?>">delete</a></td>
            <td><a href="edit_operation.php?id=<?php echo $operation->getId(); ?>">edit</a></td>
        </tr>
     <?php endforeach ;?>
    </table>
    <a class="btn btn-primary" href="add_operation.php">Add operation</a>
</div>
