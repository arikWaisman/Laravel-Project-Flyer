<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flyer extends Model
{
	/**
	 * fillable fields for a flyer
	 * @var array
	 */
	protected $fillable = [
		'item',
		'city',
		'state',
		'country',
		'price',
		'description'
	];

	/**
	 * find the item given its it and item name
	 * @param Builder $query
	 * @param String $id
	 * @param String $item
	 * @return mixed
	 */
	public static function whereIdAndItemAre($id, $item){

		$item = str_replace('-',' ', $item);

		return static::where(compact('id', 'item'))->firstOrFail();

	}

	public function getPriceAttribute($price){

		if(is_numeric($price)) {
			return '$'.number_format($price);
		} else {
			return $price;
		}


	}

	public function addPhoto(Photo $photo){

		return $this->photos()->save($photo);

	}

	/**
	 * a flyer is composed of many photos
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function photos(){

		return $this->hasMany('App\Photo');

	}

	/**
	 * check to see if a flyer is owned to a user
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function owner(){

		return $this->belongsTo('App\User', 'user_id');

	}

	/**
	 * determine if the given user created the flyer
	 * @param User $user
	 * @return bool
	 *
	 */
	public function ownedBy(User $user){

		return $this->user_id == $user->id;

	}

}
