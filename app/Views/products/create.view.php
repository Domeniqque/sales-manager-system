<section class="section">
    <div class="container">
        <div class="heading">
            <h1 class="title">Novo Produto</h1>
        </div>

        <hr>

        <form action="/products" method="POST">
            <div class="columns">
                <div class="column is-4">
                    <div class="field">
                        <label for="name" class="label">Nome</label>
                        <p class="control">
                            <input type="text" name="name" id="name" class="input" autofocus>
                        </p>
                    </div>
                </div>

                <div class="column is-4">
                    <div class="field">
                        <label for="category" class="label">Categoria</label>
                        <p class="control">
                            <span class="select">
                                <select name="category_is" id="category">
                                    <option>Selecione</option>
                                    <option>Categoria 1</option>
                                </select>
                            </span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="columns">
                <div class="column is-2">
                    <div class="field">
                        <label for="price" class="label">Preço</label>
                        <p class="control has-icons-left">
                            <input type="number" class="input" id="price" step="any">
                            <span class="icon is-small is-left">R$</span>
                        </p>
                    </div>
                </div>

                <div class="column is-2">
                    <div class="field">
                        <label for="weight" class="label">Peso</label>
                        <p class="control has-icons-right">
                            <input type="number" class="input" name="weight" id="weight" title="Em grama" step="100">
                            <span class="icon is-small is-right">g</span>
                        </p>
                    </div>
                </div>

                <div class="column is-2">
                    <div class="field">
                        <label for="quantity" class="label">Quantidade</label>
                        <p class="control">
                            <input type="number" class="input" id="quantity" step="5">
                        </p>
                    </div>
                </div>
            </div>

            <div class="columns">
                <div class="column is-6">
                    <div class="field">
                        <label for="description" class="label">Descrição</label>
                        <p class="control">
                            <textarea name="description" id="description" cols="30" rows="10" class="textarea"
                                      placeholder="Descreva de modo breve este produto"></textarea>
                        </p>
                    </div>
                </div>
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
</section>