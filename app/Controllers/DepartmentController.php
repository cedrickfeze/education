<?php

namespace App\Controllers;

use App\Models\Department;
use App\Models\Student;
use CodeIgniter\RESTful\ResourceController;

class DepartmentController extends ResourceController
{
    private $department;
    private $validation;

    public function __construct()
    {
        $this->department = new Department();
        $this->validation = \Config\Services::validation();
    }
    public function index()
    {
        $liste = $this->department->findAll();
        return $this->respond($liste);
    }


    public function show($id = null)
    {
        $department = $this->department->find($id);
        if($department){
            return $this->respondCreated($department);
        }
        return $this->failNotFound('Sorry! no department found');
    }


    public function new()
    {
        //
    }


    public function create()
    {
        #description champ du formulaire

        $rules = [ #regle de validation des chmaps du formulaire
            'namedepart' => 'required|is_unique[department.namedepartment]|min_length[3]'
        ];

        $messages = [ #Formatage des msg d'erreurs de validation
            "namedepart" => [
                "required" => "Departement requis",
                "is_unique" => "Ce Departement existe déjà"
            ]
        ];

        if(!$this->validate($rules,$messages)){ #test de validation
            return $this->failValidationErrors($this->validation->getErrors());
        }
        else{ #validation ok
            #Objet à inserer dans la BD
            $tab = [
                'namedepartment' => $this->request->getVar('namedepart')
            ];

            $id = $this->department->insert($tab); #insertion dans la BD

            if($id) { #succès insertion
                $data['iddepartment'] = $id;
                return $this->respondCreated($data);
            }
            else{ #Echec insertion
                return $this->fail('Sorry! no department created');
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
