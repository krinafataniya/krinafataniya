<?php
$categories = ["All", "Make Up", "Massage", "Facial", "Spa", "Hair", "Nail"];
$current = $_GET['cat'] ?? 'All';

foreach ($categories as $catItem) {
    $active = ($catItem == $current) ? "style='font-weight:bold;color:red'" : "";
    echo "<a href='?cat=$catItem' $active>$catItem</a> | ";
}
?>
