<?php

namespace App\Models;

use CodeIgniter\Model;

class VinylModel extends Model {

    // gets the vinyl_info table
    protected $table = 'vinyl_info';
    // table cols
    protected $allowedFields = ['id', 'vinyl_name', 'vinyl_desc', 'vinyl_artist', 'vinyl_genre', 'vinyl_price', 'vinyl_image'];

    // Method to retrieve random vinyls from the database
    public function getRandomVinyls($limit)
    {
        return $this->orderBy('RAND()')->findAll($limit);
    }

    // method that gets all of the vinyls
    public function getAllVinyls() {
        return $this->findAll();
    }

    
    // method that allows for searching
    public function searchVinyls($criteria)
    {
        // Extract the search query from the criteria array
        $searchQuery = $criteria['search'] ?? ''; 

        // Build the query to search for matching vinyls
        $builder = $this->builder();
        // Search in vinyl_name column
        $builder->like('vinyl_name', $searchQuery); 
        // Search in vinyl_artist column
        $builder->orLike('vinyl_artist', $searchQuery); 
        // serch in vinyl_genre col
        $builder->orLike('vinyl_genre', $searchQuery); 

        // Execute the query and fetch the results
        $query = $builder->get();
        return $query->getResultArray();
    }

}