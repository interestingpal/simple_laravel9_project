<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'jobs';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;


    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                  'name',
                  'company',
                  'emirates',
                  'address',
                  'job_type_id',
                  'job_status_id',
                  'description',
                  'expiration_date',
                  'user_id'
              ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        //'expiration_date' => 'datetime:m/d/Y',
    ];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];
    
    /**
     * Get the jobType for this model.
     *
     * @return App\Models\JobType
     */
    public function jobType()
    {
        return $this->belongsTo('App\Models\JobType','job_type_id');
    }

    /**
     * Get the jobStatus for this model.
     *
     * @return App\Models\JobStatus
     */
    public function jobStatus()
    {
        return $this->belongsTo('App\Models\JobStatus','job_status_id');
    }

    /**
     * Get the user for this model.
     *
     * @return App\Models\User
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }

    /**
     * Set the expiration_date.
     *
     * @param  string  $value
     * @return void
     */
    public function setExpirationDateAttribute($value)
    {
        $this->attributes['expiration_date'] = !empty($value) ? \DateTime::createFromFormat('d/m/Y', $value) : null;
    }

    /**
     * Get expiration_date in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getExpirationDateAttribute($value)
    {
        return \DateTime::createFromFormat('Y-m-d', $value)->format('d/m/Y');
    }

    /**
     * Get created_at in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getCreatedAtAttribute($value)
    {
        return \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A');
    }

    /**
     * Get updated_at in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getUpdatedAtAttribute($value)
    {
        return \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y');
    }

}
