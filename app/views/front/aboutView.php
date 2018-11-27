<?php $title = 'Page index'; ?>

<?php ob_start(); ?>

        <h1 class="h1">A PROPOS</h1>
        
        <div class="lignesoush1">
            <div class="rondh1bleu left"></div>
            <div class="rondh1bleu right"></div>
            <div class="rondh1bleu topRight"></div>
            <div class="rondh1bleu topLeft"></div>
        </div>

    <section id="apropos">

        <img id="imageJeanF" src="../app/images/JF.jpg" alt="">

        <div>
            <h2>Auteur | Ecrivain</h2>
            <p>
                Il naît à Bordeaux le 24 Mars 1962. D'abords inspiré par le théatre, il suivi des cours à 12 ans, il veut devenir acteur. 
                Encouragé par son professeur, il est rapidement remarqué par une compagnie de théatre. 
                Mais à 14 ans, il écrit, dans le cadre d'un travail scolaire, l'histoire d'un oisillons tombé du nid, ce qui lui inspira une nouvelle voie : dès l’âge de 15 ans,  
                il fait ses premières armes en écrivant des histoires pour un fanzine, mais aussi tout au long de sa scolarité il se consacre à la lecture ainsi qu’à 
                l’écriture en montant un journal pour son lycée. Après son bac, il commence l’écriture de Milwoo. Après ses études en psychologie social à Bordeaux. 
                Il se passionne pour les voyages, et commence un voyage au Pérou, puis en Inde. De ces années lui vient son goût pour la récit d'aventure, 
                qu’il mêle avec ses thèmes favoris, des animaux à la mort jusqu’aux origines de l’humanité. Jean Forteroche publie son premier roman, Milwoo le chien errant, 
                en février 1991. Ses œuvres ont été traduites en vinght-cinq langues. Avec 5 millions d’exemplaires vendus dans le monde, Jean Forteroche est l'un des auteurs 
                français contemporains les plus lus en france. 
            </p>

            <p>
                Après le succès de son roman, le fou de lasco, il décide de se rediriger vers sa voie initial et commença des petits rôles dans des séries TV notamment dans 
                "Encore eux ?" une série qui vise à montrer le côté hypocrite de notre société. Jean Forteroche fini par décrocher le rôle principal dans "Fais moi danser" 
                avec Sarah Bouranvier. Ce film rencontrera un franc succès auprès des téléspectateurs, il sera à la suite de ça reconnu comme un acteur avéré. 
                Depuis Peu il souhaite se remettre à l'écriture d'une manière plutôt différente, associant nouvelles technologies il entreprend la création d'un blog dans lequel 
                il rédigera en plusieurs épisodes "Un billet simple pour l'Alaska".
            </p>
        </div>

    </section>

<?php $content = ob_get_clean(); ?>

<?php require('../app/views/front/templates/default.php');?>