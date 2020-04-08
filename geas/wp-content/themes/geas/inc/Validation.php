<?php
class Validation
{
    protected $errors = array();

    public function IsValid($errors)
    {
        foreach ($errors as $key => $value) {
            if(!empty($value)) { // a verifier ++
                return false;
            }
        }
        return true;
    }

    /**
     * emailValid
     * @param email $email
     * @return string $error
     */

    public function generateErrorRepeat($value, $value2, $text){
        if($value != $value2){
            return '<p style="color: red">'.$text.'</p>';
        }
    }

    public function generateErrorCheckBox($value, $text){
        if(!$value){
            return $text;
        }
    }

    public function emailValid($email)
    {
        $error = '';
        if(empty($email) || (filter_var($email, FILTER_VALIDATE_EMAIL)) === false) {
            $error = 'Erreur dans le mail et/ou mdp';
        }
        return $error;
    }

    /**
     * textValid
     * @param POST $text string
     * @param title $title string
     * @param min $min int
     * @param max $max int
     * @param empty $empty bool
     * @return string $error
     */

    public function textValid($text, $title, $min = 3,  $max = 50, $empty = true)
    {

        $error = '';
        if(!empty($text)) {
            $strtext = strlen($text);
            if($strtext > $max) {
                $error = 'Votre ' . $title . ' est trop long.';
            } elseif($strtext < $min) {
                $error = 'Votre ' . $title . ' est trop court.';
            }
        } else {
            if($empty) {
                $error = 'Veuillez renseigner un ' . $title . '.';
            }
        }
        return $error;

    }
    public function textValid2($text, $title, $min = 3,  $max = 50, $empty = true)
    {

        $error = '';
        if(!empty($text)) {
            $strtext = strlen($text);
            if($strtext > $max) {
                $error = 'Votre ' . $title . ' est trop long.';
            } elseif($strtext < $min) {
                $error = 'Votre ' . $title . ' est trop court.';
            }
        } else {
            if($empty) {
                return NULL;
            }
        }
        return $error;

    }
    public function numberValid($number, $min, $max)
    {
        $error = '';
        if (!empty($number) && is_numeric($number) == true ){
            if($number > $max){
                $error = 'Veuillez rentrer moins de '. $max . 'chiffre';
            } elseif($number < $min ){
                $error = 'Veuillez rentrer plus de '. $min . 'chiffre';
            }
        } else {
            $error = 'veuillez rentrer que des nombres';
        }
        return $error;
    }

    public function validChamp($errors,$value,$key,$min,$max,$empty = false)
    {
        if(!empty($value)) {
            if(mb_strlen($value) < $min) {
                $errors[$key] = 'Minimum ' .$min . ' caractères';
            } elseif (mb_strlen($value) > $max) {
                $errors[$key] = 'Maximum ' .$max . ' caractères';
            }
        } else {
            if(!$empty){
                $errors[$key] = 'Veuillez renseigner ce champ';
            }
        }
        return $errors;
    }

    public function doublont($val1, $val2, $name)
    {
        if ($val1 == $val2) {
            $error = $name . 'existe déjà';
        }
        return $error;
    }
    public function confmdp($val1,$val2)
    {
        if ($val1 != $val2) {
            $error = 'la confirmation du mot de passe n\'est pas identque au mot de passe';
        }
        return $error;
    }

    public function tel($tel)
    {
        if (!empty($tel) && is_numeric($tel) == true)
        {
            if (mb_strlen($tel) != 10)
            {
                $error = 'Veuillez un numero de telephone valide';
            }
        } else {
            $error = 'Veuillez rentrer un numero de telephone';
        }
        return $error;
    }

    public function codepostale($cp)
    {
        if (!empty($cp)&& is_numeric($cp) == true)
        {
            if (mb_strlen($cp) != 5)
            {
                $error = 'Veuillez renter un code postale valide';
            }
        } else {
            $error = 'Veuillez rentrer un code postale';
        }
        return $error;
    }

}