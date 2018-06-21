<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
        </tr>
    </thead>
    <tbody>
        <?php if(!empty($tiendas)): ?>
            <?php foreach ($tiendas as $tienda): ?>
                <tr class="item-row" data-id="<?php echo $tienda['tien_clave']; ?>">
                    <td scope="row"><?php echo $tienda['tien_clave']; ?></td>
                    <td><?php echo $tienda['tien_nombre']; ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="2">
                    <span class="text-info">Sin inventario</span>
                </td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>