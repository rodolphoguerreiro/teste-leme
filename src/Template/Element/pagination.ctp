<div class="paginator text-right mt-3">
    <ul class="pagination justify-content-end pagination-sm">
        <?php

            $link = '<li class="page-item"><a href="{{url}}" class="page-link text-info">{{text}}</a></li>';
            $link_active = '<li class="page-item active"><a href="{{url}}" class="page-link bg-info border border-info">{{text}}</a></li>';
            $link_disabled = '<li class="page-item disabled"><a href="{{url}}" class="page-link">{{text}}</a></li>';

            $this->Paginator->setTemplates([
                'nextActive' => $link,
                'nextDisabled' => $link_disabled,
                'prevActive' => $link,
                'prevDisabled' => $link_disabled,
                'first' => $link,
                'last' => $link,
                'number' => $link,
                'current' => $link_active
            ]);
        ?>

        <?= $this->Paginator->first('Primeiro') ?>
        <?= $this->Paginator->prev('&lsaquo;', ['escape' => false]) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next('&rsaquo;', ['escape' => false]) ?>
        <?= $this->Paginator->last('Último') ?>
    </ul>
    <span class="text-secondary"><?= $this->Paginator->counter('Página {{page}} de {{pages}}, mostrando {{current}} resultados do total de {{count}}'); ?></span>
</div>
