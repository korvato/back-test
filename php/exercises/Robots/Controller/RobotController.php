<?php

namespace Robots\Controller;
use Robots\Model\Robot;

class RobotController
{
        /**
     * 
     * @param string $id FL837RX or WK811BC...
     * Avoir si l'id de robot existe ou non
     * 
     */
    public function robotExist(string $id) : Boolean 
    {
        // Fonction qui cherche l'existance du robot dans la base selon l'id findById()
        if( /* exist */ !true ){
            return false;
        } else {
            return true;
        }
    }

    /**
     * @var string[]
     */
    private $types = array(
        'FL',
        'WK',
    );

    /**
     * 
     * @param string $type  // 'fly' // 'walk'
     * La géneration d'un robot selon un type donnée ou bien de manière aléatoire
     * @throws InvalidArgumentException
     * 
     */
    public function addRobot(string $type=null) : Object 
    {
        /**
         * @var string
         */
        $id = null;

        /**
         * @var string
         */
        $typeIs = $type;

        if( is_null($type) ){

            // Géneration de key aléatoire avec l'indice de type de robot
            $key = array_rand($types);
            // avoir si existe
            do{
                $id = $types[$key].strtoupper(uniqid());
            } while(!robotExist($id));

            // Affectation de type de robot
            $typeIs = ($key == 0) ? 'fly' : 'walk';

        }elseif ( $type == 'fly' ) {

            // Géneration de key de robot type fly
            do{
                $id = $types[0].strtoupper(uniqid());
            } while(!robotExist($id));

        }elseif( $type == 'walk' ){

            // Géneration de key de robot type walk
            do{
                $id = $types[1].strtoupper(uniqid());
            } while(!robotExist($id));

        }else{

            // Exeption si le type n'est pas connu
            throw new InvalidArgumentException("invalid type of robot");
        }

        // Création de robot
        $robot = new Robot();
        $robot->setId($id);
        $robot->setType($typeIs);

        //retourné l'objet crée
        return $robot;
    }

    /**
     * 
     * @param string $id FL837RX or WK811BC...
     * Avoir le type de robot selon leur ID
     * @throws InvalidArgumentException
     * 
     */
    public function robotIs(string $id) : String 
    {
        /**
         * @var string
         */
        $idIs = substr($id, 0, 2);

        /**
         * @var string
         */
        $typeIs = null;

        if ( in_array($idIs, $types) ) {

            // Récupere le type de robot
            $typeIs = ($idIs == 'FL') ? 'fly' : 'walk';
            return "it's a ".$typeIs."ing robot ".$typeIs.".";

        }else{

            // Exeption si le type n'est pas connu
            throw new InvalidArgumentException("invalid type of robot");
        }

    }
}