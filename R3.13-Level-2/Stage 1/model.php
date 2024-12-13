<?php

namespace POO\Level2\Stage1;

/*  Q1

    Il faut toujours retrouver notre visuel (./asset/objectif.png)
    Créer une classe Amiibo permettant de rendre le code ci-dessous cohérent et fonctionnel.
*/

// ???
class Amiibo {
    public $title;
    public $subtitle;
    public $description;
    public $price;
    public $image;
}

$archer = new Amiibo();
$archer->title = "Link [Archer]";
$archer->subtitle = "Switch and Switch Lite";
$archer->description = "Cette flèche archéonique vous emmènera loin ! Découvrez
        vite les avantages de cet amiibo compatible avec de multiples jeux";
$archer->price = 58.25;
$archer->image = "./asset/amiibo-link-archer_2x.png";

$zelda = new Amiibo();
$zelda->title = "Zelda";
$zelda->subtitle = "Switch, Wii U, Nintendo DS";
$zelda->description = "Ne sous-estimez pas la princesse Zelda ! Découvrez
        vite les avantages de cet amiibo compatible avec de multiples jeux";
$zelda->price = 62.41;
$zelda->image = "./asset/amiibo-zelda_2x.png";

$rider = new Amiibo();
$rider->title = "Link [Rider]";
$rider->subtitle = "Wii U, Switch, Switch Lite";
$rider->description = "Il y a des chevaux et puis il y a Epona ! Découvrez vite
        les avantages de cet amiibo compatible avec de multiples jeux";
$rider->price = 54.08;
$rider->image = "./asset/amiibo-link-rider_2x.png";

/*  $data is an array of Amiibo objects (at last)*/
$data = [$archer, $zelda, $rider];



/*  BILAN

    L'introduction de la classe Amiibo (encore très incomplète) a un premier mérite :
    Il est explicite dans le code que $archer, $zelda et $rider sont des Amiibos.
    Plus exactement, des instances de la classe Amiibo ou plus simplement des objets de type Amiibo.
    L'instruction PHP ($zelda instanceof Amiibo) vaudrait true.

    Donc par rapport aux précédentes étapes, on a progressé :

        . Les propriétés d'un Amiibo sont bien encapsulées dans un objet
        . Et cet objet n'est pas générique, il est de type Amiibo, identifiable par la machine.

    Un défaut demeure, signalé précédemment : la corrélation entre les tags du template et les propriétés
    des objets Amiibo. Il y a très très peu de chances pour que l'on puisse souvent se permettre ça.
    D'ailleurs, c'est un peu étrange que le nom et la compatibilité d'un Amiibo correspondent respectivement
    aux propriétés title et subtitle non ? Et si vous les renommiez name et compatibility pour voir ?
    Ca marche encore ?

    Il est temps de pousser un peu plus loin le concept d'encapsulation.

*/