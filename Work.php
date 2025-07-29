<!DOCTYPE html>
<html>
<head>
  <title>Our Work</title>
  <style>
    .category-tab { cursor: pointer; margin: 5px; display: inline-block; }
    .image-box { width: 200px; display: inline-block; margin: 10px; }
    .image-box img { width: 100%; height: auto; }
  </style>
</head>
<body>

<h2>OUR WORK</h2>
<div id="categories">
  <span class="category-tab" data-category="All">All</span>
  <span class="category-tab" data-category="Make Up">Make Up</span>
  <span class="category-tab" data-category="Massage">Massage</span>
  <span class="category-tab" data-category="Facial">Facial</span>
  <span class="category-tab" data-category="Spa">Spa</span>
  <span class="category-tab" data-category="Hair">Hair</span>
  <span class="category-tab" data-category="Nail">Nail</span>
</div>

<div id="gallery"></div>

<script>
document.querySelectorAll('.category-tab').forEach(tab => {
  tab.addEventListener('click', () => {
    const cat = tab.getAttribute('data-category');
    fetch(`request.php?category=${cat}`)
      .then(res => res.json())
      .then(images => {
        const gallery = document.getElementById('gallery');
        gallery.innerHTML = '';
        images.forEach(img => {
          const div = document.createElement('div');
          div.className = 'image-box';
          div.innerHTML = `<img src="uploads/${img.image}" alt="${img.category}">`;
          gallery.appendChild(div);
        });
      });
  });
});

// Load All on Start
document.querySelector('[data-category="All"]').click();
</script>

</body>
</html>
