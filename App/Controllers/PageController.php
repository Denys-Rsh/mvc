<?php

namespace App\Controllers;

use App\Exceptions\NotFoundException;
use App\Repositories\PageRepository;
use App\Request;
use App\Response;
use App\Views\View;

class PageController extends Controller
{
    private PageRepository $pageRepository;

    public function __construct(array $config, Request $request)
    {
        parent::__construct($config, $request);

        $this->pageRepository = new PageRepository($this->config['pdo']);
    }

    public function index(): Response
    {
        $collection = $this->pageRepository->getAll();

        $view = new View(realpath(PROJECT_DIR . '/App/Views/Page/index.php'), ['collection' => $collection]);

        return new Response($view);
    }

    public function show(): Response
    {
        $page = $this->pageRepository->getFirst((int)$this->request->getQuery('page'));

        if ($page === null) {
            throw new NotFoundException();
        }

        $view = new View(realpath(PROJECT_DIR . '/App/Views/Page/show.php'), ['page' => $page]);

        return new Response($view);
    }
}