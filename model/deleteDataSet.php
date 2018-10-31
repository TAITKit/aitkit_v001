<?php

include('../cfg/cfg.inc.php');
include('../cls/meekrodb.cls.php');
include('../cls/Praetor.cls.php');
            $praetor = new Praetor();
            $where = new WhereClause('and'); // create a WHERE statement of pieces joined by ANDs
            $where->add('algorithmID=%s', $_POST['AID']);
            $where->add('no=%d', $_POST['numberValue']);
            $praetor->custodelete('dataset', "%l", $where);
?>