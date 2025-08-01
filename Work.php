<!DOCTYPE html>
<html>
<head>
    <title>Our Work</title>
    <style>
        .tabs span {
            margin: 5px;
            padding: 5px 10px;
            cursor: pointer;
            background: lightgray;
        }
        .gallery img {
            width: 200px;
            margin: 10px;
        }
    </style>
</head>
<body>

<h2>Our Work</h2>

<div class="tabs">
    <span onclick="loadImages('All')">All</span>
    <span onclick="loadImages('Make Up')">Make Up</span>
    <span onclick="loadImages('Massage')">Massage</span>
    <span onclick="loadImages('Facial')">Facial</span>
    <span onclick="loadImages('Spa')">Spa</span>
    <span onclick="loadImages('Hair')">Hair</span>
    <span onclick="loadImages('Nail')">Nail</span>
</div>

<div id="gallery" class="gallery"></div>

<script>
function loadImages(category) {
    fetch("request.php?category=" + category)
        .then(res => res.json())
        .then(images => {
            const gallery = document.getElementById("gallery");
            gallery.innerHTML = "";
            images.forEach(path => {
                const img = document.createElement("img");
                img.src = path;
                gallery.appendChild(img);
            });
        });
}

// Load images for 'All' category by default
loadImages('All');
</script>

</body>
</html>
