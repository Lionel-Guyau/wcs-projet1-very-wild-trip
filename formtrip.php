<?php
include("header.php");
include("pagesComponents/destinations_data.php");
?>


<!-----------------
--    The Form  ---
------------------>
<div class="formtrip-body">
    <form action="formtrip.php" method="POST">
        <div>
            <label for="inputTrip">Votre budget</label>
            <input type="number" name="budget" id="inputTrip" required value="<?php if (isset($_POST['budget'])) {
                                                                                    echo $_POST['budget'];
                                                                                } ?>" />
        </div>
        <div>
            <label for="inputDepaysement">Votre degré de dépaysement</label>
            <select name="depay" id="inputDepaysement" required value="<?php if (isset($_POST['depay'])) {
                                                                            echo $_POST['depay'];
                                                                        } ?>" />
            <option value="">Choix de 0 à 3</option>
            <option value=1>1</option>
            <option value=2>2</option>
            <option value=3>3</option>
            </select>
        </div>
        <div>
            <label for="inputClimat">Dans quel coin du globe</label>
            <select name="climat" id="inputClimat" required value="<?php if (isset($_POST['climat'])) {
                                                                        echo $_POST['climat'];
                                                                    } ?>" />
            <option value="">Choix du climat</option>
            <option value="Froid">Froid</option>
            <option value="Chaud">Chaud</option>
            <option value="Tempéré">Tempéré</option>
            <option value="Polaire">Polaire</option>
            <option value="Humide">Humide</option>
            <option value="Aride">Aride</option>
            </select>
        </div>
        <div>
            <label for="inputPerson">Nombre de personne</label>
            <select name="person" id="inputPerson" required value="<?php if (isset($_POST['person'])) {
                                                                        echo $_POST['person'];
                                                                    } ?>" />
            <option value="">De 1 à 4</option>
            <option value=1>1</option>
            <option value=2>2</option>
            <option value=3>3</option>
            <option value=4>4</option>
            </select>
        </div>
        <div>
            <label for="inputDuree">Quelle durée</label>
            <select name="duree" id="inputDuree" required value="<?php if (isset($_POST['duree'])) {
                                                                        echo $_POST['duree'];
                                                                    } ?>" />
            <option value="">En nombre de jour</option>
            <option value=2>Week-end (2 jours)</option>
            <option value=7>Semaine (7 jours)</option>
            <option value=14>Semaine (14 jours)</option>
            <option value=30>Mois (30 jours)</option>
            </select>
        </div>

        <input type="submit" id="submit" value="Mes choix" />

    </form>
    <p class="form-instruction">Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa ratione molestiae, commodi veniam, dolores non hic deleniti blanditiis explicabo aut, voluptatibus labore vel atque reiciendis velit mollitia rerum maxime delectus.</p>

    <!----------------
--   The cards   --
------------------>

    <!-- <?php
            echo "<div class ='tripPage'>";

            foreach ($destinations as $destination => $content) {
                echo "<div class='picturesContainer'>
         <h2> $destination </h2> " .
                    "<div class='destinationImage'>" .
                    $content['image'] .
                    "</div>
                <div class='descriptionParagraph'>" .
                    $content['description'] .
                    "</div>                
        </div>";
            }

            echo "<?div>";
            ?> -->

    <?php
     

$budget=$_POST['budget'];
$depay= $_POST['depay'];
$wheather= $_POST['climat'];
$person= $_POST['person'];
$duree= $_POST['duree'];

echo "<div class='form-trip-page'>";

    foreach ($destinations as $destination => $content) {
        if ($wheather == $content['wheather'] && $depay == $content['changeOfScenery'] && $budget >= $content['costByDay'] * $duree * $person) {

            $total = ($content['costByDay'] * $person * $duree);
            echo "<div class='picturesContainer'>" .
                    "<h3>$destination</h3>" .
                    $content['image'] .                    
                    $content['description'] .

                        "<p>Dépaysement: {$content['changeOfScenery']}</br>
                            Climat: {$content['wheather']} </br>
                            Par jour/pers: {$content['costByDay']} €</br>
                            <b>Coût total: {$total} € </b></p>" .
                "</div>";
        }
    }

echo "</div>";
    ?>

    <?php
    include("footer.php");
    ?>