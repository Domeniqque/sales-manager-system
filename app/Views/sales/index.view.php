<section class="section">
    <div class="heading">
        <h1 class="title">Vendas</h1>
    </div>

    <hr>

    <div class="columns">
        <div class="column is-7">
            <div class="card">
                <div class="card-header">
                    <p class="card-header-title">Nova Venda</p>
                </div>
                <div class="card-content">
                    <form action="<?= url("sales") ?>" method="POST">
                        <div class="field has-addons">
                            <p class="control">
                                <span class="select">
                                    <select name="client_id" id="client_id" required>
                                        <option value="">Selecione um cliente</option>
                                        <?php foreach ($clients as $client): ?>
                                            <option value="<?= $client->id ?>">
                                                <?= $client->cpf ?> - <?= $client->name ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </span>
                            </p>
                            <p class="control">
                                <button type="submit" class="button is-primary">Continuar</button>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="columns">
        <div class="column">
            <div class="card">
                <div class="card-header">
                    <p class="card-header-title">
                        Vendas
                    </p>
                </div>
                <div class="card-content">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Cliente</th>
                                <th>Data</th>
                                <th>Valor</th>
                                <th>Situação</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($sales as $sale): ?>
                            <tr>
                                <td><?= $sale->client->name ?></td>
                                <td><?= $sale->created_at ?></td>
                                <td>R$<?= $sale->value ?></td>
                                <td></td>
                                <td>
                                    <a href="<?= url("sales/cart?client_id={$sale->client_id}&sale_id={$sale->id}") ?>" class="tag is-info">ver</a>
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