<section class="section">
    <div class="heading">
        <h1 class="title">Categorias</h1>
    </div>

    <hr>

    <div class="columns">
        <div class="column is-8">
            <div class="card">
                <div class="card-content">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Produtos</th>
                            <th>Excluir</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($categories as $category): ?>
                            <tr>
                                <td><?= $category->name ?></td>
                                <td>0</td>
                                <td>
                            <span class="is-danger">
                                <a href="<?= url("categories/{$category->id}/delete") ?>" class="delete is-delete-danger is-medium"></a>
                            </span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="column">
            <div class="card">
                <div class="card-content">
                    <?php _include("categories._create"); ?>
                </div>
            </div>
        </div>
    </div>
</section>