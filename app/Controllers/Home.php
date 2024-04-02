<?php

namespace App\Controllers;

use App\Models\VinylModel; 

class Home extends BaseController
{
    public function index(): string
    {
        // Load the VinylModel
        $vinylModel = new VinylModel();

        // Retrieve 4 random vinyls from the model
        $vinyls = $vinylModel->getRandomVinyls(4);

        // Pass the vinyls to the view
        $data['vinyls'] = $vinyls;

        // Load the view with the vinyls data
        return view('home/landingPage', $data);
    }

   
}
