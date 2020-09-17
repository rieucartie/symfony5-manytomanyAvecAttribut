<?php

namespace App\Entity;

use App\Repository\ArticleCompetenceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArticleCompetenceRepository::class)
 */
class ArticleCompetence
{
   

    /**
	 * @ORM\Id
     * @ORM\ManyToOne(targetEntity=Article::class, inversedBy="articleCompetences")
     * @ORM\JoinColumn(nullable=false)
     */
    private $article;

    /**
	 * @ORM\Id
     * @ORM\ManyToOne(targetEntity=competence::class, inversedBy="articleCompetences")
     * @ORM\JoinColumn(nullable=false)
     */
    private $competence;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $niveau;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArticle(): ?Article
    {
        return $this->article;
    }

    public function setArticle(?Article $article): self
    {
        $this->article = $article;

        return $this;
    }

    public function getCompetence(): ?competence
    {
        return $this->competence;
    }

    public function setCompetence(?competence $competence): self
    {
        $this->competence = $competence;

        return $this;
    }

    public function getNiveau(): ?string
    {
        return $this->niveau;
    }

    public function setNiveau(string $niveau): self
    {
        $this->niveau = $niveau;

        return $this;
    }
}
