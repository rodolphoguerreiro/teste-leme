<!DOCTYPE HTML>
<html xmlns='http://www.w3.org/1999/xhtml' xmlns:og='http://ogp.me/ns#'>
<head>

    <?= $this->Html->charset(); ?>

    <meta http-equiv="Content-Language" content="pt-br" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="language" content="pt-br"/>

    <title>Teste Leme</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

    <?= $this->Html->script('script'); ?>
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <?= $this->Html->link('Clientes', ['controller' => 'clientes', 'action' => 'index'], ['class' => 'nav-link']); ?>
                    </li>
                    <li class="nav-item">
                        <?= $this->Html->link('Pedidos', ['controller' => 'pedidos', 'action' => 'index'], ['class' => 'nav-link']); ?>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="container">
        <?= $this->fetch('content'); ?>
    </div>
    <div class="modal fade" id="modal">
        <div class="modal-dialog">
            <div class="modal-content"></div>
        </div>
    </div>
</body>
</html>
