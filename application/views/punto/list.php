<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Valor</th>
        </tr>
    </thead>
    <tbody>
        <?php if(!empty($puntos)): ?>
            <?php foreach ($puntos as $punto): ?>
                <tr class="item-row" data-id="<?php echo $punto['punt_clave']; ?>">
                    <td scope="row"><?php echo $punto['punt_clave']; ?></td>
                    <td><?php echo $punto['punt_valor']; ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="2">
                    <span class="text-info">Sin registro de puntos</span>
                </td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>