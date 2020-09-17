<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArticleRepository::class)
 */
class Article
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
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=ArticleCompetence::class, mappedBy="article")
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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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
            $articleCompetence->setArticle($this);
        }

        return $this;
    }

    public function removeArticleCompetence(ArticleCompetence $articleCompetence): self
    {
        if ($this->articleCompetences->contains($articleCompetence)) {
            $this->articleCompetences->removeElement($articleCompetence);
            // set the owning side to null (unless already changed)
            if ($articleCompetence->getArticle() === $this) {
                $articleCompetence->setArticle(null);
            }
        }

        return $this;
    }
}
