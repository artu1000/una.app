<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;

class AccountController extends Controller
{

    /**
     * Create a new home controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return $this
     */
    public function index(){

        // SEO Meta settings
        $this->seoMeta['page_title'] = 'Espace Membre';
        $this->seoMeta['meta_desc'] = 'Vous êtes sur l\'espace membre du club Université Nantes Aviron (UNA).';
        $this->seoMeta['meta_keywords'] = 'club, universite, nantes, aviron, espace, membre';

        // prepare data for the view
        $data = [
            'seoMeta' => $this->seoMeta,
        ];

        // return the view with data
        return view('pages.back.dashboard')->with($data);
    }

}
