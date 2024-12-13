<?php
namespace POO\Level2\Stage2;

/*  Intro

    En tant que conducteur, vous n'avez pas besoin de tout connaître de votre voiture.
    Vous avez unqiuement besoin d'accéder à un certain nombre de fonctionnalités.
    Tourner, accélérer, freiner, changer de vitesse, voir le niveau d'essence, d'huile...
    Ce sont des fonctionnalités auxquelles vous devez accéder.
    Comment fonctionne le système de freinage, un moteur à explosion, un radiateur...
    Ce sont des choses que le constructeur maîtrise mais que vous n'avez pas besoin de
    connaître pour conduire. Et si jamais il faut changer le moteur, une roue, le liquide
    de frein... cela se fera bien heureusement sans changer quoi que ce soit à la façon
    de conduire le véhicule.

    En POO, l'encapsulation ne dit pas autre chose. Quand on est utilisateur d'un objet on
    n'a pas besoin de tout connaître de ses "entrailles". Celui qui a écrit la classe oui, tous
    ceux qui vont s'en servir non. L'utilisation d'un objet se fait à travers les méthodes
    publiques disponibles. D'une part cela permet de masquer la complexité interne de l'objet
    que l'on a pas besoin de connaître. D'autre part, cela permet aussi de modifier les "entrailles"
    de l'objet sans impacter les codes qui l'utilise.
*/



/*  Q1 : Une classe s'accompagne toujours d'un constructeur

    Lorsque l'on définit une classe, il est hautement recommandé de définir un constructeur.
    Un construteur est une fonction appelée à chaque fois que l'on instancie (crée) un nouvel objet.
    Cela permet de contrôler l'initialisation des propriétés de l'objet.

    Ajoutez à la classe Amiibo un constructeur qui initialise chaque propriété de type string à une
    chaine vide et le prix à 0.0
*/




/*  Q2 : Un constructeur peut avoir des paramètres. Et c'est pratique.

    Un constructeur peut avoir des paramètres afin de permettre à l'utilisateur de la classe de créer
    des objets en précisant certaines valeurs.

    Ajoutez 2 paramètres à votre constructeur, un pour donner un nom à votre amiibo, un deuxième pour
    préciser sa compatibilité.
*/

/*  Q3 : Modifier les "entrailles" d'un objet doit rester neutre pour le code qui l'utilise (1)

    Comme déjà évoqué, title et subtitle ne sont pas des noms très appropriés.
    name et compatibility seraientt plus cohérents. Faites la modification et vérifiez si votre
    code fonctionne toujours. Sinon faites les modifications nécessaires.
*/

/*  Q3 bis : Modifier les "entrailles" d'un objet doit rester neutre pour le code qui l'utilise (2)

    Toutes les propriétés de la classe Amiibo sont "public". Ce qui veut dire qu'elles sont accéssibles
    par tout utilisateur de la classe. Les "entrailles" des Amiibos ne sont donc pas masquées mais
    totalement exposées. Changez cela en passant toutes les propriétés "private".
    Votre code fonctionne-t-il encore ? Ne corrigez-pas si ce n'est pas le cas.
*/

/*  Q4 : getters et setters

    Ajoutez des méthodes getters pour toutes les propriétés et des méthodes setters sauf pour
    name et compatibility (puisque ces valeurs sont définies à l'instanciation).
    C'est un peu répétitif à faire mais vous trouverez des extensions VS Code pour vous faciliter la vie.

    Mettez ensuite à jour index.php pour rétablir le fonctionnement de votre code.
*/

/*  Q5 : Une méthode "getter" permet plus qu'une simple "lecture" brute de la valeur d'une propriété

    On vous informe que les prix que l'on vous a transmis sont en fait des prix hors taxe.
    Modifiez la méthode getPrice afin de retourner la valeur de la propriété price majorée de 20%.
    Vous pouvez utiliser la fonction php round pour arrondir le résultat à 2 chiffres àprès la virgule.
*/

/*  Q6 : Une méthode "setter" permet plus qu'une simple "écriture" directe de la valeur d'une propriété

    On vous informe que les seules images supportées sont des png ou jpg (ou jpeg).
    Modifiez la méthode setImage afin de modifier la propriété image seulement si l'url données en 
    paramètre se termine par png, jpg ou jpeg.
    Quelques fonctions php peuvent vous faciliter la tâche comme par exemple explode et array_pop.
*/

class Amiibo
{
    private string $name;
    private string $compatibility;
    private string $description;
    private float $price;
    private string $image;

    public function __construct(string $name, string $compatibility){
        $this->name = $name;
        $this->compatibility = $compatibility;
        $this->description = '';
        $this->price = 0.0;
        $this->image = '';
    }

    public function getName() : string {
        return $this->name;
    }

    public function getManufacturer() : string {
        return $this->compatibility;
    }

    public function getDescription() : string {
        return $this->description;
    }

    public function getPrice() : float {
        //return $this->price;
        return round($this->price*1.2, 2);
    }

    public function getImage() : string {
        return $this->image;
    }

    // public function setName($name){
    //     $this->name = $name;
    // }

    // public function setManufacturer($compatibility){
    //     $this->compatibility = $compatibility;
    // }

    public function setDescription($description) : self{
        $this->description = $description;
        return $this;
    }

    public function setPrice($price) : self {
        $this->price = $price;
        return $this;
    }

    public function setImage($image): self {
        $ext=explode(".", $image);
        $ext=array_pop($ext);
        $ext=strtolower($ext);

        if ($ext == 'png' || $ext == 'jpg' || $ext == 'jpeg') {
            $this->image = $image;
        }
        return $this;
    }
}



$archer = new Amiibo("link [Archer]", "Switch and Switch Lite");
// $archer->name = "Link [Archer]";
// $archer->compatibility = "Switch and Switch Lite";
// $archer->description = "Cette flèche archéonique vous emmènera loin ! Découvrez
//         vite les avantages de cet amiibo compatible avec de multiples jeux";
// $archer->price = 58.25;
// $archer->image = "./asset/amiibo-link-archer_2x.png";

//getters and setters

$archer -> setDescription("cette flèche archéonique vous emmènera loin ! Découvrez
        vite les avantages de cet amiibo compatible avec de multiples jeux")
        -> setPrice(58.25)
        -> setImage("./asset/amiibo-link-archer_2x.png");


$zelda = new Amiibo("Zelda", "Switch, Wii U, Nintendo DS");
// $zelda->name = "Zelda";
// $zelda->compatibility = "Switch, Wii U, Nintendo DS";
// $zelda->description = "Ne sous-estimez pas la princesse Zelda ! Découvrez
//         vite les avantages de cet amiibo compatible avec de multiples jeux";
// $zelda->price = 62.41;
// $zelda->image = "./asset/amiibo-zelda_2x.png";
$zelda -> setDescription("Ne sous-estimez pas la princesse Zelda ! Découvrez
        vite les avantages de cet amiibo compatible avec de multiples jeux")
         -> setPrice(62.41)
         -> setImage("./asset/amiibo-zelda_2x.png");

$rider = new Amiibo("Link [Rider]", "Wii U, Switch, Switch Lite");
// $rider->name = "Link [Rider]";
// $rider->compatibility = "Wii U, Switch, Switch Lite";
// $rider->description = "Il y a des chevaux et puis il y a Epona ! Découvrez vite
//         les avantages de cet amiibo compatible avec de multiples jeux";
// $rider->price = 54.08;
// $rider->image = "./asset/amiibo-link-rider_2x.png";
$rider -> setDescription("Il y a des chevaux et puis il y a Epona ! Découvrez vite
        les avantages de cet amiibo compatible avec de multiples jeux")
        -> setPrice(54.08)
        -> setImage("./asset/amiibo-link-rider_2x.png");

$data = [$archer, $zelda, $rider];

/*  BILAN

    Beaucoup de choses dans cette étape :

    . Une classe s'accompagne toujours d'un constructeur pour maîtriser l'instanciation d'un objet.
      C'est aussi une façon d'obliger la définition de certaines informations. Dans notre exemple, on
      ne peut pas créer d'objet Amiibo sans lui donner un nom et préciser sa compatibilité.

    . Les propriétés d'une classe sont en générale privées afin d'éviter qu'un utilisateur de la classe
      interfère directement avec la représentation interne des objets (et ne casse tout...). Protéger
      de la sorte la représentation interne d'un objet est partie intégrante du concept d'encapsulation.

    . Pour permettre quand même à un utilisateur d'une classe de lire ou modifier certaines données, on
      définit des méthodes que l'on appelle des getters (lecture) et des setters (écriture). Mais :

         -> L'utilisation de setters permet de contrôler qu'une modification/écriture est bien valide.
            Par exemple la méthode setImage n'autorise que des images d'extensions png, jpg ou jpeg.

         -> L'utilisation de getters permet éventuellement d'appliquer un traitement à la propriété
            demandée. Par exemple la méthode getPrice nous permet de renvoyer le prix avec TVA alors
            que la propriété price stocke le prix hors taxe.

         -> Le choix des setters/getters permet de contrôler ce qui est modifiable ou non. Dans notre
            classe Amiibo, nous n'avons pas défini de setters pour les propriétés name et
            compatibility. Ce faisant, une fois un objet Amiibo créé, ses propriétés name et compatibility
            ne peuvent plus être modifiées.
    
     . Enfin la manipulation d'un objet par ses méthodes (getters/setters ou autre) est une bonne manière
       de dissocier la représentation interne de l'objet (ses propriétés) de son utilisation externe. Si
       l'on a besoin de modifier la représentation interne de l'objet, tant que la signature de ses méthodes
       ne change pas, cela n'impactera pas le reste du code. A présent, je peux par exemple changer le nom
       d'une propriété sans que cela fasse planter le formatage de mon template. Sous réserve de mettre à jour
       le getter correspondant bien sûr, mais seule la classe est à modifier, pas le reste de mon code.

    A présent pour voir si vous avez bien digéré tout cela, vous allez dans la prochaine étape créer une
    nouvelle classe. Car en plus des Amiibos, on va aussi vendre des Tshirts.

    */