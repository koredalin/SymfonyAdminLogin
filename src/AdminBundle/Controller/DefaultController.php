<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/index", name="admin_index")
     */
    public function indexAction()
    {
        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            throw $this->createAccessDeniedException();
        }

        // the above is a shortcut for this
        $user = $this->get('security.token_storage')->getToken()->getUser();
        
        return $this->render('AdminBundle:Default:index.html.twig', array('user' => $user));
    }
}
