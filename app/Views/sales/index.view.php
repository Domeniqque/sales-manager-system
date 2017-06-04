<section class="section">
    <div class="heading">
        <h1 class="title">Vendas</h1>
    </div>

    <hr>

    <div class="columns">
        <div class="column is-2">
            <?php _include("sales._aside-menu"); ?>
        </div>

        <div class="column is-6">
            <div class="card">
                <div class="card-content">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Excluir</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($requests as $request): ?>
                            <tr>
                                <td><?= $request->name ?></td>
                                <td>
                                    <form action="<?= url("sales/delete") ?>" method="post">
                                        <input type="hidden" name="id" value="<?= $request->id ?>">
                                        <span class="is-danger">
                                            <button type="submit" class="delete is-delete-danger is-medium"></button>
                                        </span>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="column is-4">
            <div class="card">
                <div class="card-header">
                    <p class="card-header-title">Nova Venda</p>
                </div>
                <div class="card-content">
                    <form action="<?= url("sales") ?>" method="POST">
                        <div class="field">
                            <label for="client_id" class="label">Cliente</label>
                            <p class="control">
                                <span class="select">
                                    <select name="client_id" id="client_id" required>
                                        <option value="">Selecione</option>
                                        <?php foreach ($clients as $client): ?>
                                            <option value="<?= $client->id ?>"><?= $client->name ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </span>
                            </p>
                        </div>

                        <div class="is-grouped">
                            <button type="submit" class="button is-primary">Continuar</button>
                            <button type="reset" class="button is-link">cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>