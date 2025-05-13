<?php

namespace App\Controller;

use App\Form\TodoType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
// #[Route(path:'/blog', name:'blog_')]

class DefaultController extends AbstractController
{

    // Cours 8.49 Utiliser des objets avec les formulaires

    function __construct() {}

    #[Route('/', name: 'index')]
    public function index(Request $request, RequestStack $rs)
    {


        // dump($session);
        //$session->set('myvar', 123);
        // dump($session->get('myvar'));
        // dump($session->get('test', 'ola'));
        // dd($session);
        $todo = new Todo(['techno'], 'Je suis une todo');

        $form = $this->createForm(TodoType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->addFlash('success', 'Vous avez ajouté une todo');
            $this->addFlash('info', 'Info');
            $this->addFlash('success', 'Vous avez ajouté une todo3');
        }

        return $this->render('page1.html.twig', [
            'myform' => $form->createView()
        ]);
    }
}


class Todo
{
    function  __construct(
        #[Assert\Choice(
            choices: ['techno', 'nature'],
            message: 'mauvaise valeur',
            multiple: true,
            multipleMessage: 'une des valeurs n\'est pas valide',
        )]
        public array $type,
        #[Assert\Email(message: 'Adresse email non valide')]
        #[Assert\NotBlank(message: 'Je ne peux pas être vide')]
        #[Assert\Length(
            min: 5,
            max: 20,
            minMessage: 'Trop court',
            maxMessage: 'Trop long'
        )]
        public ?string $content,

        public bool $done = false
    ) {}
}
