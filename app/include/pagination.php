<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <li class="page-item">
            <a class="page-link" href="?page=1">First</a>
        </li>
        <?php if($page > 1):?>
            <li class="page-item">
                <a class="page-link" href="?page=<?php echo ($page - 1 );?>">Prev</a>
            </li>
        <?php endif;?>
        <!-- Loop to display page numbers -->
        <?php for($i = max(1, $page - 2); $i <= min($total_page, $page + 2); $i++): ?>
            <li class="page-item">
                <a class="page-link" href="?page=<?php echo $i ?>"><?php echo $i ?></a>
            </li>
        <?php endfor; ?>
        <li class="page-item">
            <a class="page-link" href="?page=<?php echo min($total_page, $page + 1) ?>">Next</a>
        </li>
        <li class="page-item">
            <a class="page-link" href="?page=<?php echo $total_page ?>">Last</a>
        </li>
    </ul>
</nav>
