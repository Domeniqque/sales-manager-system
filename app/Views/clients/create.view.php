<section class="section">
    <div class="heading">
        <h1 class="title">Novo Cliente</h1>
        <hr>
    </div>

    <div class="columns">
        <div class="column is-8">
            <div class="card">
                <div class="card-content">
                    <form action="<?= url("clients") ?>" method="POST">
                        <div class="columns">
                            <div class="column is-8">
                                <div class="field">
                                    <label for="name" class="label">Nome</label>
                                    <p class="control">
                                        <input type="text" name="name" id="name" class="input" autofocus>
                                    </p>
                                </div>
                            </div>

                            <div class="column is-4">
                                <div class="field">
                                    <label for="cpf" class="label">CPF</label>
                                    <p class="control">
                                        <input type="text" class="input" id="cpf" name="cpf" required>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="columns">
                            <div class="column is-6">
                                <div class="field">
                                    <label for="email" class="label">Email</label>
                                    <p class="control">
                                        <input type="text" class="input" id="email" name="email" required>
                                    </p>
                                </div>
                            </div>

                            <div class="column is-2">
                                <div class="field">
                                    <label for="city" class="label">Cidade</label>
                                    <p class="control has-icons-left">
                                        <input type="text" class="input" id="city" name="city" required>
                                    </p>
                                </div>
                            </div>

                            <div class="column is-2">
                                <div class="field">
                                    <label for="country" class="label">Estado</label>
                                    <p class="control has-icons-left">
                                        <input type="text" class="input" id="country" name="country" required>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="columns">
                            <div class="column is-4">
                                <div class="field">
                                    <label for="birth_date" class="label">Data de Nascimento</label>
                                    <p class="control has-icons-right">
                                        <input type="date" class="input" name="birth_date" id="birth_date" required>
                                    </p>
                                </div>
                            </div>

                            <div class="column">
                                <div class="field">
                                    <label for="address" class="label">Endereço</label>
                                    <p class="control has-icons-right">
                                        <input type="text" class="input" name="address" id="address" required>
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
            </div>
        </div>
    </div>
</section>