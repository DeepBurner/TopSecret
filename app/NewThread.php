<?php
/**
 * Created by PhpStorm.
 * User: Ahmet Burak
 * Date: 4.5.2017
 * Time: 21:44
 */

namespace App;

use Riari\Forum\Models\Thread;

class NewThread extends Thread{
    public function __construct(array $attributes = [])
    {
        $this->hotness = 0;
        parent::__construct($attributes);
    }
}