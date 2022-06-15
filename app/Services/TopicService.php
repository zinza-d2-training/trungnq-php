<?php

namespace App\Services;

use App\Models\Topic;

class TopicService{

    public function getAll(){
        return Topic::paginate(10);
    }

    public function getById($slug){
        $topic= Topic::where('slug',$slug)->firstOrFail();
        return $topic;
    }

    public function create($data){
        $data['slug'] =$data['title'];
        $topic = Topic::create($data);
        return $topic;
    }

    
} 