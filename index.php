<?php
    include_once __DIR__ . "/database/database.php";
    $stmt = $db->query("SELECT * FROM animals a INNER JOIN habitats h ON h.IDHAB = a.IDHAB", PDO::FETCH_ASSOC);
    $animals = $stmt->fetchAll();

    $stmt = $db->query("SELECT * FROM habitats", PDO::FETCH_ASSOC);
    $habitats = $stmt->fetchAll();
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
            <!-- Dashboard -->
            <section id="dashboard">
                <h1 class="mb-4">Dashboard</h1>
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card bg-success text-white">
                            <div class="card-body">Animals</div>
                            <div class="card-footer d-flex justify-content-between">
                                <a href="#animals" class="text-white stretched-link">View Details</a>
                                <div><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-warning text-white">
                            <div class="card-body">Habitats</div>
                            <div class="card-footer d-flex justify-content-between">
                                <a href="#habitats" class="text-white stretched-link">View Details</a>
                                <div><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Animals List -->
            <section id="animals">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between">
                        <span><i class="fas fa-table me-1"></i>Animals List</span>
                        <a href="#add-animal" class="btn btn-success btn-sm">+ Add Animal</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Habitat</th>
                                    <th>Image</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    if(count($animals) > 0){
                                        foreach($animals as $animal){
                                            echo "
                                                <tr>
                                                    <td>{$animal['NOM']}</td>
                                                    <td>{$animal['Type_alimentaire']}</td>
                                                    <td>{$animal['NOMHAB']}</td>
                                                    <td><img src='./assets/{$animal['IMAGE']}' width='50'></td>
                                                    <td class='d-flex gap-2'>
                                                        <a href='controllers/edit_animal.php?id={$animal['IDanimal']}' class='btn btn-primary btn-sm'>Edit</a>
                                                        <form action='/controllers/delete_animal.php' method='post'>
                                                            <input type='hidden' name='IDanimal' value='{$animal['IDanimal']}'/>
                                                            <button type='submit' class='btn btn-danger btn-sm'>Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                ";
                                        }
                                    }
                                    else{
                                        echo "NO ANIMALS FOR NOW";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

            <!-- Add Animal -->
            <section id="add-animal">
                <div class="card mb-4">
                    <div class="card-header"><i class="fas fa-plus me-1"></i> Add New Animal</div>
                    <div class="card-body">
                        <form action="./controllers/add_animal.php" enctype="multipart/form-data" method="post">
                            <div class="mb-3">
                                <label class="form-label">Animal Name</label>
                                <input type="text" name="NOM" class="form-control" placeholder="e.g. Lion">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Type</label>
                                <select class="form-select" name="Type_alimentaire">
                                    <option>Carnivore</option>
                                    <option>Herbivore</option>
                                    <option>Omnivore</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Habitat</label>
                                <select class="form-select" name="IDHAB" >
                                    <?php
                                        foreach($habitats as $habitat){
                                            echo "
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
                            <button type="submit" class="btn btn-success">Add Animal</button>
                        </form>
                    </div>
                </div>
            </section>

            <!-- Habitats -->
            <section id="habitats">
                <div class="card mb-4">
                    <div class="card-header"><i class="fas fa-leaf me-1"></i> Habitats</div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    if(count($habitats) > 0){
                                        foreach($habitats as $habitat){
                                            echo "
                                                <tr>
                                                        <td>{$habitat['NOMHAB']}</td>
                                                        <td>{$habitat['Description_hab']}</td>

                                                        <td class='d-flex gap-2'>
                                                            <a href='/controllers/edit_habitat.php?id={$habitat['IDHAB']}' class='btn btn-primary btn-sm'>Edit</a>
                                                            <form method='post' action='/controllers/delete_habitat.php'>
                                                                <input type='hidden' name='IDHAB' value='{$habitat['IDHAB']}'>
                                                                <button type='submit' class='btn btn-danger btn-sm'>Delete</button>
                                                            </form>
                                                        </td>
                                                </tr>
                                            ";
                                        }
                                    }
                                    else{
                                        echo "NO HABITATS FOR NOW";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

            <!-- Add Habitat -->
            <section id="add-habitat">
                <div class="card mb-4">
                    <div class="card-header"><i class="fas fa-plus me-1"></i> Add New Habitat</div>
                    <div class="card-body">
                        <form method="post" action="/controllers/add_habitat.php">
                            <div class="mb-3">
                                <label class="form-label">Habita Name</label>
                                <input type="text" class="form-control" name="NOMHAB" placeholder="Jangle">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Habitat Description</label>
                                <input type="text" class="form-control" name="Description_hab" placeholder="Description">
                            </div>

                            <button type="submit" class="btn btn-success">Add Habitat</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
