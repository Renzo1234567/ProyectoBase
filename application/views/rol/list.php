<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Rol</th>
        </tr>
    </thead>
    <tbody>
        <?php if(!empty($roles)): ?>
            <?php foreach ($roles as $rol): ?>
                <tr class="item-row" data-id="<?php echo $rol['rol_codigo']; ?>">
                    <td scope="row"><?php echo $rol['rol_codigo']; ?></td>
                    <td><?php echo $rol['rol_nombre']; ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="2">
                    <span class="text-info">Sin registro de roles</span>
                </td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>