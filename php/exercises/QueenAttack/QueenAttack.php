<?php
declare(strict_types=1);

class QueenAttack
{
    /**
     * @throws InvalidArgumentException
     */
    public function placeQueen(int $i, int $j): bool
    {
        if( (($i < 0) || ($i > 8)) && (($j < 0) || ($j > 8))){
            throw new InvalidArgumentException("the queen's coordinates are not valid on the chessboard of 8 by 8");
        }
    }

    /**
     * @param  int[]  $white  Coordinates of the white Queen
     * @param  int[]  $black  Coordinates of the black Queen
     * @throws InvalidArgumentException
     */
    public function canAttack(array $white, array $black): bool
    {
        placeQueen($white[0], $white[1]);
        placeQueen($black[0], $black[1]);

        if( ($white[0] == $black[0]) || ($white[1] == $black[1]) ){
            return true;
        }else{
            if(($white[0] < $black[0])){
                while( ($white[0]<$black[0]) && (($white[0]<=8) || ($white[1]<=8)) ){

                    if($white[0]<8){
                        $white[0]++;
                    }

                    if($white[1]<8){
                        $white[1]++;
                    }
                }
                if( ($white[0] == $black[0]) && ($white[1] == $black[1]) ){
                    return true;
                }
                return false;
            }else{
                canAttack($black, $white);
            }
        }

    }
}
