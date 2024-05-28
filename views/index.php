<?php
$books = [
    [
        'name' => 'Book 2',
        'author' => 'Author 1',
        'releasedYear' => 2000,
        'purchaseUrl' => 'http://example.com'
    ],
    [
        'name' => 'Book 3',
        'author' => 'Author 2',
        'releasedYear' => 2020,
        'purchaseUrl' => 'http://example.com'
    ],
    [
        'name' => 'Book 1',
        'author' => 'Author 2',
        'releasedYear' => 2010,
        'purchaseUrl' => 'http://example.com'
    ]
];


if ( 
    isset($_GET["order_by"]) &&  
    in_array($_GET["order_by"], array_keys($books[0]))
 ) {
    $test = true;
    usort($books, function($a, $b) {
        return $a[$_GET["order_by"] ] < $b[$_GET["order_by"]];
    });
}

?>

<?php require_once "partials/head.php"?>
<body>
    <?php require_once "partials/nav.php"?>
    
    <main>
        <section>
            <div class="container">
                <h1 class="pad-y-200">This is the Home Page</h1>

                <div>
                    <div class="flex-row aling-items-center pad-b-100">
                        <h3>Order by:</h3>
                        <ul class="flex-row list-style-none gap-100">
                            <li>
                                <a href="./?order_by=name">
                                    Name
                                </a>
                            </li>
                            <li>
                            <a href="./?order_by=author">
                                    Author
                                </a>
                            </li>
                            <li>
                            <a href="./?order_by=releasedYear">
                                    Released Year
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <ul>
                            <?php foreach ($books as $book) : ?>
                                <li>
                                    <a href="<?= $book['purchaseUrl'] ?>" target="_blank">
                                        <?= $book["name"] . " (" . $book["releasedYear"] . ") | By " . $book["author"]?>
                                    </a>
                                </li>
                            <?php endforeach; ?> 
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>
</html>