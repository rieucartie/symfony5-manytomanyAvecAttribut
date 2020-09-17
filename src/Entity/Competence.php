<?php

namespace App\Entity;

use App\Repository\CompetenceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CompetenceRepository::class)
 */
class Competence
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\OneToMany(targetEntity=ArticleCompetence::class, mappedBy="competence")
     */
    private $articleCompetences;

    public function __construct()
    {
        $this->articleCompetences = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection|ArticleCompetence[]
     */
    public function getArticleCompetences(): Collection
    {
        return $this->articleCompetences;
    }

    public function addArticleCompetence(ArticleCompetence $articleCompetence): self
    {
        if (!$this->articleCompetences->contains($articleCompetence)) {
            $this->articleCompetences[] = $articleCompetence;
            $articleCompetence->setCompetence($this);
        }

        return $this;
    }

    public function removeArticleCompetence(ArticleCompetence $articleCompetence): self
    {
        if ($this->articleCompetences->contains($articleCompetence)) {
            $this->articleCompetences->removeElement($articleCompetence);
            // set the owning side to null (unless already changed)
            if ($articleCompetence->getCompetence() === $this) {
                $articleCompetence->setCompetence(null);
            }
        }

        return $this;
    }
}
