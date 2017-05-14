<section class="section">
    <div class="heading">
        <h1 class="title">Produtos</h1>
        <hr>
    </div>

    <div class="columns">
        <div class="column is-8">
            <div class="card">
                <div class="card-content">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Quantidade</th>
                            <th>Preço</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($products as $product): ?>
                            <tr>
                                <td><?= $product->id ?></td>
                                <td><?= $product->name ?></td>
                                <td><?= $product->quantity ?></td>
                                <td><?= priceFormat($product->price) ?></td>
                                <td>
                                    <a href="<?= url("products/{$product->id}/edit") ?>" class="button is-primary is-outlined is-small">editar</a>
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
