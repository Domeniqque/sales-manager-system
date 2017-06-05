<section class="section">
    <div class="heading">
        <h1 class="title">Vendas</h1>
    </div>

    <hr>

    <div class="columns">
        <div class="column is-2">
            <?php _include("sales._aside-menu"); ?>
        </div>
        <div class="column is-10">
            <div class="card">
                <div class="card-header">
                    <p class="card-header-title">Nova venda</p>
                </div>

                <div class="card-content">
                    <form action="<?= url("sales/items/add")?>" method="POST">
                        <input type="hidden" name="client_id" value="<?= $client->id ?>">
                        <input type="hidden" name="sale_id" value="<?= $sale_id ?? '' ?>">

                        <section class="content">
                            <blockquote>
                                <p>para <b><?= $client->name ?></b> (<?= $client->cpf ?>, <em><?= $client->email ?></em>)</p>
                            </blockquote>
                        </section>

                        <div class="columns">
                            <div class="column is-6">
                                <div class="field">
                                    <label for="product" class="label">Produto</label>
                                    <p class="control">
                                        <span class="select">
                                            <select name="product_id" id="product" required>
                                                <option value="">Selecione</option>
                                                <?php foreach ($products as $product): ?>
                                                    <option value="<?= $product->id ?>"><?= $product->name ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </span>
                                    </p>
                                </div>
                            </div>

                            <div class="column is-2">
                                <div class="field">
                                    <label for="quantity" class="label">Quantidade</label>
                                    <p class="control">
                                        <input type="number" class="input" name="quantity" id="quantity" value="1" min="1">
                                    </p>
                                </div>
                            </div>

                            <div class="column is-2">
                                <div class="field" style="margin-top: 32px;">
                                    <p class="control">
                                        <button type="submit" class="button is-primary">Adicionar produto</button>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">
                    <p class="card-header-title">
                        Carrinho
                    </p>
                </div>
                <div class="card-content">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Produto</th>
                                <th>Quantidade</th>
                                <th>Preço unitário</th>
                                <th>Preço final</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($sale->items as $item): ?>
                                <tr>
                                    <td><?= $item->id ?></td>
                                    <td><?= $item->product->name ?></td>
                                    <td><?= $item->quantity ?></td>
                                    <td>R$<?= $item->value ?></td>
                                    <td>R$<?= floatval($item->value * $item->quantity) ?></td>
                                    <td title="Remover produto do carrinho">
                                        <form action="<?= url("sales/items/remove")?>" method="POST">
                                            <input type="hidden" name="sale_id" value="<?= $sale->id?>">
                                            <input type="hidden" name="item_id" value="<?= $item->id?>">
                                            <button type="submit" class="delete is-medium is-delete-danger"></button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach;?>

                            <?php if (is_null($sale->items)): ?>
                                <tr>
                                    <td colspan="6"></td>
                                </tr>
                                <tr class="is-selected">
                                    <td colspan="6">Insira alguns produtos no carrinho</td>
                                </tr>
                                <tr>
                                    <td colspan="6"></td>
                                </tr>
                            <?php endif; ?>
                        </tbody>

                        <thead>
                            <tr>
                                <th colspan="4" class="title is-4">Total</th>
                                <th colspan="2"><span class="subtitle is-4">R$<?= $sale->value ?? '0' ?></span></th>
                            </tr>
                        </thead>
                    </table>
                </div>

                <div class="card-footer">
                    <a href="<?= url("sales/checkout?sale={$sale->id}") ?>" class="card-footer-item ">Finalizar venda</a>
                    <a href="<?= url("sales/save?sale={$sale->id}") ?>" class="card-footer-item">Guardar venda</a>
                    <a href="<?= url("sales/cancel?sale={$sale->id}") ?>" class="card-footer-item">Cancelar</a>
                </div>
            </div>
        </div>
    </div>
</section>