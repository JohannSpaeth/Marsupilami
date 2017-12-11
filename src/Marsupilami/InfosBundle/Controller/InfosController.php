<?php

namespace Marsupilami\InfosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class InfosController extends Controller
{
    public function indexAction($page)
    {
    	if ($page < 1)
    	{
    		throw new NotFoundHttpException('Page "'.$page.'" inexistante.');
    	}
    	
    	return $this->render('MarsupilamiInfosBundle:Infos:index.html.twig', array('infos' => $infos));
    }

	public function viewAction($id)
	{
		$infos = array(
			'nom'		=> 'Marsupilami',
			'id'		=> $id,
			'age'		=> '64 ans',
			'race'		=> 'Marsupilamus fantasii',
			'famille'	=> 'Marsupilamus'
			'nourriture'=> 'fruits, piranhas, fourmis'
			'date'		=> new \Datetime()
		);
		
		return $this->render('MarsupilamiInfosBundle:Infos:view.html.twig', array('infos' => $infos));
	}

	public function addAction(Request $request)
	{
		if ($request->isMethod('POST'))
		{
			$request->getSession()->getFlashBag()->add('ajout', 'Ajout enregistré.');
			return $this->redirectToRoute('marsupilami_infos_view', array('id' => 5));
		}
		return $this->render('MarsupilamiInfosBundle:Infos:add.html.twig');
	}

	public function editAction($id, Request $request)
	{
		if ($request->isMethod('POST'))
		{
			$request->getSession()->getFlashBag()->add('modifier', 'Informations modifiées.');

			return $this->redirectToRoute('marsupilami_infos_view', array('id' => 5));
		}

		$infos = array(
			'nom'		=> 'Marsupilami',
			'id'		=> $id,
			'age'		=> '64 ans',
			'race'		=> 'Marsupilamus fantasii',
			'famille'	=> 'Marsupilamus'
			'nourriture'=> 'fruits, piranhas, fourmis'
			'date'		=> new \Datetime()
		);

		return $this->render('MarsupilamiInfosBundle:Infos:edit.html.twig', array('advert' => $advert));
	}

	public function deleteAction($id)
	{
		return $this->render('MarsupilamiInfosBundle:Infos:delete.html.twig');
	}
