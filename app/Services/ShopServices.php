<?php


namespace App\Services;


class ShopServices
{
    public static function form_tree($mess) {
        if (!is_array($mess)) {
            return false;
        }
        $tree = array();
        foreach ($mess as $value) {
            $tree[$value['parent_id']][] = $value;
        }
        return $tree;
    }

    public static function build_tree($cats, $parent_id) {
        if (is_array($cats) && isset($cats[$parent_id])) {
            $tree = '<ul>';
            foreach ($cats[$parent_id] as $cat) {
                $tree .= '<li>' . $cat['name'];
                $tree .= static::build_tree($cats, $cat['id']);
                $tree .= '</li>';
            }
            $tree .= '</ul>';
        } else {
            return false;
        }
        return $tree;
    }

    public static function build_tree_cats($cats, $parent_id) {
        if (is_array($cats) && isset($cats[$parent_id])) {
            $tree = '<select class="custom-select">';

            foreach ($cats[$parent_id] as $cat) {

                ShopServices::print_arr($cats[$parent_id]);
                $tree .= '<optgroup label="$cat[\'name\']">';
                $tree .= '<option>' . $cat['name'];
                $tree .= static::build_tree_cats($cats, $cat['id']);
                $tree .= '</option>';
                $tree .= '</optgroup>';
            }

            $tree .= '</select>';
        } else {
            return false;
        }
        return $tree;
    }

    public static function print_arr($array){
        echo "<pre>". print_r($array,true) ."</pre>";
    }
}
