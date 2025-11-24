
<?php if(isset($_SESSION['error'])): ?>
<div class="notice notice-error">
    <p><?=  $_SESSION['error'] ?></p>
    <?php unset($_SESSION['error']); ?>
</div>
<?php endif ?>


<?php if(isset($_SESSION['success'])): ?>
<div class="notice notice-success">
    <p><?=  $_SESSION['success'] ?></p>
    <?php unset($_SESSION['success']); ?>
</div>
<?php endif ?>