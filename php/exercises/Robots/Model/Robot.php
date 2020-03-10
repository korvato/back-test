<?php

namespace Robots\Model;

class Robot
{
    /**
     * @var string
     * @label('La réferance de robot ')
   */
    protected $id;

    /**
     * @var string
     * @label('Le type de robot ')
    */
    protected $type;

    public function setId($id)
    {
        $this->id = $id;
    }
    public function getId()
    {
        return $this->id;
    }

    public function setType($type)
    {
        $this->type = $type;
    }
    public function getType()
    {
        return $this->type;
    }
}