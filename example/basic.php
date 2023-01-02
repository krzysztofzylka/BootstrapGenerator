<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<div class="p-4">
    <?php

    include('../vendor/autoload.php');

    use krzysztofzylka\BootstrapGenerator\BootstrapGenerator;
    use krzysztofzylka\BootstrapGenerator\enum\BackgroundColor;
    use krzysztofzylka\BootstrapGenerator\enum\Size;
    use krzysztofzylka\BootstrapGenerator\enum\ThemeColor;
    use krzysztofzylka\HtmlGenerator\Html;

    echo BootstrapGenerator::alert('alert')
        . BootstrapGenerator::alert('alert', ThemeColor::Danger)->header('Danger')
        . BootstrapGenerator::badge('badge')->roundedPill()
        . BootstrapGenerator::badge('badge', BackgroundColor::DangerSubtle)
        . Html::hr()
        . BootstrapGenerator::breadcrumb()->addBreadcrumb('a')->addBreadcrumb('b')->addBreadcrumb('c', true)
        . BootstrapGenerator::button('Button')
        . BootstrapGenerator::button('Button2')->size(Size::Sm)
        . BootstrapGenerator::button('Button3')->size(Size::Sm)->disable()
        . BootstrapGenerator::button('Button4')->size(Size::Sm)->badge('5');

    ?>
</div>