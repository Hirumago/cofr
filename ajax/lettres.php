<?php

session_start();

//voyelles de base
$tab_voyelles_base = array(
    "ㅏ" => "a", "ㅑ" => "ya", "ㅓ" => "eo", "ㅕ" => "yeo", "ㅗ" => "o", "ㅛ" => "yo", "ㅜ" => "u", "ㅠ" => "yu", "ㅡ" => "eu", "ㅣ" => "i"
);

//voyelles composées
$tab_voyelles_composees = array(
    "ㅐ" => "é-è", "ㅒ" => "yé-yè", "ㅔ" => "yé-yè", "ㅖ" => "yé-yè", "ㅘ" => "wa", "ㅙ" => "wé-wè", "ㅚ" => "wé-wè", "ㅝ" => "weo", "ㅞ" => "wé-wè", "ㅟ" => "wi", "ㅢ" => "eui"
);

//consonnes de base
$tab_consonnes_base = array(
    "ㄱ" => "gu-k", "ㄴ" => "n", "ㄷ" => "d-t", "ㄹ" => "l", "ㅁ" => "m", "ㅂ" => "b-p", "ㅅ" => "s-sh", "ㅇ" => "ng", "ㅈ" => "dj-tch", "ㅊ" => "tch", "ㅋ" => "kh", "ㅌ" => "th", "ㅍ" => "ph", "ㅎ" => "h"
);

//consonnes doubles
$tab_consonnes_doubles = array(
    "ㄲ" => "kk", "ㄸ" => "tt", "ㅃ" => "pp", "ㅆ" => "ss", "ㅉ" => "jj"
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
            <h3>Voyelles de base</h3>
            <table>
                <thead>
                <tr>
                    <th>Lettre</th>
                    <th>Réponse</th>
                    <th>Transcription</th>
                    <th>Résultat</th>
                </tr>
                </thead>
                <tbody>


                <?php
                foreach ($tab_voyelles_base as $key => $value) {
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


        <div class="lettres">
            <h3>Voyelles composées</h3>
            <table>
                <thead>
                <tr>
                    <th>Lettre</th>
                    <th>Réponse</th>
                    <th>Transcription</th>
                    <th>Résultat</th>
                </tr>
                </thead>
                <tbody>


                <?php
                foreach ($tab_voyelles_composees as $key => $value) {
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

        <div class="lettres">
            <h3>Consonnes de base</h3>
            <table>
                <thead>
                <tr>
                    <th>Lettre</th>
                    <th>Réponse</th>
                    <th>Transcription</th>
                    <th>Résultat</th>
                </tr>
                </thead>
                <tbody>


                <?php
                foreach ($tab_consonnes_base as $key => $value) {
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

        <div class="lettres">
            <h3>Consonnes doubles</h3>
            <table>
                <thead>
                <tr>
                    <th>Lettre</th>
                    <th>Réponse</th>
                    <th>Transcription</th>
                    <th>Résultat</th>
                </tr>
                </thead>
                <tbody>


                <?php
                foreach ($tab_consonnes_doubles as $key => $value) {
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
    $entrainement = array_merge($tab_voyelles_base, $tab_voyelles_composees, $tab_consonnes_base, $tab_consonnes_doubles);
//    $entrainement = $tab_consonnes_doubles;
//    $entrainement = $tab_voyelles_composees;

    $_SESSION['entrainement'] = $entrainement;

    ?>

    <div id="tableau-lettres">
        <div class="lettres">
            <form action="">
                <table>
                    <thead>
                    <tr>
                        <th>Lettre</th>
                        <th>Réponse</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($entrainement as $coreen => $traduction) {
                        ?>
                        <tr class="ligne-reponse">
                            <td><?php echo $coreen; ?></td>
                            <td><input type="text" maxlength="3" class="reponse" name="<?php echo $coreen; ?>"></td>
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
            <h3>Voyelles de base</h3>
            <table>
                <thead>
                <tr>
                    <th>Lettre</th>
                    <th>Transcription</th>
                </tr>
                </thead>
                <tbody>


                <?php
                foreach ($tab_voyelles_base as $key => $value) {
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


        <div class="lettres">
            <h3>Voyelles composées</h3>
            <table>
                <thead>
                <tr>
                    <th>Lettre</th>
                    <th>Transcription</th>
                </tr>
                </thead>
                <tbody>


                <?php
                foreach ($tab_voyelles_composees as $key => $value) {
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

        <div class="lettres">
            <h3>Consonnes de base</h3>
            <table>
                <thead>
                <tr>
                    <th>Lettre</th>
                    <th>Transcription</th>
                </tr>
                </thead>
                <tbody>


                <?php
                foreach ($tab_consonnes_base as $key => $value) {
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

        <div class="lettres">
            <h3>Consonnes doubles</h3>
            <table>
                <thead>
                <tr>
                    <th>Lettre</th>
                    <th>Transcription</th>
                </tr>
                </thead>
                <tbody>


                <?php
                foreach ($tab_consonnes_doubles as $key => $value) {
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