<?php
    use Cake\Core\Configure;
    use Cake\Error\Debugger;
?>

<?php if (Configure::read('debug')): ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12 error-page py-5">
                <h4 class="mb-4"><?= $message ?></h4>
                <pre><?= $error ?></pre>
            </div>
        </div>
    </div>
<?php else : ?>
    <div class="container error-page text-center">
        <h1 class="display-1 border bg-dark text-white rounded d-inline-block px-4"><b>404!</b></h1>
        <h4 class="text-center mt-4">Deculpe, mas não encontramos essa página em nosso sistema.<br/>Isso pode ter ocorrido por algum erro na url passada.</h4>
    </div>
<?php endif; ?>
