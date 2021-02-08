<?php

namespace App\Controller;

use App\Classe\Cart;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CartController extends AbstractController
{
    /**
     * @Route("/panier", name="cart")
     */
    public function index(Cart $cart): Response
    {
        dd($cart->get());
        return $this->render('cart/index.html.twig');
    }

    /**
     * @Route("/cart/add/{id}", name="add-to-cart")
     */
    public function add(Cart $cart,$id): Response
    {
        $cart->add($id);
        return $this->redirectToRoute('cart');
    }

    /**
     * @Route("/cart/remove", name="remove-my-cart")
     */
    public function remove(Cart $cart): Response
    {
        $cart->remove();
        return $this->redirectToRoute('products');
    }
}
