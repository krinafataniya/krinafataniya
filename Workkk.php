<!DOCTYPE html>
<html>
<head>
  <title>Our Work</title>
  <style>
    .category-tab { 
      cursor: pointer; 
      margin: 5px; 
      padding: 8px 12px;
      background-color: #eee;
      display: inline-block; 
      border-radius: 5px;
    }
    .category-tab:hover {
      background-color: #ccc;
    }
    .image-box { 
      width: 200px; 
      display: inline-block; 
      margin: 10px; 
    }
    .image-box img { 
      width: 100%; 
      height: auto; 
      border-radius: 8px;
    }
  </style>
</head>
<body>

<h2>OUR WORK</h2>

<!-- Category Tabs -->
<div id="categories">
  <span class="category-tab" data-category="All">All</span>
  <span class="category-tab" data-category="Make Up">Make Up</span>
  <span class="category-tab" data-category="Massage">Massage</span>
  <span class="category-tab" data-category="Facial">Facial</span>
  <span class="category-tab" data-category="Spa">Spa</span>
  <span class="category-tab" data-category="Hair">Hair</span>
  <span class="category-tab" data-category="Nail">Nail</span>
</div>

<!-- Gallery Section -->
<div id="gallery"></div>

<!-- JavaScript for AJAX Loading -->
<script>
  document.querySelectorAll('.category-tab').forEach(tab => {
    tab.addEventListener('click', () => {
      const cat = tab.getAttribute('data-category');
      fetch(`request.php?category=${cat}`)
        .then(res => res.json())
        .then(images => {
          const gallery = document.getElementById('gallery');
          gallery.innerHTML = '';
          if (images.length === 0) {
            gallery.innerHTML = '<p>No images found in this category.</p>';
            return;
          }
          images.forEach(img => {
            const div = document.createElement('div');
            div.className = 'image-box';
            div.innerHTML = `<img src="uploads/${img.image}" alt="${img.category}">`;
            gallery.appendChild(div);
          });
        });
    });
  });

  // Auto-load "All" category on page load
  document.querySelector('[data-category="All"]').click();
</script>

</body>
</html>
