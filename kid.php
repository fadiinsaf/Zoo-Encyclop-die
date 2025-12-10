<?php
    include_once __DIR__ . "/database/database.php";

    $stmt = $db->query("
        SELECT 
            a.IDanimal,
            a.NOM,
            a.Type_alimentaire,
            a.IMAGE,
            h.NOMHAB,
            h.Description_hab
        FROM animals a 
        INNER JOIN habitats h ON h.IDHAB = a.IDHAB
    ");
    $animals = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animal Viewer</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Comic Sans MS';
            background: linear-gradient(#a8e6ff, #ffffff);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .viewer {
            width: 95%;
            max-width: 900px;
            background: white;
            padding: 20px;
            border-radius: 20px;
            box-shadow: 0 6px 25px rgba(0,0,0,0.2);
            text-align: center;
            animation: pop .4s ease;
        }

        @keyframes pop {
            from { transform: scale(.7); opacity: 0; }
            to { transform: scale(1); opacity: 1; }
        }

        .animal-img {
            height: 380px;
            border-radius: 16px;
            margin-bottom: 20px;
        }

        .info {
            text-align: left;
            padding: 10px 25px;
        }

        .info h2 {
            margin: 0 0 10px;
            font-size: 28px;
            color: #333;
        }

        .info p {
            margin: 6px 0;
            font-size: 18px;
        }

        .controls {
            display: flex;
            justify-content: space-between;
            margin-top: 25px;
        }

        .btn {
            padding: 15px 25px;
            width: 48%;
            font-size: 20px;
            background: #3498db;
            color: #fff;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            transition: .2s;
        }

        .btn:hover { background: #217ab5; }
    </style>
</head>

<body>

<div class="viewer" id="viewerBox">

    <img id="img" class="animal-img" src="" alt="Animal">

    <div class="info">
        <h2 id="name"></h2>
        <p><strong>Habitat:</strong> <span id="habitat"></span></p>
        <p><strong>Description:</strong> <span id="habDesc"></span></p>
        <p><strong>Food Type:</strong> <span id="type"></span></p>
    </div>

    <div class="controls">
        <button class="btn" onclick="prevAnimal()">⬅ Previous</button>
        <button class="btn" onclick="nextAnimal()">Next ➡</button>
    </div>

</div>

<script>
    const animals = <?php echo json_encode($animals); ?>;
    let index = 0;

    function showAnimal(i) {
        const a = animals[i];

        document.getElementById("img").src = "assets/" + a.IMAGE;
        document.getElementById("name").textContent = a.NOM;
        document.getElementById("habitat").textContent = a.NOMHAB;
        document.getElementById("habDesc").textContent = a.Description_hab;
        document.getElementById("type").textContent = a.Type_alimentaire;

        const box = document.getElementById("viewerBox");
        box.style.animation = "none";
        box.offsetHeight;
        box.style.animation = null;
    }

    function nextAnimal() {
        index = (index + 1) % animals.length;
        showAnimal(index);
    }

    function prevAnimal() {
        index = (index - 1 + animals.length) % animals.length;
        showAnimal(index);
    }

    window.onload = () => showAnimal(0);
</script>

</body>
</html>