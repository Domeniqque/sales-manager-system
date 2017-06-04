<section class="section">
    <div class="heading">
        <h1 class="title">Produtos</h1>
        <hr>
    </div>

    <div class="columns">
        <div class="column is-2">
            <?php _include('products._aside-menu'); ?>
        </div>
        <div class="column is-10">
            <div class="card">
                <div class="card-header">
                    <p class="card-header-title">Editar produto</p>
                </div>
                <div class="card-content">
                    <form action="<?= url("products/edit") ?>" method="POST">

                        <input type="hidden" name="product_id" value="<?= $product->id ?>">

                        <div class="columns">
                            <div class="column is-9">
                                <div class="field">
                                    <label for="name" class="label">Nome</label>
                                    <p class="control">
                                        <input type="text" name="name" id="name" class="input" value="<?= $product->name ?>" autofocus>
                                    </p>
                                </div>
                            </div>

                            <div class="column is-3">
                                <div class="field">
                                    <label for="quantity" class="label">Quantidade</label>
                                    <p class="control">
                                        <input type="number" class="input" id="quantity" name="quantity" step="1" value="<?= $product->quantity ?>" required>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="columns">
                            <div class="column is-3">
                                <div class="field">
                                    <label for="price" class="label">Preço</label>
                                    <p class="control has-icons-left">
                                        <input type="number" class="input" id="price" name="price" step="any" value="<?= $product->price ?>" required>
                                        <span class="icon is-small is-left">R$</span>
                                    </p>
                                </div>
                            </div>

                            <div class="column is-3">
                                <div class="field">
                                    <label for="weight" class="label">Peso</label>
                                    <p class="control has-icons-right">
                                        <input type="number" class="input" name="weight" id="weight" title="Em grama" value="<?= $product->weight ?>" required>
                                        <span class="icon is-small is-right">g</span>
                                    </p>
                                </div>
                            </div>

                            <div class="column is-6">
                                <div class="field">
                                    <label for="category" class="label">Categoria</label>
                                    <p class="control">
                                        <span class="select">
                                            <select name="category_id" id="category" required>
                                            <?php foreach ($categories as $category): ?>
                                                <option value="<?= $category->id ?>" <?= !($product->category_id === $category->id) ? : ' selected' ?>><?= $category->name ?></option>
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
                                          placeholder="Descreva de modo breve este produto" required><?= $product->description ?></textarea>
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