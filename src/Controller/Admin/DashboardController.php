<?php

namespace App\Controller\Admin;

use App\Entity\Kviz;
use App\Entity\Odpoved;
use App\Entity\Otazka;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @IsGranted("ROLE_ADMIN")
 */
class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        $routeBuilder = $this->get(AdminUrlGenerator::class);

        return $this->redirect($routeBuilder->setController(KvizCrudController::class)->generateUrl());
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Administrace - Kviz');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToCrud('Kvízy', 'fa fa-address-card', Kviz::class);
        yield MenuItem::linkToCrud('Otázky', 'fa fa-question', Otazka::class);
        yield MenuItem::linkToCrud('Odpovědi', 'fa fa-bullhorn', Odpoved::class);
    }
}
