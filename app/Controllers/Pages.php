<?php

namespace App\Controllers;

use CodeIgniter\Exceptions\PageNotFoundException;

class Pages extends BaseController
{
    private array $projects;

    public function __construct()
    {
        $this->projects = require APPPATH . 'Data/projects.php';
    }

    public function index(): string
    {
        return view('pages/home', [
            'projects'    => $this->projects,
            'title'       => 'Rizki Dwi S — Creative Developer',
            'description' => 'Creative Developer from Indonesia. Software, design, and brand identity — built with intention.',
        ]);
    }

    public function project(string $slug): string
    {
        if (! isset($this->projects[$slug])) {
            throw PageNotFoundException::forPageNotFound();
        }

        $project = $this->projects[$slug];
        $next    = $this->projects[$project['next']] ?? null;

        return view('pages/project', [
            'project'     => $project,
            'slug'        => $slug,
            'nextSlug'    => $project['next'],
            'next'        => $next,
            'title'       => $project['title'] . ' — Rizki Dwi Setyanto',
            'description' => $project['tagline'],
        ]);
    }

    public function sitemap(): \CodeIgniter\HTTP\ResponseInterface
    {
        $urls = [base_url()];
        foreach (array_keys($this->projects) as $slug) {
            $urls[] = base_url('work/' . $slug);
        }

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
        foreach ($urls as $url) {
            $xml .= '  <url><loc>' . $url . '</loc></url>' . "\n";
        }
        $xml .= '</urlset>';

        return $this->response
            ->setContentType('application/xml')
            ->setBody($xml);
    }
}
