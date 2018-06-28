<style>
    html, body {
        height: 100%;
    } 
    #consult-result {
        margin-top: -95px;
    }
</style>

<div class="container" id="consult-result">
    <div class="row">
        <div class="col-10">
            <h4>
                Resultados de la consulta
            </h4>
        </div>
        <div class="col-2 text-right">
            <a href="<?php echo base_url(); ?>consulta" class="btn btn-link">Volver</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12 table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col" style="width: 10px" class="small">#</th>
                        <?php foreach($cols as &$col): ?>
                                <th><?php echo $col ?></th>
                        <?php endforeach; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($rows as $i => &$row): ?>
                        <tr>
                            <td class="small"><?php echo $i + 1 ?></td>
                            <?php foreach($cols as &$col): ?>
                                <td><?php echo $row[$col] ?></td>
                            <?php endforeach; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#main-nav').removeClass('fixed-top');

        var w = $(window).height();
        var n = $('#main-nav').outerHeight();

        var h = w - n - 38; //window 100% - main-nav - 2 (margin top)

        $('.table-responsive').height(h);
    });
</script>
