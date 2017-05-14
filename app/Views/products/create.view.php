<section class="section">
    <div class="heading">
        <h1 class="title">Novo Produto</h1>
        <hr>
    </div>

    <div class="columns">
        <div class="column is-8">
            <div class="card">
                <div class="card-content">
                    <form action="<?= url("products") ?>" method="POST">
                        <div class="columns">
                            <div class="column is-9">
                                <div class="field">
                                    <label for="name" class="label">Nome</label>
                                    <p class="control">
                                        <input type="text" name="name" id="name" class="input" autofocus>
                                    </p>
                                </div>
                            </div>

                            <div class="column is-3">
                                <div class="field">
                                    <label for="quantity" class="label">Quantidade</label>
                                    <p class="control">
                                        <input type="number" class="input" id="quantity" step="5">
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="columns">
                            <div class="column is-3">
                                <div class="field">
                                    <label for="price" class="label">Preço</label>
                                    <p class="control has-icons-left">
                                        <input type="number" class="input" id="price" step="any">
                                        <span class="icon is-small is-left">R$</span>
                                    </p>
                                </div>
                            </div>

                            <div class="column is-3">
                                <div class="field">
                                    <label for="weight" class="label">Peso</label>
                                    <p class="control has-icons-right">
                                        <input type="number" class="input" name="weight" id="weight" title="Em grama" step="100">
                                        <span class="icon is-small is-right">g</span>
                                    </p>
                                </div>
                            </div>

                            <div class="column is-6">
                                <div class="field">
                                    <label for="category" class="label">Categoria</label>
                                    <p class="control">
                                        <span class="select">
                                            <select name="category_id" id="category">
                                                <?php foreach ($categories as $category): ?>
                                                    <option value="<?= $category->id ?>"><?= $category->name ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="field">
                            <label for="description" class="label">Descrição</label>
                            <p class="control">
                                <textarea name="description" id="description" cols="30" rows="10" class="textarea"
                                          placeholder="Descreva de modo breve este produto"></textarea>
                            </p>
                        </div>

                        <div class="field is-grouped">
                            <p class="control">
                                <button type="submit" class="button is-primary">Cadastrar</button>
                            </p>
                            <p class="control">
                                <button type="button" class="button is-link">Cancelar</button>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>