<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
	/**
	 * @var string
	 */
	protected $table = 'tasks';

	/**
	 * @var array
	 */
	protected $fillable = [
		'title',
		'description',
		'date',
	    'status',
	    'user_id',
	];

    public function getTitle()
    {
        return $this->title;
    }
}
