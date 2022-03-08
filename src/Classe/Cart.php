<?php

namespace App\Classe;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RequestStack;

class Cart
{
    private $session;
    private $entityManager;

    public function __construct(RequestStack $session, EntityManagerInterface $entityManager)
    {
        $this->session = $session->getSession();
        $this->entityManager = $entityManager;
    }
//ADD
    public function add($id)
    {
        $cart = $this->session->get('cart', []);
        if (!empty($cart[$id]))
        {
            $cart[$id]++;
        }else{
            $cart[$id] = 1;
        }

        $this->session->set('cart', $cart);
    }
//GET
    public function get()
    {
        return $this->session->get('cart');
    }

//REMOVE
    public function remove()
    {
        return $this->session->remove('cart');
    }
//DELETE
    public function delete($id)
    {
        $cart = $this->session->get('cart',[]);

        unset($cart[$id]);

        return $this->session->set('cart', $cart);
    }
//DECREASE
    public function decrease($id)
    {
        $cart = $this->session->get('cart', []);

        if ($cart[$id] > 1) {
            $cart[$id]--;
        }else{
            unset($cart[$id]);
        }
        return $this->session->set('cart', $cart);
    }

    public function getFull(){
        $cartComplete = [];

        if($this->get()){
            foreach ($this->get() as $id => $quantity) {
                $product_object = $this->entityManager->getRepository(Product::class)->findOneById($id);
                if (!$product_object){
                    $this->delete($id);
                    continue;
                }
                $cartComplete[] = [
                    'product' =>  $product_object,
                    'quantity' => $quantity
                ];
            }
        }
        return $cartComplete;
    }

}