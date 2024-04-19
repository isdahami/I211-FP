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


    public function getSuggestions($query)
    {
        // Perform a database query to fetch suggestions based on the query
        $builder = $this->builder();
        $builder->like('vinyl_name', $query);
        $builder->orLike('vinyl_genre', $query); 
        $builder->orLike('vinyl_artist', $query); 
        $results = $builder->get()->getResultArray();

        // Prepare suggestions array with both vinyl ID and vinyl name
        $suggestions = [];
        foreach ($results as $result) {
            $suggestions[] = [
                'id' => $result['id'], 
                'name' => $result['vinyl_name'],
                'genre' => $result['vinyl_genre'],
                'artist' => $result['vinyl_artist'],
            ];
        }

        return $suggestions;
    }


    
    // method that allows for searching
    public function searchVinyls($criteria)
    {
        // Extract the search query from the criteria array
        $searchQuery = $criteria['search'] ?? ''; 

        // change so that multiple search features ex: mac rap
        // auto suggest

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

    public function getVinylsByGenre($genre)
    {
        return $this->where('vinyl_genre', $genre)->findAll(); 
    }

    

}