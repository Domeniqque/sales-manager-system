<form action="<?= url("sales") ?>" method="POST">
    <div class="field">
        <label for="client_id" class="label">Cliente</label>
        <p class="control">
            <span class="select">
                <select name="client_id" id="client_id">
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