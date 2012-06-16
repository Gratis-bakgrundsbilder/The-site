<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title></title>

    <?= Asset::css('bootstrap.css'); ?>
    <?= Asset::less('main.less'); ?>
</head>
<body>
    <div class="container-fluid">
        <header>
            <a href="<?= $baseUrl ?>">
                <h1>Gratis bakgrundsbilder!</h1>
            </a>
        </header>


        <div class="row-fluid search-container">
            <div class="span12">
                <form action="" class="well form-search">
                    <input type="search" class="search-query" value="Sök">
                    <button class="btn">Sök!</button>
                </form>
            </div>
        </div>

        <div class="image-container">
            <a href="" class="border"><img src="<?= $testImg ?>" alt=""></a>
            <a href="" class="border"><img src="<?= $testImg2 ?>" alt=""></a>
            <a href="" class="border"><img src="<?= $testImg ?>" alt=""></a>
            <a href="" class="border"><img src="<?= $testImg2 ?>" alt=""></a>
            <a href="" class="border"><img src="<?= $testImg ?>" alt=""></a>
            <a href="" class="border"><img src="<?= $testImg2 ?>" alt=""></a>
            <a href="" class="border"><img src="<?= $testImg ?>" alt=""></a>
            <a href="" class="border"><img src="<?= $testImg2 ?>" alt=""></a>
            <a href="" class="border"><img src="<?= $testImg ?>" alt=""></a>
            <a href="" class="border"><img src="<?= $testImg2 ?>" alt=""></a>
            <a href="" class="border"><img src="<?= $testImg ?>" alt=""></a>
            <a href="" class="border"><img src="<?= $testImg2 ?>" alt=""></a>
            <a href="" class="border"><img src="<?= $testImg ?>" alt=""></a>
            <a href="" class="border"><img src="<?= $testImg2 ?>" alt=""></a>
            <a href="" class="border"><img src="<?= $testImg ?>" alt=""></a>
            <a href="" class="border"><img src="<?= $testImg2 ?>" alt=""></a>
            <a href="" class="border"><img src="<?= $testImg ?>" alt=""></a>
            <a href="" class="border"><img src="<?= $testImg2 ?>" alt=""></a>
        </div>

        <footer></footer>
    </div>
</body>
</html>