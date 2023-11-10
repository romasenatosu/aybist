<article>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. In, debitis dolorem modi repellendus provident illo fugiat voluptas velit, ipsam alias explicabo aliquid aperiam hic corporis quod possimus? Minima, magnam animi!
</article>

<pre>

<?php
    $stmt = $pdo->query("SHOW TABLES");
    $rows = $stmt->fetchAll();
    var_dump($rows);
?>

</pre>
