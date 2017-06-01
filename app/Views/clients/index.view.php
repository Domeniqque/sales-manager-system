<section class="section">
    <div class="heading">
        <h1 class="title">Clientes</h1>
        <hr>
    </div>

    <div class="columns">
        <div class="column is-2">
            <?php _include('clients._aside-menu'); ?>
        </div>
        <div class="column is-10">
            <div class="card">
                <div class="card-content">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>CPF</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($clients as $client): ?>
                            <tr>
                                <td><?= $client->id ?></td>
                                <td><?= $client->cpf ?></td>
                                <td><?= $client->name ?></td>
                                <td><?= $client->email ?></td>
                                <td>
                                    <a href="<?= url("clients/{$client->id}/remove") ?>" class="button is-primary is-outlined is-small">editar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
