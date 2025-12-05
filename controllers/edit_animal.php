<?php
    include_once __DIR__ . "/../database/database.php";

    if(isset($_GET["id"])){
        $IDanimal = (int) $_GET["id"];

        $stmt = $db->prepare("SELECT * FROM animals WHERE IDanimal = ?");
        $stmt->execute([$IDanimal]);

        $animal = $stmt->fetch();

        $stmt = $db->query("SELECT * FROM habitats", PDO::FETCH_ASSOC);
        $habitats = $stmt->fetchAll();
    }
    else{
        header("Location: /index.php");
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoo Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v6.3.0/css/all.css" rel="stylesheet">
    <style>
        body { background-color: #f5f5f5; }
        .sidebar { background-color: #2c3e50; min-height: 100vh; color: white; }
        .sidebar a { color: white; text-decoration: none; display: block; padding: 10px; }
        .sidebar a:hover { background-color: #34495e; }
        .card-header { font-weight: bold; }
        .table thead { background-color: #d4edda; }
    </style>
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar p-3">
            <h2>Zoo Admin</h2>
            <a href="#dashboard">Dashboard</a>
            <a href="#animals">Animals</a>
            <a href="#add-animal">Add Animal</a>
            <a href="#habitats">Habitats</a>
        </div>

        <!-- Main Content -->
        <div class="container-fluid p-4">
            <section id="update-animal">
                <div class="card mb-4">
                    <div class="card-header"><i class="fas fa-plus me-1"></i> Update Animal</div>
                    <div class="card-body">
                        <form action="./controllers/update_animal.php" enctype="multipart/form-data" method="post">
                            <input type="hidden" name="IDanimal" value="<?= $IDanimal ?>">
                            <div class="mb-3">
                                <label class="form-label">Animal Name</label>
                                <input type="text" name="NOM" value="<?= $animal["NOM"] ?>" class="form-control" placeholder="e.g. Lion">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Type</label>
                                <select class="form-select" name="Type_alimentaire">
                                    <option <?= $animal["Type_alimentaire"] === "Carnivore" ? "selected" : null ?>>Carnivore</option>
                                    <option <?= $animal["Type_alimentaire"] === "Herbivore" ? "selected" : null ?>>Herbivore</option>
                                    <option <?= $animal["Type_alimentaire"] === "Omnivore" ? "selected" : null ?>>Omnivore</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Habitat</label>
                                <select class="form-select" name="IDHAB" >
                                    <?php
                                        foreach($habitats as $habitat){
                                            echo $animal["IDHAB"] === $habitat['IDHAB'] ? "
                                                <option selected value='{$habitat['IDHAB']}'>{$habitat['NOMHAB']}</option>
                                            " : "
                                                <option value='{$habitat['IDHAB']}'>{$habitat['NOMHAB']}</option>
                                            ";
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Image</label>
                                <input type="file" class="form-control" name="IMAGE">
                            </div>
                            <button type="submit" class="btn btn-success">Update Animal</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>