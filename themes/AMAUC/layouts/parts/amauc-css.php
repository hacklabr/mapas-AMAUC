<style>
<?php foreach ($images as $id => $url):  ?>
    #<?= $id ?> { background-image: url("<?= $url ?>"); }
<?php endforeach; ?>
</style>