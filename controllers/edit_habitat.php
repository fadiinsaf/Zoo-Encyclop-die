<?php
    include_once __DIR__ . "/../database/database.php";

    if(isset($_GET["id"])){
        $IDHAB = (int) $_GET["id"];

        $stmt = $db->prepare("SELECT * FROM habitats WHERE IDHAB = ?");
        $stmt->execute([$IDHAB]);

        $habtiat = $stmt->fetch();
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

            <section id="update-habitat">
                <div class="card mb-4">
                    <div class="card-header"><i class="fas fa-plus me-1"></i> Update Habitat</div>
                    <div class="card-body">
                        <form action="update_habitat.php" method="post">

                            <input type="hidden" name="IDHAB" value="<?= $IDHAB?>">

                            <div class="mb-3">
                                <label class="form-label">Habitat Name</label>
                                <input type="text" name="NOMHAB" value="<?= $habtiat["NOMHAB"] ?>" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Habitat Description</label>
                                <input type="text" name="Description_hab" value="<?= $habtiat["Description_hab"] ?>" class="form-control">
                            </div>


                            <button type="submit" class="btn btn-success">Update Habitat</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>