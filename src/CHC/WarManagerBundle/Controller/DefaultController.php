<?php

namespace CHC\WarManagerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('CHCWarManagerBundle:Default:index.html.twig', array('name' => $name));
    }
    
    public function reservationsAction()
    {
        $war_id = 1;
        $war = $this->getDoctrine()
            ->getRepository('CHCWarManagerBundle:War')
            ->find($war_id);
        
        $villages_array = array();
        foreach ($war->getClan()->getVillages() as $village) {
            $villages_array[$village->getId()] = array('id'=>$village->getId(),'name'=>$village->getName());
        }
        
        $free_villages = $villages_array;
        
        $reservations = $war->getReservations();
        
        $reservations_array = array();
        foreach ($reservations as $reservation) {
            $reservations_array[$reservation->getEnemyVillagePosition()] = array('id'=>$reservation->getId(),'village_id'=>$reservation->getClanVillage()->getId(),'name'=>$reservation->getClanVillage()->getName());
            unset($free_villages[$reservation->getClanVillage()->getId()]);
        }
        
        $best_scores_array = array();
        $battles_array = array();
        
        foreach ($war->getBattles() as $battle) {
            $battles_array[$battle->getEnemyVillagePosition()][] = array('id'=>$battle->getId(),
                                                                  'clan_village_name'=>$battle->getClanVillage()->getName(),
                                                                  'score'=>$battle->getScore(),
                    );
            if(!isset($best_scores_array[$battle->getEnemyVillagePosition()])){
                $best_scores_array[$battle->getEnemyVillagePosition()] = 0;
            }
            $best_scores_array[$battle->getEnemyVillagePosition()] = max($battle->getScore(),$best_scores_array[$battle->getEnemyVillagePosition()]);
        }
        
        return $this->render('CHCWarManagerBundle:Default:reservations.html.twig', array(
            'war' => $war,
            'reservations' => $reservations_array,
            'free_villages' => $free_villages,
            'battles_array' => $battles_array,
            'best_scores_array' => $best_scores_array,
                ));
    }
    
    public function reserveAction($enemyPosition)
    {
        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {
            $village_id = $request->request->get('village_id');

        /** @todo Comprobar village_id es del clan y enemy_id es un número válido */
        /** @todo Comprobar enemy_id está disponible */
        /** @todo Comprobar village_id no tiene otras reservas */ 
            
            $war_id = 1;
            $war = $this->getDoctrine()
                ->getRepository('CHCWarManagerBundle:War')
                ->find($war_id);
            
            $village = $this->getDoctrine()
                ->getRepository('CHCWarManagerBundle:Village')
                ->find($village_id);
            
            $reservation = new \CHC\WarManagerBundle\Entity\Reservation();
            $reservation->setWar($war)
                        ->setClanVillage($village)
                        ->setEnemyVillagePosition($enemyPosition);
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($reservation);
            $em->flush();
            
        }
        
        return $this->redirect($this->generateUrl('chc_war_manager_reservations'));
    }
    
    public function unreserveAction($reservation_id)
    {

        /** @todo Comprobar reservation_id es de la guerra activa */

        $reservation = $this->getDoctrine()
            ->getRepository('CHCWarManagerBundle:Reservation')
            ->find($reservation_id);

        $em = $this->getDoctrine()->getManager();
        $em->remove($reservation);
        $em->flush();
    
        
        return $this->redirect($this->generateUrl('chc_war_manager_reservations'));
    }
    
    public function scoreAction($reservation_id, $score)
    {

        /** @todo Comprobar reservation_id es de la guerra activa */

        $reservation = $this->getDoctrine()
            ->getRepository('CHCWarManagerBundle:Reservation')
            ->find($reservation_id);
        
        $battle = new \CHC\WarManagerBundle\Entity\Battle();
        $battle->setWar($reservation->getWar())
                ->setClanVillage($reservation->getClanVillage())
                ->setEnemyVillagePosition($reservation->getEnemyVillagePosition())
                ->setScore($score);

        $em = $this->getDoctrine()->getManager();
        $em->persist($battle);
        $em->remove($reservation);
        $em->flush();
    
        
        return $this->redirect($this->generateUrl('chc_war_manager_reservations'));
    }
    
    public function unscoreAction($battle_id)
    {

        /** @todo Comprobar battle_id es de la guerra activa */

        $battle = $this->getDoctrine()
            ->getRepository('CHCWarManagerBundle:Battle')
            ->find($battle_id);

        $em = $this->getDoctrine()->getManager();
        $em->remove($battle);
        $em->flush();
    
        
        return $this->redirect($this->generateUrl('chc_war_manager_reservations'));
    }
}
