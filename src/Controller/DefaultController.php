<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Psr\Log\LoggerInterface;
use App\GreetingGenerator;

class DefaultController extends AbstractController
{
    /**
     * @Route("/hello/{name}")
     */
     public function index($name, LoggerInterface $logger, GreetingGenerator $generator)
    {
        $greeting = $generator->getRandomGreeting();

        $mess = "Saying $greeting to $name!";

        return $this->render('default/index.html.twig', ['name' => $name, 'greeting' =>  $mess,]);
    }
    /**
 * @Route("/api/hello/{name}")
 */
public function apiExample($name)
{
    return $this->json([
        'name' => $name,
        'symfony' => 'rocks',
    ]);
}
}