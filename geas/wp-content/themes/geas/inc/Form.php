<?php
/**
 *  class Form
 *  Permet de generer un formulaire
 */
class Form
{
    protected $post;
    protected $error;

    function __construct($error = array(),$method = 'post')
    {
        if($method == 'post') {
            $this->post = $_POST;
        } else {
            $this->post = $_GET;
        }
        $this->error = $error;
    }

    /**
     * @param $html string
     * @return string
     */
    private function arround($html)
    {
        return '<div class="form-control">'.$html.'</div>';
    }
    private function arround2($html)
    {
        return '<div class="form-control2">'.$html.'</div>';
    }

    /**
     * @param $name string
     * @return string
     */
    private function getValue($name, $data)
    {
        if (!empty($data)) {
            return !empty($this->post[$name]) ? stripslashes($this->post[$name]) : $data;
        } else {
            return !empty($this->post[$name]) ? stripslashes($this->post[$name]) : null;
        }

    }
    /**
     * @param $type string
     * @param $class string
     * @param $name string
     * @return string
     */
    public function input($type,$name,$class = NULL,$data = null)
    {
        return $this->arround('<input class="'.$class.'" type="'.$type.'" id="'.$name.'" name="'.$name.'" " placeholder="Veuillez renseigner ce champ." value="'
            .$this->getValue
            ($name,
                $data).'">');
    }
    public function input2($type,$name,$class = NULL,$data = null)
    {
        return $this->arround2('<input class="'.$class.'" type="'.$type.'" id="'.$name.'" name="'.$name.'" " placeholder="Veuillez renseigner ce champ." value="'
            .$this->getValue
            ($name,
                $data).'">');
    }
    /**
     * @param $name
     * @param $class string
     * @param null $data
     * @return string
     */
    public function textarea($name, $class = NULL, $data = null)
    {
        return $this->arround2('<textarea class="'.$class.'" name="'.$name.'">'.$this->getValue($name,$data).'</textarea>');
    }

    /**
     * @param $name string
     * @param $class string
     * @param $value string
     * @return string
     */
    public function submit($name = 'submitted',$value='Envoyer',$class = NULL)
    {
        return '<input type="submit" name="'.$name.'" class="'.$class.'" id="'.$name.'" value="'.$value.'">';
    }

    /**
     * @param $name
     * @return string|null
     */
    public function error($name)
    {
        if(!empty($this->error[$name])) {
            return '<span class="error">'.$this->error[$name].'</span>';
        }
        return null;
    }
    public function error2(string $name)
    {
        $error = !empty($this->errors[$name]) ? $this->errors[$name] : '';
        return '<span class="error">'.$error.'</span>';
    }

    /**
     * @param $name
     * @param $class string
     * @return string
     */
    public function label($name,$label,$class=NULL )
    {
        return '<label for="'.$name.'" class="'.$class.'">'.ucfirst($label).'</label>';
    }

    public function label2(string $name, $img)
    {
        return '<label class="photo_label" id="' .$img. '" for="'.$name.'"><img class="img_ajout" src="assets/img/plus.png"/></label>';
    }

    /**
     * @param $name
     * @param $class string
     * @param $entitys
     * @param $column
     * @return string
     */
    public function select($name, $entitys, $column, $idd = 'id', $class = NULL)
    {
        $html = '<select name="'.$name.'" class="'.$class.'">';
        foreach ($entitys as $entity) {
            $html .= '<option value="'.$entity->$idd.'">'.$entity->$column.'</option>';
        }
        $html .= '</select>';
        return $html;
    }

    public function select2($name, $array, $column, $class = NULL)
    {
        $html = '<select name="'.$name.'" class="'.$class.'">';
        for ($i=0; $i < count($array); $i++){
            $html .= '<option value="'.$array[$i][$column].'">'.$array[$i][$column].'</option>';
        }
        $html .= '</select>';
        return $html;
    }

    public function inputCheckbox($type,$name,$value,$class=NULL)
    {
        return $this->arround('<input type="'.$type.'" id="'.$name.'" name="'.$name.'" class="'.$class.'" value="'
            .$value.'">');
    }

    public function divStart($class=NULL)
    {
        return '<div class="'.$class.'">';
    }

    public function divEnd()
    {
        return '</div>';
    }

    public function h3(string $titre,string $id_title)
    {
        return '<h3 class="title_label" id="'.$id_title.'">Veuillez rentrer '.$titre.'</h3>';
    }


}
