<?php

function ajouter_xxx()
{
    $valeurs_par_defaut_des_champs = [];

    if (is_post()) {
        recup_valeur_en_post();
        if (tout_est_ok()) {
            sauvegarder();
            rediriger_vers_resultat();
        }
    }

    afficher_formulaire();
}