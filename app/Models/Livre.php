 <?php


class Livre {

    private int $id = 0;
    private string $titre;
    private string $description_courte;
    private string $description = "";
    private string $date_de_publication = "";
    private int $quantite = 0;
    private string $cover = "";
    private array $tags = [];
    private Categorie $categorie;
    private string $auteur = "";
    private array $reservations = [];



    public function __construct(){}

    public static function instancewithTitreAndDescriptionCourt(string $titre,string $description_courte)
    {
        $instance = new self();

        $instance->titre=$titre;
        $instance->description_courte=$description_courte;

        return $instance;

    }

    

    public function setId(int $id): void 
    {
        $this->id = $id;
    }
    public function setTitre(string $titre): void{
        $this->titre = $titre;
    }

    public function setDescriptionCourte(string $description_courte): void
    {
        $this->description_courte = $description_courte;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function setDateDePublication (string $date): void 
    {
        $this->date_de_publication = $date;

    }
    public function setQuantite(int $quantite): void {
        $this->quantite = $quantite;
    }

    public function setCover(string $cover): void 
    {
        $this->cover = $cover;
    }
    public function setTag(array $tags): void 
    {
        $this->tags = $tags;
    }
    public function setCategorie(Categorie $categorie): void 
    {
        $this->categorie = $categorie;
    }
    public function setAuteur(string $auteur): void 
    {
        $this->auteur = $auteur;
    }
    public function setReservation(array $reservations): void 
    {
        $this->reservations = $reservations;
    }

    public function getId(): int 
    {
        return $this->id;
    }
    public function getTitre(): string 
    {
        return $this->titre;
    }
    public function getDescriptionCourte(): string 
    {
        return $this->description_courte;
    }
    public function getDescription(): string 
    {
        return $this->description;
    }
    public function getDateDePublication(): string 
    {
        return $this->date_de_publication;
    }
    public function getQuantite(): int 
    {
        return $this->quantite;
    }
    public function getCover(): string 
    {
        return $this->cover;
    }
    public function getTags(): array 
    {
        return $this->tags;
    }
    public function getCategorie(): Categorie 
    {
        return $this->categorie;
    }
    public function getAuteur(): string 
    {
        return $this->auteur;
    }
    public function getReservations(): array 
    {
        return $this->reservations;
    }



    public function __toString()
    {

        return "(Livre) => id : " .$this->id. " , titre : " 
        .$this->titre. " , description courte : " .$this->description_courte. " , description: "
        .$this->description. " , date de publication: " .$this->date_de_publication. 
        " , quantite: " .$this->quantite. " , cover: " .$this->cover. " , tags: " . implode(" , ", $this->tags) . " , categorie: " .$this->categorie. " , auteur: " 
        .$this->auteur . " , reservations: " . implode(",", $this->reservations) . ".";
    }

}