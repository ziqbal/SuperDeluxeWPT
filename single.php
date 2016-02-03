<!DOCTYPE html>

<html lang="en">

<?= get_template_part( 'template-parts/_head' ) ?>

<body>

<?= get_template_part( 'template-parts/_nav' ) ?>


<div class="container">

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?= get_the_title( ) ?>
            </h1>
        </div>
    </div>


    <div class="row">
        <div class="col-md-6">
            <img class="img-responsive" src="http://placehold.it/750x450" alt="">
        </div>
        <div class="col-md-6">
        <?= get_post( )->post_content ?>
        </div>
    </div>          

    <?= get_template_part( 'template-parts/_footer' ) ?>

</div>


</body>

</html>
