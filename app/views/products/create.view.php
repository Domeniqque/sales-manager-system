<section class="section">
    <div class="container">
        <div class="heading">
            <h1 class="title">Novo Produto</h1>
            <h2 class="subtitle">Como é seu produto?</h2>
        </div>

        <hr>

        <form action="">
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
                            <input type="number" class="input" id="price">
                            <span class="icon is-small is-left">R$</span>
                        </p>
                    </div>
                </div>

                <div class="column is-2">
                    <div class="field">
                        <label for="weight" class="label">Peso</label>
                        <p class="control has-icons-right">
                            <input type="number" class="input" name="weight" id="weight">
                            <span class="icon is-small is-right">Kg</span>
                        </p>
                    </div>
                </div>

                <div class="column is-2">
                    <div class="field">
                        <label for="quantity" class="label">Quantidade</label>
                        <p class="control">
                            <input type="number" class="input" id="quantity">
                        </p>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>