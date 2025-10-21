<?php
namespace App\Controllers;

helper('jwt');
helper('cookie');

class PortalController extends BaseController
{
    public function index()
    {

        $data = [
            'title' => 'MedBankSA - Dashboard',
            'showSidebar' => true,
        ];

        echo view('partials/header', $data);
        echo view('portal/dashboard');
        echo view('partials/footer');
    }
}