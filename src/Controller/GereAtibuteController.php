<?php
namespace App\Controller;
use App\Entity\Article;
use App\Entity\Competence;
use App\Entity\ArticleCompetence;
use App\Repository\CompetenceRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
class GereAtibuteController extends AbstractController
{
	/**
     * @Route("/gere/atibute", name="gere_atibute")
     */
	 public function Ajouter( CompetenceRepository $repo)
  {
    // On récupére l'EntityManager
    $em = $this->getDoctrine()
               ->getManager();
    // Création de l'entité Article
    $article = new Article();
    $article->setName('Biologie');
   // Dans ce cas, on doit créer effectivement l'article en bdd pour lui assigner un id
    // On doit faire cela pour pouvoir enregistrer les ArticleCompetence par la suite
    $em->persist($article);
    $em->flush(); // Maintenant, $article a un id défini
    // Les compétences existent déjà, on les récupère depuis la bdd
$liste_competences = $repo->findAll(); 
 // Pour chaque compétence
 foreach($liste_competences as $i => $competence)
 {
   // On crée une nouvelle « relation entre 1 article et 1 compétence »
   $articleCompetence[$i] = new ArticleCompetence;
   // On la lie à l'article, qui est ici toujours le même
   $articleCompetence[$i]->setArticle($article);
   // On la lie à la compétence, qui change ici dans la boucle foreach
   $articleCompetence[$i]->setCompetence($competence);
   // Arbitrairement, on dit que chaque compétence est requise au niveau 'Expert'
   $articleCompetence[$i]->setNiveau('Expert');
   // Et bien sûr, on persiste cette entité de relation, propriétaire des deux autres relations
   $em->persist($articleCompetence[$i]);
 }
 // On déclenche l'enregistrement
 $em->flush();
    // … reste de la méthode
	return $this->render('gere_atibute/index.html.twig', [
        ]);
  }
}
