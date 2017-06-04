<br>
<aside class="menu">
    <p class="menu-label">
        Administração
    </p>
    <ul class="menu-list">
        <li>
            <ul>
                <li><a href="<?= url("products/create") ?>">Cadastrar Produto</a></li>
                <li><a href="<?= url("categories") ?>">Categorias</a></li>
            </ul>
        </li>
        <li>
            <a href="<?= url("clients") ?>">Clientes</a>
            <ul>
                <li><a href="<?= url("clients/create") ?>">Cadastrar Cliente</a></li>
            </ul>
        </li>
        <li>
            <a href="<?= url("sales") ?>">Pedidos</a>
            <ul>
                <li><a href="<?= url("sales/create") ?>">Novo Pedido</a></li>
            </ul>
        </li>
    </ul>
</aside>