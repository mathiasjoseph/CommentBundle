<?php
/**
 * Created by PhpStorm.
 * User: miky
 * Date: 25/10/16
 * Time: 18:27
 */

namespace Miky\Bundle\CommentBundle\Controller\Frontend;


use Miky\Bundle\AdBundle\Entity\Ad;
use Miky\Bundle\CommentBundle\Entity\Comment;
use Miky\Bundle\CommentBundle\Form\Frontend\CommentType;
use Miky\Bundle\UserBundle\Entity\Customer;
use FOS\UserBundle\Model\UserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class UserCommentController extends Controller
{
    public function createAction(Request $request, Ad $ad)
    {
        $customer = $this->getUser();
        if (!is_object($customer) || !$customer instanceof Customer) {
            return $this->redirectToRoute("miky_app_customer_security_login");
        }
        $comment = new Comment();
        $comment->setAuthor($customer);
        $comment->setAd($ad);
        $form = $this->createForm(CommentType::class, $comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $comment = $form->getData();
            $em = $this->get("doctrine.orm.entity_manager");
            $em->persist($comment);
            $em->flush();
            $this->addFlash('success', 'miky.ui.comment_sent');
            return $this->redirectToRoute('miky_app_ad_show', array("ad" => $ad->getId()));
        }

        return $this->redirectToRoute('miky_app_ad_show', array("ad" => $ad->getId()));
    }

    /**
     * @return Response
     *
     * @throws AccessDeniedException
     */
    public function listAction()
    {
        $user = $this->getUser();
        if (!is_object($user) || !$user instanceof Customer) {
            throw $this->createAccessDeniedException('This user does not have access to this section.');
        }
        $em = $this->get("doctrine.orm.entity_manager");
        $comments = $em->getRepository(Comment::class)->findByAuthor($user);

        return $this->render('MikyCommentBundle:Frontend/Comment:list.html.twig', array(
            'comments' => $comments,
        ));
    }

    /**
     * @return Response
     *
     * @throws AccessDeniedException
     */
    public function removeAction(Comment $comment)
    {
        $user = $this->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw $this->createAccessDeniedException('This user does not have access to this section.');
        }
        $em = $this->get("doctrine.orm.entity_manager");
        if ($comment->getAuthor()->getId() == $user->getId()) {
            $em->remove($comment);
            $em->flush();
        }
        if ($comment->getAd()->getPostedBy() != null) {
            if ($comment->getAd()->getPostedBy()->getId() == $user->getId()) {
                $em->remove($comment);
                $em->flush();
            }
        }
        return $this->redirectToRoute("miky_app_ad_show", array("ad" => $comment->getAd()->getId()));
    }


    /**
     * @return Response
     *
     * @throws AccessDeniedException
     */
    public function removeByCensureAction(Comment $comment)
    {
        $user = $this->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw $this->createAccessDeniedException('This user does not have access to this section.');
        }
        if ($comment->getAd()->get)
            return $this->render('SonataUserBundle:Comment:list.html.twig', array(
                'user' => $user,
                'blocks' => $this->container->getParameter('sonata.user.configuration.profile_blocks'),
            ));
    }

}