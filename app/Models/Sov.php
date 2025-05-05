<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sov extends Model
{
    private $project_id;
    private $description;
    private $amount;
    private $sort_order;

    public function __construct($project_id, $description, $amount, $sort_order)
    {
        $this->project_id = $project_id;
        $this->description = $description;
        $this->amount = $amount;
        $this->sort_order = $sort_order;
    }

    public function getProjectId()
    {
        return $this->project_id;
    }

    public function setProjectId($project_id)
    {
        $this->project_id = $project_id;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    public function getSortOrder()
    {
        return $this->sort_order;
    }

    public function setSortOrder($sort_order)
    {
        $this->sort_order = $sort_order;
    }
}