<br>
<aside class="menu">
    <p class="menu-label">
        Geral
    </p>
    <ul class="menu-list">
        <li><a href="#">Início</a></li>
    </ul>

    <p class="menu-label">
        Administração
    </p>
    <ul class="menu-list">
        <li>
            <a class="is-active">Produtos</a>
            <ul>
                <li><a href="<?= url("products") ?>">Ver Todos</a></li>
                <li><a href="<?= url("products/create") ?>">Novo Produto</a></li>
                <li><a href="<?= url("categories") ?>">Categorias</a></li>
            </ul>
        </li>
        <li>
            <a>Clientes</a>
            <ul>
                <li><a href="<?= url("clients") ?>">Ver Todos</a></li>
                <li><a href="<?= url("clients/create") ?>">Novo Cientel</a></li>
            </ul>
        </li>
        <li><a href="<?= url("requests") ?>">Pedidos</a></li>
    </ul>
</aside>