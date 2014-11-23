<?php
use Parse\ParseClient;
use Parse\ParseQuery;

require __DIR__ . '/../vendor/autoload.php';

ParseClient::initialize('h68BABG5HmxYHT3c56crkxA6UbxcxF5CeAMEoMiP', 'XUtyHttHi3HoemWDQpSs91WDqWzZhrAzcRUtHWZP', 'ifeQKCN2EdEOPEl5mOxuiDCVV3l5EfMHPsUldVXF');
session_start();

?>



<!DOCTYPE html>
<html>
<head>
    <title>Solomon Health Link Portal</title>
    <link rel="stylesheet" href="vendor/foundation-5.4.7/css/foundation.min.css">
</head>
<body>

<div class="row">
    <div class="small-9 columns" style="text-align:center">
        <img src="img/Solomon-Icon-Blue.png" height="100px" width="100px"/>
    </div>
</div>

<div class="row" style="margin-bottom:50px; color: limegreen">
    <?php
    if (!empty($_SESSION['flash_message'])) { ?>
        <div class="small-9 columns" style="text-align:center">
            <?php echo $_SESSION['flash_message']; unset($_SESSION['flash_message']);?>

        </div>
    <?php }
    ?>
</div>

    <form action="index.php" method="POST">
        <div class="row">
            <div class="small-8 columns">
                <div class="row">
                    <div class="small-3 columns">
                        <label for="patientId" class="right inline">Patient</label>
                    </div>
                    <div class="small-9 columns">
                        <select name="patientId">
                            <?php

                            $query = new ParseQuery("_User");
                            $results = $query->find();

                            foreach ($results as $patient) {
                                echo '"<option value="' . $patient->getObjectId() . '">'.$patient->get('Name').'</option>' . PHP_EOL;
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="small-3 columns">
                        <label for="icd9" class="right inline">Diagnosis</label>
                    </div>
                    <div class="small-9 columns">
                        <select name="icd9">
                        <?php

                        $query = new ParseQuery("ICD9");
                        $results = $query->find();
                        print_r($results);

                        foreach ($results as $icd9) {
                            echo '"<option value="' . $icd9->get('code') . '">'.$icd9->get('name').'</option>' . PHP_EOL;
                        }
                        ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="small-3 columns">
                        <label for="comment" class="right inline">Comment</label>
                    </div>
                    <div class="small-9 columns">
                        <textarea placeholder="small-12.columns" id="comment" name="comment"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="small-12 columns">
                        <button type="submit" class="right">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
</html>