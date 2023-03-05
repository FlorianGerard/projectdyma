<?php

namespace App\Controller;

use App\Services\MyLog;
use Psr\Container\ContainerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
// #[Route(path:'/blog', name:'blog_')]
class DefaultController extends AbstractController
{

    #[Route('/')]
    public function index(string $adminEmail, ContainerInterface $container)
    {

        $form = $this->createFormBuilder()
            ->add('content', TextType::class)
            ->add('submit', SubmitType::class)
            ->getForm(); 

        // $mylog = $container->get('App\\Services\\MyLog');
        // $mylog->writenLog('machin'); 

        // $this->fs->mkdir('photos');
        // $this->fs->touch('photos/test.txt');
        // $this->fs->appendToFile('photos/test.txt', 'Je suis un poulet au curry');

        // $user = [
        //     'name' => 'Jean',
        //     'email' => 'jean@gmail.com'
        // ];

        // $product = [
        //     'name' => 'Voiture Tesla',
        //     'price' => 50000,
        //     'lastUpdate' => strtotime('yesterday')
        // ];

        // return $this->render('test.html.twig', [
        //     'product' => $product,
        //     'h1' => '<h1>hello</h1>',
        //     'author' => $user
        // ]);

        return $this->render(
            'page1.html.twig',
            [
                'myform' => $form->createView()
            ]
        );

        // return $this->render('@email/email_welcome.html.twig');
        //dd($request);

        // $response = new Response('<h1>Hello World!</h1>'); // réponse html
        // $response = new JsonResponse(['salut' => 'ca va']); // réponse au format JSON change le header content-type
        // return $response;
    }

    // #[
    //     Route(
    //         path: '/{name}',
    //         name: 'blog',
    //         methods: ["GET", "PUT", "DELETE"],
    //         schemes: ["HTTPS"],
    //         defaults: [
    //             'name' => '', // params par défaut si path {name} n'existe pas
    //             'foo' => 'bar'
    //         ],
    //         requirements: [
    //             'name' => '[a-zA-Z]+'
    //         ]
    //     )
    // ]
    // public function blog(Request $request)
    // {

    //     $title = $request->attributes->get('name');
    //     dd($request);
    //     $allRouteParams = $request->attributes->all();
    //     $allParam = $request->attributes->get('_route_params');

    //     return new Response('Blog');
    // }

    // #[
    //     Route(
    //         path: '/homepage',
    //         name: 'homepage',
    //         methods: ["GET"],
    //         schemes: ["HTTPS"],
    //         priority: 1
    //     )
    // ]
    // public function blogHomepage()
    // {
    //     return new Response('blog homepage');

    // }
    #[Route(path: 'about/list/{name}', name: 'about')]
    public function aboutList($name)
    {
        dd($name);
        return $this->render('base.html.twig');
    }
}
