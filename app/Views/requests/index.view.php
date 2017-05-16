<section class="section">
    <div class="heading">
        <h1 class="title">Pedidos</h1>
    </div>

    <hr>

    <div class="columns">
        <div class="column is-7">
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
                                    <form action="<?= url("requests/delete") ?>" method="post">
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

        <div class="column is-5">
            <div class="card">
                <div class="card-content">
                    <form action="<?= url("requests") ?>" method="POST">
                        <div class="field">
                            <label for="client_id" class="label">Cliente</label>
                            <p class="control">
                                <span class="select">
                                    <select name="client_id" id="client_id" required>
                                        <option>Selecione um cliente</option>
                                        <?php foreach ($clients as $client): ?>
                                            <option value="<?= $client->id ?>"><?= $client->name ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </span>
                            </p>
                        </div>

                        <div class="is-grouped">
                            <button type="submit" class="button is-primary">Salvar</button>
                            <button type="reset" class="button is-link">cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>