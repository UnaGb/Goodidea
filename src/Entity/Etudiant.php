<?php

namespace App\Entity;

use App\Repository\EtudiantRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EtudiantRepository::class)
 */
class Etudiant extends  Personne
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=12)
     */
    private $numMat;

    public function getId(): ?int
    {
        return $this->id;
    }



    public function getNumMat(): ?string
    {
        return $this->numMat;
    }

    public function setNumMat(string $numMat): self
    {
        $this->numMat = $numMat;

        return $this;
    }
}
