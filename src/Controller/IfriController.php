<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IfriController extends AbstractController
{
    /**
     * @Route("/ifri", name="ifri")
     */
    public function index(): Response
    {
       /** return $this->json([
            'nom' => 'Anianou gbo',
            'prenom' => 'Adolphe',
            'age' => 31,
            'email'=>'adolphe.anianougbo@gmail.com',
            'num_tel'=>'60417129'
        ]);*/

    $titre = "Bienvenue à IFRI";

    $contenu = "Nous bâtissons l'excellence... Notre ambition n'a jamais changé depuis 6 ans";

    return $this->render('test/ifri.html.twig',[
        'titre' => $titre,
        'contenu' => $contenu
    ]);

    }

    /**
     * @Route("/", name="home_action")
     */
    public function home(): Response
    {
        //dd($this->getUser());
        $titre = "Bienvenue à Ifri Collab";

        $contenu = "Trouvez  sur Ifri Collab  des  collaborateurs engagés qui correspondent à la fois au profil recherché,
         et à l'esprit de votre projet";

        return $this->render("test/home.html.twig",[
            'titre' => $titre,
            'contenu' => $contenu
        ]);
    }

    /**
     * @Route("/dashboard", name="admin_dash")
     */
    public function adminDashboard(): Response
    {
        $titre = "Bienvenue Cher administateur";

        $contenu = "Vous vous trouvez dans l'espace administration et vous êtes le seul à y avoir accès";

        return $this->render("test/admin_dash.html.twig",[
            'titre' => $titre,
            'contenu' => $contenu
        ]);
    }


    /**
     * @Route("/about", name="about_action")
     */
    public function about(): Response
    {
        //dd($this->getUser());
        $titre = "Ifri Collab , Qu'est ce que c'est ?";

        $contenu = "Trouvez  sur Ifri Collab  des  collaborateurs engagés qui correspondent à la fois au profil recherché,
         et à l'esprit de votre projet";

        return $this->render("test/about.html.twig",[
            'titre' => $titre,
            'contenu' => $contenu
        ]);
    }

    
    /**
     * @Route("/faq", name="faq_action")
     */
    public function faq(): Response
    {
        //dd($this->getUser());
        $titre = "Vous avez des préoccupations?";

        $contenu = "Trouvez  sur Ifri Collab  des  collaborateurs engagés qui correspondent à la fois au profil recherché,
         et à l'esprit de votre projet";

        return $this->render("test/faq.html.twig",[
            'titre' => $titre,
            'contenu' => $contenu
        ]);
    }

     /**
     * @Route("/post", name="post_action")
     */
    public function post(): Response
    {
        //dd($this->getUser());
        $titre = "Hello , Faites un post pour recherchez des talents pour votre projet";

        $contenu = "Trouvez  sur Ifri Collab  des  collaborateurs engagés qui correspondent à la fois au profil recherché,
         et à l'esprit de votre projet";

        return $this->render("test/post.html.twig",[
            'titre' => $titre,
            'contenu' => $contenu
        ]);
    }
}
