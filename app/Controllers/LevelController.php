<?php

namespace App\Controllers;

use App\Models\Level;
use CodeIgniter\RESTful\ResourceController;

class LevelController extends ResourceController
{
    private $level;
    private $validation;

    public function __construct(){
        $this->level = new Level();
        $this->validation =  \Config\Services::validation();
    }
    public function index()
    {
        $liste = $this->level->findAll();
        return $this->respond($liste);
    }


    public function show($id = null)
    {
        $level = $this->level->find($id);
        if($level){
            return $this->respondCreated($level);
        }
        return $this->failNotFound('Sorry! no level found');
    }


    public function new()
    {
        //
    }

    public function create()
    {
        #description champ du formulaire
        #desclevel champ de la table level de la BD

        $rules = [ #regle de validation des chmaps du formulaire
            'description' => 'required|is_unique[level.descslevel]|min_length[3]'
        ];

        $messages = [ #Formatage des msg d'erreurs de validation
            "description" => [
        "required" => "Niveau requis",
        "is_unique" => "Ce niveau existe déjà"
    ]
        ];

        if(!$this->validate($rules,$messages)){ #test de validation
            return $this->failValidationErrors($this->validation->getErrors());
        }
        else{ #validation ok
            #Objet à inserer dans la BD
            $tab = [
                'descslevel' => $this->request->getVar('description')
            ];

            $id = $this->level->insert($tab); #insertion dans la BD

            if($id) { #succès insertion
                $data['idlevel'] = $id;
                return $this->respondCreated($data);
            }
            else{ #Echec insertion
                return $this->fail('Sorry! no level created');
            }
        }
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }
}
