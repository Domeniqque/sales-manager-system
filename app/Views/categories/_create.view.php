<form action="<?= url("categories") ?>" method="POST">
    <div class="field">
        <label for="name" class="label">Nome</label>
        <p class="control">
            <input type="text" class="input" id="name" name="name" required>
        </p>
    </div>

    <div class="is-grouped">
        <button type="submit" class="button is-primary">Salvar</button>
        <button type="reset" class="button is-link">cancelar</button>
    </div>
</form>