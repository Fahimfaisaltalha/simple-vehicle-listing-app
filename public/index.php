<?php
require_once "./../app/classes/VehicleManager.php";

$vehicleManager = new VehicleManager('', '', '', '');
$vehicles = $vehicleManager->getVehicles();

// Ensure it's always an array (fallback for null)
if (!is_array($vehicles)) {
    $vehicles = [];
}

include './views/header.php';
?>

<div class="container my-4">
    <h1>Vehicle Listing</h1>
    <a href="./../public/views/add.php" class="btn btn-success mb-4">Add Vehicle</a>
    <div class="row">

    <?php if(empty($vehicles)): ?>
        <div class="col-12">
            <div class="alert alert-warning text-center" role="alert">
                No vehicle found.
            </div>
        </div>
    <?php else : ?>
        
        <?php foreach($vehicles as $id => $vehicle): ?>
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="<?= htmlspecialchars($vehicle['image']) ?>" class="card-img-top" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($vehicle['name']) ?></h5> 
                        <p class="card-text">Type: <?= htmlspecialchars($vehicle['type']) ?></p>
                        <p class="card-text">Price: $<?= htmlspecialchars($vehicle['price']) ?></p>
                        <a href="./views/edit.php?id=<?= $id ?>" class="btn btn-primary">Edit</a>
                        <a href="./views/delete.php?id=<?= $id ?>" class="btn btn-danger">Delete</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
        
    </div>
</div>

</body>
</html>
