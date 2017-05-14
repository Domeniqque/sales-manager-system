<section class="section">
    <div class="heading">
        <h1 class="title">Categorias</h1>
    </div>

    <hr>

    <div class="columns">
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
                        <?php foreach ($categories as $category): ?>
                            <tr>
                                <td><?= $category->name ?></td>
                                <td>
                                    <form action="<?= url("categories/delete") ?>" method="post">
                                        <input type="hidden" name="id" value="<?= $category->id ?>">
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
                    <?php _include("categories._create"); ?>
                </div>
            </div>
        </div>
    </div>
</section>