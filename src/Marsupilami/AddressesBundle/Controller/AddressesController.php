<?php

namespace Marsupilami\AddressesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AddressesController extends Controller
{
    public function indexAction($page)
    {
    	if ($page < 1)
    	{
    		throw new NotFoundHttpException('Page "'.$page.'" inexistante.');
    	}
    	$listAddresses = array(
    		array(
    			'nom'		=> 'Toto',
    			'id'		=> 1,
    			'age'		=> '2 ans',
    			'contenu'	=> 'Ami de Marsupilami',
    			'date'		=> new \Datetime()),
    		array(
    			'nom'		=> 'Titi',
    			'id'		=> 2,
    			'age'		=> '3 ans',
    			'content'	=> 'Ami de Marsupilami',
    			'date'		=> new \Datetime()),
    	);
    	
    	return $this->render('MarsupilamiAddressesBundle:Addresses:index.html.twig', array('listAddresses' => $listAddresses));
    }

	public function viewAction($id)
	{
		$addresses = array(
			'nom'		=> 'Toto',
			'id'		=> $id,
			'age'		=> '2 ans',
    		'contenu'	=> 'Ami de Marsupilami',
			'date'		=> new \Datetime()
		);
		
		return $this->render('MarsupilamiAddressesBundle:Addresses:view.html.twig', array('addresses' => $addresses));
	}

	public function addAction(Request $request)
	{
		if ($request->isMethod('POST'))
		{
			$request->getSession()->getFlashBag()->add('ajout', 'Ajout enregistré.');
			return $this->redirectToRoute('marsupilami_addresses_view', array('id' => 5));
		}
		return $this->render('MarsupilamiAddressesBundle:Addresses:add.html.twig');
	}

	public function editAction($id, Request $request)
	{
		if ($request->isMethod('POST'))
		{
			$request->getSession()->getFlashBag()->add('modifier', 'Modifications enregistrées.');

			return $this->redirectToRoute('marsupilami_addresses_view', array('id' => 5));
		}

		$addresses = array(
			'nom'		=> 'Toto',
			'id'		=> $id,
			'age'		=> '2 ans',
			'contenu'	=> 'Ami de Marsupilami',
			'date'		=> new \Datetime()
		);

		return $this->render('MarsupilamiAddressesBundle:Addresses:edit.html.twig', array('addresses' => $addresses));
	}

	public function deleteAction($id)
	{
		return $this->render('MarsupilamiAddressesBundle:Addresses:delete.html.twig');
	}
