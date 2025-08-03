<form method="get">
    <?php
    $categories = ["All", "Make Up", "Massage", "Facial", "Spa", "Hair", "Nail"];
    $selected = $_GET['cat'] ?? 'All';

    foreach ($categories as $catItem) {
        $checked = ($catItem === $selected) ? "checked" : "";
        echo "<label><input type='radio' name='cat' value='$catItem' $checked onchange='this.form.submit()'> $catItem</label> ";
    }
    ?>
</form>
