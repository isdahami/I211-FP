<?php

namespace App\Controllers;

use App\Models\VinylModel;

class SearchController extends BaseController
{
    public function index()
    {
        // Get the search criteria from the request
        $criteria = $this->request->getPost(); 
        
        // Load the VinylModel
        $vinylModel = new VinylModel();

        // Perform the search
        $searchResults = $vinylModel->searchVinyls($criteria);

        // Pass the search results to the view
        $data['searchResults'] = $searchResults;

        // Load the search results view
        return view('search/searchResults', $data);
    }

    
    public function suggest()
    {
        $query = $this->request->getGet('query');
        
        // Load the VinylModel
        $vinylModel = new VinylModel();

        // Get suggestions based on the query
        $suggestions = $vinylModel->getSuggestions($query);

        return $this->response->setJSON($suggestions);
    }

}
