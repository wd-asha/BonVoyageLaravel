<?php

namespace App\Filters;

class HotelFilter extends QueryFilter
{
    public function country_id($id = null){
        return $this->builder->when($id, function($query) use($id){
            $query->where('country_id', $id);
        });
    }

    public function hotel_id($id = null){
        return $this->builder->when($id, function($query) use($id){
            $query->where('hotel_id', $id);
        });
    }

    public function status($id = null){
        return $this->builder->when($id, function($query) use($id){
            $query->where('departure_status', $id);
        });
    }

    /*public function search_field($search_string = ''){
        return $this->builder
            ->where('title', 'LIKE', '%'.$search_string.'%')
            ->orWhere('description', 'LIKE', '%'.$search_string.'%');
    }*/
}
