<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url('public/plugins/datatables/dataTables.bootstrap.css') ?>">

<div class="row">
    <div class="col-xs-12">
        <div class="box box1">
            <div class="box-header">
                <h3 class="box-title box1-title">Lista</h3>
                <h3 class="box-title pull-left">
                    <a class="btn btn-default" href="<?= base_url('restrito/departamento/' . $departamento . '/coordenacaoOrdem') ?>">
                        <i class="fa fa-sort-numeric-asc"></i>
                        Definir Ordem
                    </a>
                </h3>
                <h3 class="box-title pull-right">
                    <a class="btn btn-default" href="<?= base_url('restrito/departamento/' . $departamento . '/coordenadorMantem') ?>">
                        <i class="fa fa-plus-circle"></i>
                        Novo Coordenador
                    </a>
                    <span style="display: none" id="dep"><?= $departamento ?></span>
                </h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <table id="dataTable" class="table table-bordered table-striped">
                    <thead>
                        <tr class="rowHead">
                            <th>Id</th>
                            <th>Nome</th>
                            <th>Cargo</th>
                            <th>Ano</th>
                            <th>Status</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($coordenacao)): ?>
                            <?php foreach ($coordenacao as $c): ?>
                                <tr title="Editar" class="row1 edit-row">
                                    <td><?= $c->getId() ?></td>
                                    <td><?= $c->getNomePessoa() ?></td>
                                    <td><?= $c->getNomeCargo() ?></td>
                                    <td><?= $c->getAno() ?></td>
                                    <td><?= $c->getStatus()->getDescricao() ?></td>
                                    <td title="" class='no-edit-col icon-actions'>
                                        <a class="icon-black glyphicon glyphicon-pencil" title="Editar" href="<?= base_url('restrito/departamento/' . $departamento . '/coordenadorMantem/' . $c->getId()) ?>">
                                        </a>
                                        <?php if ($c->getStatus()->getId() == enums\TipoStatus::ATIVO) { ?>
                                            <p style="display:none">0</p>
                                            <a class="icon-black glyphicon glyphicon-remove" title="Inativar" href="javascript: inativar(<?= $c->getId() ?>, 'restrito/departamento/<?= $departamento ?>/inativarCoordenador')">
                                            </a>
                                        <?php } else { ?>
                                            <p style="display:none">1</p>
                                            <a class="icon-black glyphicon glyphicon-ok" title="Ativar" href="javascript: ativar(<?= $c->getId() ?>,  'restrito/departamento/<?= $departamento ?>/ativarCoordenador')">
                                            </a>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div><!-- /.col -->
</div><!-- /.row -->
<!-- DataTables -->
<script type="text/javascript" src="<?= base_url('public/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('public/plugins/datatables/dataTables.bootstrap.min.js') ?>"></script>
<script>
    $(function () {
        $('#dataTable').DataTable({
            "language": {
                url: BASE_URL + "/public/plugins/datatables/language/pt-br.lang"
            },
            "order": [[0, "desc"]]
        });
    });

    $('.edit-row > td').on('click', function (e) {
        if (!$(this).hasClass('no-edit-col')) {
            var id = $(this).parent().children().first().text();
            location.href = BASE_URL + 'restrito/departamento/' + $("#dep").text() + '/coordenadorMantem/' + id;
        }

    });
</script>