<?php

if (isset($_GET['voyelles_base']) && isset($_GET['tableau_entier'])) {
    ?>
    <table>
        <thead>
        <tr>
            <th>Lettre</th>
        </tr>
        </thead>
        <tbody>


        <?php
        foreach ($tab_voyelles_base as $key => $value) {
            ?>
            <tr>
                <td><?php echo $value; ?></td>
                <td>
                    <input type="text" maxlength="3" value="<?php echo $key; ?>">
                </td>
            </tr>
            <?php
        }

        ?>

        </tbody>

        <script>
            let voyelles_base = <?php echo json_encode($tab_voyelles_base); ?>;
        </script>
    </table>
    <?php
}