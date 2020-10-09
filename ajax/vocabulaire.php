<?php

session_start();

//salve 1
$salve_1 = array(
  "곡 gok" => "mélodie", "부엌 bueok" => "cuisine", "밖 bak" => "dehors", "밖에 bakke" => "dehors", "넋 neok" => "âme", "넋이 neokssi" => "âme"
);


if (isset($_GET['voyelles_base']) && isset($_GET['tableau_entier'])) {

}

elseif (isset($_GET['entrainement']) && isset($_POST["reponses"])){
    $reponses = json_decode($_POST['reponses']);

    $reponses_formatees = array();

    foreach ($reponses as $value){
        $temp = explode("-", $value);
        $reponses_formatees[$temp[0]] = $temp[1];
    }

    ?>

    <div id="tableaux-lettres">
        <div class="lettres">
            <h3>Vocabulaire</h3>
            <table>
                <thead>
                <tr>
                    <th>Mot</th>
                    <th>Réponse</th>
                    <th>Transcription</th>
                    <th>Résultat</th>
                </tr>
                </thead>
                <tbody>


                <?php
                foreach ($salve_1 as $key => $value) {
                    ?>
                    <tr>
                        <td><?php echo $key; ?></td>
                        <td><?php echo $reponses_formatees[$key]; ?></td>
                        <td><?php echo $value; ?></td>
                        <td>
                            <?php
                            if (strpos($value, "-") !== false){
                                $test = explode("-", $value);
                            }
                            else{
                                $test[0] = $value;
                            }
                            if (in_array($reponses_formatees[$key], $test)){
                                ?>
                                <img src="assets/medias/icons/true.png" alt="">
                                <?php
                            }
                            else{
                                ?>
                                <img src="assets/medias/icons/wrong.png" alt="">
                                <?php
                            }
                            ?>
                        </td>
                    </tr>
                    <?php
                }

                ?>

                </tbody>
            </table>
        </div>




    </div>

    <?php

}
elseif (isset($_GET['entrainement'])) {
    $entrainement = $salve_1;
    $entrainement = shuffle_assoc($entrainement);
    $_SESSION['entrainement'] = $entrainement;

    ?>

    <div id="tableau-lettres">
        <div class="lettres">
            <form action="">
                <table>
                    <thead>
                    <tr>
                        <th>Mot</th>
                        <th>Réponse</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($entrainement as $coreen => $traduction) {
                        ?>
                        <tr class="ligne-reponse">
                            <td><?php echo $coreen; ?></td>
                            <td><input type="text" maxlength="24" class="reponse" name="<?php echo $coreen; ?>"></td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </form>

            <button id="validation">Valider</button>
        </div>
    </div>
    <?php
}
elseif (isset($_GET['tableau_entier'])) {
    ?>
    <div id="tableaux-lettres">
        <div class="lettres">
            <h3>Vocabulaire</h3>
            <table>
                <thead>
                <tr>
                    <th>Mot</th>
                    <th>Transcription</th>
                </tr>
                </thead>
                <tbody>


                <?php
                foreach ($salve_1 as $key => $value) {
                    ?>
                    <tr>
                        <td><?php echo $key; ?></td>
                        <td><?php echo $value; ?></td>
                    </tr>
                    <?php
                }

                ?>

                </tbody>
            </table>
        </div>
    </div>

    <?php
}

function shuffle_assoc($list) {
    if (!is_array($list)) return $list;

    $keys = array_keys($list);
    shuffle($keys);
    $random = array();
    foreach ($keys as $key) {
        $random[$key] = $list[$key];
    }
    return $random;
}