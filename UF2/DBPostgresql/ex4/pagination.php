<?php
if ($pag==0) {
    ?>
    <li class="disabled">
        <a href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
        </a>
    </li>
    <?php
} else {
    ?>
    <li>
        <a href="?pag=<?php echo ($pag-1); ?>" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
        </a>
    </li>
    <?php
}
?>
<?php
$pagOut = 1;
for ($t = 0; $t < $totalMovies; $t++) {
    if ($t==$pag) {
        echo '<li class="active"><a href="?pag='.$t.'">'.$pagOut.'</a></li>';
    } else {
        echo '<li><a href="?pag='.$t.'">'.$pagOut.'</a></li>';
    }
    $pagOut++;
}
if ($pag==13) {
    ?>
    <li class="disabled">
        <a href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
        </a>
    </li>
    <?php
} else {
    ?>
    <li>
        <a href="?pag=<?php echo ($pag+1); ?>" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
        </a>
    </li>
    <?php
}
?>