<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<div class="p-4">
    <?php
        include('../vendor/autoload.php');

        use krzysztofzylka\BootstrapGenerator\BootstrapGenerator;

        echo BootstrapGenerator::navbar()
            ->addBrand('Brand')
            ->addLink('Home', '#', \krzysztofzylka\BootstrapGenerator\enum\Option::Active)
            ->addLink('Page1')
            ->addLink('Page disabled', '#', \krzysztofzylka\BootstrapGenerator\enum\Option::Disabled)
        ;
    ?>
</div>